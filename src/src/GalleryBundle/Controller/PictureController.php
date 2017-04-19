<?php

namespace GalleryBundle\Controller;

use GalleryBundle\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Picture controller.
 *
 * @Route("boss/picture")
 */
class PictureController extends Controller
{
    /**
     * Lists all picture entities.
     *
     * @Route("/", name="boss_picture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pictures = $em->getRepository('GalleryBundle:Picture')->findAll();

        return $this->render('picture/index.html.twig', array(
            'pictures' => $pictures,
        ));
    }

    /**
     * Creates a new picture entity.
     *
     * @Route("/new", name="boss_picture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $picture = new Picture();
        $picture->setDate(new \DateTime());
        $form = $this->createForm('GalleryBundle\Form\PictureType', $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush();

            return $this->redirectToRoute('boss_picture_show', array('id' => $picture->getId()));
        }

        return $this->render('picture/new.html.twig', array(
            'picture' => $picture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a picture entity.
     *
     * @Route("/{id}", name="boss_picture_show")
     * @Method("GET")
     */
    public function showAction(Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);

        return $this->render('picture/show.html.twig', array(
            'picture' => $picture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing picture entity.
     *
     * @Route("/{id}/edit", name="boss_picture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);
        $editForm = $this->createForm('GalleryBundle\Form\PictureType', $picture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boss_picture_edit', array('id' => $picture->getId()));
        }

        return $this->render('picture/edit.html.twig', array(
            'picture' => $picture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a picture entity.
     *
     * @Route("/{id}", name="boss_picture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Picture $picture)
    {
        $form = $this->createDeleteForm($picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush();
        }

        return $this->redirectToRoute('boss_picture_index');
    }

    /**
     * Creates a form to delete a picture entity.
     *
     * @param Picture $picture The picture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Picture $picture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boss_picture_delete', array('id' => $picture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
