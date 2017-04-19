<?php

namespace GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="show_gallery")
     */
    public function indexAction()
    {
        $repoDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:Picture');
        $repository = $repoDoctrine->findAll();

        $comDoctrine = $this->getDoctrine()->getRepository('GalleryBundle:PictureComment');
        $comments =  $comDoctrine->findAll();
        return $this->render('GalleryBundle:Default:gallery.html.twig', array(
            'pictures' => $repository,
            'comments' => $comments
        ));
    }
}
