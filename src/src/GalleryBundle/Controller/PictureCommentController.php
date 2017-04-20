<?php


namespace GalleryBundle\Controller;

use GalleryBundle\Entity\PictureComment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PictureCommentController extends Controller
{


    public function commentFormAction($pictureID,$callback = null) {

        $newComment = New PictureComment();

        $form = $this->createForm('GalleryBundle\Form\PictureCommentType', $newComment, array(
            'action' => $this->generateUrl('comment_form', ["id" => $pictureID,"callback"=>$callback])
        ));


        return $this->render('GalleryBundle:includes:comment-form.html.twig', array(
         "form"=>$form->createView()
        ));
    }
}