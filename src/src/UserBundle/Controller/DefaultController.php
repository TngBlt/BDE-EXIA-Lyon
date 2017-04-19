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

}
