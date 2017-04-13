<?php

namespace IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('IndexBundle:Default:index.html.twig');
    }

    /**
     * @Route("/staff")
     */
    public function staffAction()
    {
        return $this->render('IndexBundle:Default:index.html.twig');
    }

    /**
     * @Route("/boss")
     */
    public function bossAction()
    {
        return $this->render('IndexBundle:Default:index.html.twig');
    }
}
