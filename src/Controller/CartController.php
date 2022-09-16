<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(CartService $cartService): Response
    {
        $cartService->add(1); //on ajoute l'article 1
        return $this->render('cart/index.html.twig', [
            'cart' => $getCartController
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function addToCart(Article $article, CartService $cartService): Response
    {
        dd($article);
        $cartService->add($article[$id]); //on ajoute l'article
        return $this->redirectToRoute('app_article');
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
    public function deleteToCart(Article $article, CartService $cartService): Response
    {
        // dd($article);
        // $cartService->remove($article[$id]); //on supprime l'article--------->adapter a delete***
        // return $this->redirectToRoute('app_article');
    }
   
}
