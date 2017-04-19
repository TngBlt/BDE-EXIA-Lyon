<?php


namespace PagesBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class WidgetController extends Controller {

    public function footerLinksAction(Request $request)
    {
        $pagesRepo = $this->getDoctrine()->getRepository('PagesBundle:Page');

        $pages = $pagesRepo->findByFooterDisplayed(true);

        return $this->render("PagesBundle:Widget:footerLinks.html.twig",["pages"=>$pages]);
    }
}
