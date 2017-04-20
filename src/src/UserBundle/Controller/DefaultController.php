<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/members",name="all_members")
     */
    public function membersAction(){

        $membersRepo = $this->getDoctrine()->getRepository("UserBundle:User");

        $staffmembers = $membersRepo->createQueryBuilder("user")
        	->where("user.role = 'ROLE_STAFF'")
            ->orderBy("user.username")
            ->getQuery()->getResult();


        $othermembers = $membersRepo->createQueryBuilder("user")
        	->where("user.role = 'ROLE_USER'")
            ->orderBy("user.username")
            ->getQuery()->getResult();


        return $this->render("UserBundle:Default:members.html.twig",[
            "members"=>$staffmembers,
            "otherMembers"=>$othermembers
        ]);

    }


    /**
    *@Route("/profil/{id}", requirements={"id"="\d+"}, name="profil")
    */
    public function profilAction($id){

    	$membersRepo = $this->getDoctrine()->getRepository("UserBundle:User");

    	$member = $membersRepo->find($id);

    	$participationRepo = $this->getDoctrine()->getRepository("EventBundle:Participation");

    	$maDate = new \DateTime("now");

    	$eventPast = $participationRepo->createQueryBuilder("par")
            ->leftJoin("par.event","evn")
            ->where("par.user = :user AND evn.date < CURRENT_DATE()")
            ->setParameter("user",$member)
            ->orderBy("evn.date")
            ->getQuery()->getResult();

        $eventNext = $participationRepo->createQueryBuilder("par")
            ->leftJoin("par.event","evn")
            ->where("par.user = :user AND evn.date > CURRENT_DATE()")
            ->setParameter("user",$member)
            ->orderBy("evn.date")
            ->getQuery()->getResult();

    	return $this->render("UserBundle:Default:profil.html.twig",[
        	"member"=>$member,
        	"eventPast"=>$eventPast,
        	"eventNext"=>$eventNext
        ]);

    }

}
