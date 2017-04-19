<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Participation;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="events_index")
     */
    public function indexAction()
    {
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");

        $today = new \DateTime();
        $after = (new \DateTime())->add(new \DateInterval("P30D"));

        $events = $eventsRpo->createQueryBuilder("event")
                            ->where("event.date BETWEEN :date AND :dateAfter")
                            ->setParameter("date",$today->format('Y-m-d'))
                            ->setParameter("dateAfter",$after->format('Y-m-d'))
                            ->getQuery()->getResult();

        return $this->render('EventBundle:Default:index.html.twig',[
            "events"=>$events
        ]);
    }

    /**
     * @Route("/{id}",name="event_show")
     */
    public function showAction($id)
    {
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");
        $event = $eventsRpo->find($id);

        if(!$event){
            throw new NotFoundHttpException("Event not found");
        }

        return $this->render("EventBundle:Default:event.html.twig",[
            "event"=>$event
        ]);
    }

    /**
     * @Route("/{id}/participate",name="event_participate")
     */
    public function participateAction($id)
    {
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");
        $event = $eventsRpo->find($id);

        if(!$event){
            throw new NotFoundHttpException("Event not found");
        }

        $participation = new Participation();
        $participation->setUser($this->getUser());
        $participation->setEvent($event);
        $em = $this->getDoctrine()->getManager();
        $em->persist($participation);
        $em->flush();

        return $this->redirect($this->generateUrl("event_show",["id"=>$id]));
    }
}
