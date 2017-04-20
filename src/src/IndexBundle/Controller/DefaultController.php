<?php

namespace IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evRepo = $em->getRepository("EventBundle:ActivityEvent");
        $prodRepo = $em->getRepository("ShopBundle:Product");

        $nextEvents = $evRepo->createQueryBuilder("event")
            ->where("event.date > CURRENT_DATE()")
            ->orderBy("event.date")
            ->setMaxResults(2)
            ->getQuery()->getResult();

        $pastEvents = $evRepo->createQueryBuilder("event")
            ->where("event.date < CURRENT_DATE()")
            ->orderBy("event.date", "DESC")
            ->setMaxResults(2)
            ->getQuery()->getResult();

        $products = $prodRepo->findByAvailable(true);
        $randProducts = [];

        for($i = 0; $i<2; $i++){
            array_push($randProducts,$products[random_int(0,count($products)-1)]);
        }

        return $this->render('IndexBundle:Default:index.html.twig',[
            "nextEvents"=>$nextEvents,
            "pastEvents"=>$pastEvents,
            "products"=>$randProducts
        ]);
    }
}
