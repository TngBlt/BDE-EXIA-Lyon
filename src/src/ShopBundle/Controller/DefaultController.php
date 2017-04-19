<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Purchase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="shop_index")
     */
    public function indexAction(Request $request)
    {
        $search = $request->query->get('search');

        $productRepo = $this->getDoctrine()->getRepository("ShopBundle:Product");
        $queryBuilder = $productRepo->createQueryBuilder("pro")
                    ->where("pro.available = true");

        if($search){
            $queryBuilder->where("LOWER(pro.title) like LOWER(:search) or LOWER(pro.description) like LOWER(:search)");
            $queryBuilder->setParameter("search","%".$search."%");
        }

        $products = $queryBuilder->getQuery()->getResult();

        return $this->render('ShopBundle:Default:index.html.twig',[
            "products"=>$products,
            "search"=>$search
            ]);
    }

    /**
     * @Route("/cart/add/{id}",name="cart_add")
     */
    public function addCartAction($id,Request $request){
        $product = $this->getDoctrine()->getRepository("ShopBundle:Product")->find($id);

        $session = $request->getSession();
        $cart = $session->get("cart");
        if(!$cart){
            $cart = [];
        }

        if($product){
            array_push($cart,$product);
            $session->set("cart",$cart);
        }

        return $this->redirect($this->generateUrl('shop_index'));
    }

    /**
     * @Route("/cart/remove/{id}",name="cart_remove")
     */
    public function removeCartAction($id,Request $request){
        $session = $request->getSession();
        $cart = $session->get("cart");
        if(!$cart){
            $cart = [];
        }

        for($i =0; $i<count($cart); $i++){
            $product = $cart[$i];
            if($product->getId() == $id){
                array_splice($cart,$i,1);
                break;
            }
        }

        $session->set("cart",$cart);

        return $this->redirect($this->generateUrl('shop_index'));
    }

    /**
     * @Route("/cart/summary",name="shop_purchase")
     */
    public function purchaseAction(Request $request){
        $session = $request->getSession();
        $cart = $session->get("cart");
        if(!$cart) return $this->redirect($this->generateUrl('shop_index'));

        $total = 0;

        foreach ($cart as $product){
            $total += $product->getPrice();
        }


        return $this->render("ShopBundle:Default:purchase.html.twig",[
            "cart" => $cart,
            "total" => $total
        ]);
    }

    /**
     * @Route("/cart/finalize",name="shop_finalize")
     */
    public function finalizeAction(Request $request){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('login'));
        }
        $session = $request->getSession();
        $cart = $session->get("cart");
        if(!$cart) return $this->redirect($this->generateUrl('shop_index'));

        $purchase = new Purchase();
        $purchase->setDate(new \DateTime());
        $purchase->setUser($this->getUser());

        $total = 0;

        foreach ($cart as $product){
            $total += $product->getPrice();
            $purchase->addProduct($product);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($purchase);
        $em->flush();

        $session->set("cart",[]);

        return $this->render("ShopBundle:Default:finalize.html.twig",[
            "total" => $total
        ]);
    }
}
