<?php

namespace GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="show_gallery")
     */
    public function indexAction()
    {
        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');
        $pictures = $repoDoctrine->findAll();

        return $this->render('GalleryBundle:Default:gallery.html.twig', array(
            'pictures' => $pictures
        ));
    }
    /**
     *
     * @Route("/{id}/like", requirements={"id" = "\d+"},name="like_image")
     */
    public function like_image($id) {
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

        return $this->redirect($this->generateUrl('show_gallery'));
    }
}
