<?php

namespace GalleryBundle\Controller;

use Composer\Package\Archiver\ZipArchiver;
use Doctrine\DBAL\Types\TextType;
use GalleryBundle\Entity\PictureComment;
use GalleryBundle\Form\PictureCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use \ZipArchive;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="show_gallery")
     */
    public function indexAction(Request $request)
    {
        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');
        $pictures = $repoDoctrine->findAll();

        $newComment = New PictureComment();
        $form = $this->createForm('GalleryBundle\Form\PictureCommentType',$newComment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $newComment = $form->getData();
            $newComment->setDate(new \DateTime());
            $pictureID = $form['picture']->getData();
            $newComment->setPicture($repoDoctrine->find($pictureID));
            $newComment->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($newComment);
            $em->flush();
        }


        return $this->render('GalleryBundle:Default:gallery.html.twig', array(
            'pictures' => $pictures,
            'form' =>$form->createView(),
        ));
    }

    /**
     *
     * @Route("/{id}/like", requirements={"id" = "\d+"},name="like_image")
     */
    public function like_image($id,Request $request) {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('login'));
        }
        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');

        $em = $this->getDoctrine()->getManager();
        $image = $repoDoctrine->find($id);

        if(!$image){
            throw new NotFoundHttpException();
        }

        $user = $this->getUser();

        if($image->doUserLikes($user)) {
            $user->removePicturesLiked($image);
        } else {
            $user->addPicturesLiked($image);
        }

        $em->persist($user);
        $em->flush();

        $callback = $request->query->get("callback");
        if($callback){
            return $this->redirect($callback);
        } else {
            return $this->redirect($this->generateUrl('show_gallery'));
        }
    }

    /**
     *
     * @Route("/addComment/{id}", requirements={"id" = "\d+"},name="add_comment")
     */
    public function addComment($id) {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('login'));
        }

        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:PictureComment');


        $comment = new PictureComment();
        $comment->setContent();

    }

    /**
     * @Route("/download", name="download_pictures")
     */
    public function downloadPicturesAction(Request $request) {
        $body = $request->get('p');
        $ids = explode(';',$body);

        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');
        $pictures = $repoDoctrine->findById($ids);
        $baseDir = $this->get('kernel')->getRootDir().'/..';
        $em = $this->getDoctrine()->getManager();
        $zipname = 'images-'.join("-",$ids)."-".(new \DateTime())->format('Y-m-d-h-i-s').'.zip';
        $zipPath = $baseDir.'/web/downloads/'.$zipname;

        $t = extension_loaded('zip');
        $v = function_exists('zip_open') ;
        $p = class_exists('ZipArchive',false);
      
        $zip = new ZipArchive;
        $zip->open($zipPath,ZipArchive::CREATE);
        foreach ($pictures as $picture) {
            $zip->addFile($baseDir.'/web/img/uploads/pictures/'.$picture->getPath());
        }

        $zip->close();

        return $this->redirect($request->getBasePath().'/downloads/'.$zipname);
    }
}
