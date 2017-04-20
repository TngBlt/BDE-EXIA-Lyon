<?php


namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class LoginController extends Controller
{
    /**
     * @Route("/login",name="login")
     */
    public function indexAction(Request $request)
    {
        $authutils = $this->get("security.authentication_utils");
        $error = $authutils->getLastAuthenticationError();
        $lastusername = $authutils->getLastUsername();

        $signInForm = $this->createFormBuilder(new User())
            ->add("username",TextType::class,["label"=>"Username","attr"=>["required"=>"1"]])
            ->add("email",EmailType::class,["label"=>"Email","attr"=>["required"=>"1"]])
            ->add("password",PasswordType::class,["label"=>"Password","attr"=>["required"=>"1"]])
            ->add('prom',null,["label"=>"Class"])
            ->add("save",SubmitType::class,["label"=>"Sign in","attr"=>["class"=>"button button-primary"]])
            ->getForm();

        $signInForm->handleRequest($request);

        if ($signInForm->isSubmitted() && $signInForm->isValid()) {
            $newUser = $signInForm->getData();
            $newUser->setIsActive(true);
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($newUser, $newUser->getPassword());
            $newUser->setPassword($encoded);
            $newUser->setRole("ROLE_USER");
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();

            return $this->redirectToRoute('signin_success');
        }

        return $this->render('UserBundle:Default:login.html.twig',array(
            "lastusername" => $lastusername,
            "error" => $error,
            "signinform"=>$signInForm->createView(),
        ));
    }

    /**
     * @Route("/signin/success",name="signin_success")
     */
    public function singinSuccessAction(Request $request){
        return $this->render('UserBundle:Default:signinsuccess.html.twig');
    }

    /**
     * @Route("/login/check",name="login_check")
     */
    public function LoginCheckAction(Request $request){
        return null;
    }

    /**
     * @Route("/logout",name="logout")
     */
    public function LogOutAction(Request $request){
        return null;
    }
}