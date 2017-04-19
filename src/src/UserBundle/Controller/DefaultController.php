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

        $members = $membersRepo->createQueryBuilder("user")
            ->orderBy("user.username","DESC")
            ->getQuery()->getResult();

        return $this->render("UserBundle:Default:members.html.twig",[
            "members"=>$members
        ]);

    }

}
