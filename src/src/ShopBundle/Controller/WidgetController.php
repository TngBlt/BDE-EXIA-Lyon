<?php


namespace ShopBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class WidgetController extends Controller {

    public function cartAction(Request $request)
    {
        $session = $request->getSession();

        $cart = $session->get("cart");

        if(!$cart){
            $cart = [];
        }

        $total = 0;

        foreach ($cart as $product){
            $total += $product->getPrice();
        }

        return $this->render("ShopBundle:Widget:cart.html.twig",[
            "cart" => $cart,
            "total" => $total
        ]);
    }
}
