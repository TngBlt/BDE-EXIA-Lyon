<?php


namespace EventBundle\Controller;


use EventBundle\Entity\EventProposition;
use EventBundle\Form\PropositionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/propositions")
 */
class VotesController extends Controller {
    /**
     * @Route("/",name="propositions_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $propRepos = $em->getRepository("EventBundle:EventProposition");

        $propositions = $propRepos->createQueryBuilder("prop")
                                  ->orderBy("prop.proposedDate")
                                  ->getQuery()->getResult();

        $newProposition = new EventProposition();
        $form = $this->createForm('EventBundle\Form\PropositionType',$newProposition);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                return $this->redirect($this->generateUrl('login'));
            }

            $newProposition->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($newProposition);
            $em->flush();
        }

        return $this->render("EventBundle:Votes:index.html.twig",[
            "propositions"=>$propositions,
            "propositionForm"=>$form->createView()
        ]);
    }
}
