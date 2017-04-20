<?php


namespace EventBundle\Controller;


use EventBundle\Entity\EventProposition;
use EventBundle\Entity\EventPropositionVote;
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

    /**
     * @Route("/{id}/like",name="proposition_like",requirements={"id": "\d+"})
     */
    public function likePropositionAction($id,Request $request){
        $em = $this->getDoctrine()->getManager();
        $propRepos = $em->getRepository("EventBundle:EventProposition");
        $prop = $propRepos->find($id);

        $newVote = new EventPropositionVote();
        $form = $this->getLikeForm($prop,$this->getUser(),$newVote);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
                return $this->redirect($this->generateUrl('login'));
            }
            $newVote->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($newVote);
            $em->flush();
        }

        return $this->redirectToRoute("propositions_index");

    }

    /**
     * @Route("/{id}/unlike",name="proposition_remove",requirements={"id": "\d+"})
     */
    public function likePropositionRemoveAction($id){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('login'));
        }
        $em = $this->getDoctrine()->getManager();
        $propRepos = $em->getRepository("EventBundle:EventProposition");
        $prop = $propRepos->find($id);

        $userVote = $prop->doUserVoted($this->getUser());

        $em->remove($userVote);
        $em->flush();

        return $this->redirectToRoute("propositions_index");
    }

    public function likeFormAction($propId){
        $em = $this->getDoctrine()->getManager();
        $propRepos = $em->getRepository("EventBundle:EventProposition");
        $prop = $propRepos->find($propId);

        $newVote = new EventPropositionVote();
        $form = $this->getLikeForm($prop,$this->getUser(),$newVote);

        return $this->render("EventBundle:Votes:likeForm.html.twig",[
            "form"=>$form->createView()
        ]);
    }

    public function getLikeForm($prop,$user,$newVote){
        if($user) $newVote->setUser($user);
        $newVote->setDate($prop->getProposedDate());
        $newVote->setProposition($prop);
        $form = $this->createForm('EventBundle\Form\PropositionVoteType',$newVote,[
            "action"=>$this->generateUrl("proposition_like",["id"=>$prop->getId()])
        ]);
        return $form;
    }
}
