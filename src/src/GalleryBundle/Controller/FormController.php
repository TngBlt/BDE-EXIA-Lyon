<?php


namespace GalleryBundle\Controller;

use GalleryBundle\Entity\PictureComment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller
{
    /**
     * @Route("/form/{id}", requirements={"id" = "\d+"}, name="comment_form")
     */
    public function formCommentAction($id, Request $request)
    {
        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');
        $image = $repoDoctrine->find($id);

        $newComment = New PictureComment();
        $form = $this->createForm('GalleryBundle\Form\PictureCommentType',$newComment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $newComment = $form->getData();
            $newComment->setDate(new \DateTime());
            $newComment->setPicture($image);
            $newComment->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($newComment);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('show_gallery'));
    }
}