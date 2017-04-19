<?php

namespace PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{id}",name="page_view")
     */
    public function indexAction($id)
    {
        $page = $this->getDoctrine()->getRepository("PagesBundle:Page")->find($id);

        return $this->render('PagesBundle:Default:index.html.twig',["page"=>$page]);
    }
}
