<?php

namespace UserBundle\Controller;

use UserBundle\Entity\Prom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Prom controller.
 *
 * @Route("boss/class")
 */
class PromController extends Controller
{
    /**
     * Lists all prom entities.
     *
     * @Route("/", name="boss_class_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proms = $em->getRepository('UserBundle:Prom')->findAll();

        return $this->render('prom/index.html.twig', array(
            'proms' => $proms,
        ));
    }

    /**
     * Creates a new prom entity.
     *
     * @Route("/new", name="boss_class_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $prom = new Prom();
        $form = $this->createForm('UserBundle\Form\PromType', $prom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prom);
            $em->flush();

            return $this->redirectToRoute('boss_class_show', array('id' => $prom->getId()));
        }

        return $this->render('prom/new.html.twig', array(
            'prom' => $prom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a prom entity.
     *
     * @Route("/{id}", name="boss_class_show")
     * @Method("GET")
     */
    public function showAction(Prom $prom)
    {
        $deleteForm = $this->createDeleteForm($prom);

        return $this->render('prom/show.html.twig', array(
            'prom' => $prom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing prom entity.
     *
     * @Route("/{id}/edit", name="boss_class_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Prom $prom)
    {
        $deleteForm = $this->createDeleteForm($prom);
        $editForm = $this->createForm('UserBundle\Form\PromType', $prom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boss_class_edit', array('id' => $prom->getId()));
        }

        return $this->render('prom/edit.html.twig', array(
            'prom' => $prom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a prom entity.
     *
     * @Route("/{id}", name="boss_class_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prom $prom)
    {
        $form = $this->createDeleteForm($prom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prom);
            $em->flush();
        }

        return $this->redirectToRoute('boss_class_index');
    }

    /**
     * Creates a form to delete a prom entity.
     *
     * @param Prom $prom The prom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prom $prom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boss_class_delete', array('id' => $prom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
