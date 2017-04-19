<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="events_index")
     */
    public function indexAction()
    {
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");
        $events = $eventsRpo->createQueryBuilder("event")
                            ->where("event.date >= NOW()");

        return $this->render('EventBundle:Default:index.html.twig',[
            "events"=>$events
        ]);
    }
}
