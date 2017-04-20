<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Participation;
use GalleryBundle\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
                            ->orderBy("event.date")
                            ->getQuery()->getResult();

        return $this->render('EventBundle:Default:index.html.twig',[
            "events"=>$events
        ]);
    }

    /**
     * @Route("/{id}",name="event_show",requirements={"id": "\d+"})
     */
    public function showAction($id)
    {
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");
        $event = $eventsRpo->find($id);

        if(!$event){
            throw new NotFoundHttpException("Event not found");
        }

        $newPicture = new Picture();
        $uploadForm = $this->getUploadForm($newPicture,$this->getUser(),$event);

        return $this->render("EventBundle:Default:event.html.twig",[
            "event"=>$event,
            "uploadForm"=>$uploadForm->createView()
        ]);
    }

    /**
     * @Route("/{id}/upload",name="event_upload_picture",requirements={"id": "\d+"})
     */
    public function uploadPictureAction($id,Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('login'));
        }
        $eventsRpo = $this->getDoctrine()->getRepository("EventBundle:ActivityEvent");
        $event = $eventsRpo->find($id);
        $newPicture = new Picture();
        $uploadForm = $this->getUploadForm($newPicture,$this->getUser(),$event);
        $uploadForm->handleRequest($request);
        if($uploadForm->isSubmitted() && $uploadForm->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($newPicture);
            $em->flush();
        }
        return $this->redirectToRoute("event_show",["id"=>$id]);
    }

    public function getUploadForm($newPicture,$user,$event){
        $newPicture->setDate(new \DateTime());
        if($user) $newPicture->setUser($user);
        $newPicture->setEvent($event);
        $uploadForm = $this->createForm('GalleryBundle\Form\PictureUploadType',$newPicture,[
            "action"=>$this->generateUrl("event_upload_picture",["id"=>$event->getId()])
        ]);
        return $uploadForm;
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
