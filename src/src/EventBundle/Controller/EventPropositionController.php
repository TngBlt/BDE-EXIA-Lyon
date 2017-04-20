<?php

namespace EventBundle\Controller;

use EventBundle\Entity\EventProposition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Eventproposition controller.
 *
 * @Route("staff/proposition")
 */
class EventPropositionController extends Controller
{
    /**
     * Lists all eventProposition entities.
     *
     * @Route("/", name="staff_proposition_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eventPropositions = $em->getRepository('EventBundle:EventProposition')->findAll();

        return $this->render('eventproposition/index.html.twig', array(
            'eventPropositions' => $eventPropositions,
        ));
    }

    /**
     * Creates a new eventProposition entity.
     *
     * @Route("/new", name="staff_proposition_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eventProposition = new Eventproposition();
        $form = $this->createForm('EventBundle\Form\EventPropositionType', $eventProposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventProposition);
            $em->flush();

            return $this->redirectToRoute('staff_proposition_show', array('id' => $eventProposition->getId()));
        }

        return $this->render('eventproposition/new.html.twig', array(
            'eventProposition' => $eventProposition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a eventProposition entity.
     *
     * @Route("/{id}", name="staff_proposition_show")
     * @Method("GET")
     */
    public function showAction(EventProposition $eventProposition)
    {
        $deleteForm = $this->createDeleteForm($eventProposition);

        return $this->render('eventproposition/show.html.twig', array(
            'eventProposition' => $eventProposition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing eventProposition entity.
     *
     * @Route("/{id}/edit", name="staff_proposition_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EventProposition $eventProposition)
    {
        $deleteForm = $this->createDeleteForm($eventProposition);
        $editForm = $this->createForm('EventBundle\Form\EventPropositionType', $eventProposition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('staff_proposition_edit', array('id' => $eventProposition->getId()));
        }

        return $this->render('eventproposition/edit.html.twig', array(
            'eventProposition' => $eventProposition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a eventProposition entity.
     *
     * @Route("/{id}", name="staff_proposition_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EventProposition $eventProposition)
    {
        $form = $this->createDeleteForm($eventProposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eventProposition);
            $em->flush();
        }

        return $this->redirectToRoute('staff_proposition_index');
    }

    /**
     * Creates a form to delete a eventProposition entity.
     *
     * @param EventProposition $eventProposition The eventProposition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EventProposition $eventProposition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('staff_proposition_delete', array('id' => $eventProposition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
