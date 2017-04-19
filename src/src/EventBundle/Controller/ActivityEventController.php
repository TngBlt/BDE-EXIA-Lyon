<?php

namespace EventBundle\Controller;

use EventBundle\Entity\ActivityEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Activityevent controller.
 *
 * @Route("staff/event")
 */
class ActivityEventController extends Controller
{
    /**
     * Lists all activityEvent entities.
     *
     * @Route("/", name="staff_event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activityEvents = $em->getRepository('EventBundle:ActivityEvent')->findAll();

        return $this->render('activityevent/index.html.twig', array(
            'activityEvents' => $activityEvents,
        ));
    }

    /**
     * Creates a new activityEvent entity.
     *
     * @Route("/new", name="staff_event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $activityEvent = new Activityevent();
        $form = $this->createForm('EventBundle\Form\ActivityEventType', $activityEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activityEvent);
            $em->flush();

            return $this->redirectToRoute('staff_event_show', array('id' => $activityEvent->getId()));
        }

        return $this->render('activityevent/new.html.twig', array(
            'activityEvent' => $activityEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activityEvent entity.
     *
     * @Route("/{id}", name="staff_event_show")
     * @Method("GET")
     */
    public function showAction(ActivityEvent $activityEvent)
    {
        $deleteForm = $this->createDeleteForm($activityEvent);

        return $this->render('activityevent/show.html.twig', array(
            'activityEvent' => $activityEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activityEvent entity.
     *
     * @Route("/{id}/edit", name="staff_event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ActivityEvent $activityEvent)
    {
        $deleteForm = $this->createDeleteForm($activityEvent);
        $editForm = $this->createForm('EventBundle\Form\ActivityEventType', $activityEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('staff_event_edit', array('id' => $activityEvent->getId()));
        }

        return $this->render('activityevent/edit.html.twig', array(
            'activityEvent' => $activityEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activityEvent entity.
     *
     * @Route("/{id}", name="staff_event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ActivityEvent $activityEvent)
    {
        $form = $this->createDeleteForm($activityEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activityEvent);
            $em->flush();
        }

        return $this->redirectToRoute('staff_event_index');
    }

    /**
     * Creates a form to delete a activityEvent entity.
     *
     * @param ActivityEvent $activityEvent The activityEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActivityEvent $activityEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('staff_event_delete', array('id' => $activityEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
