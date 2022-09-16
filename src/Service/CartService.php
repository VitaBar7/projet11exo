<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class CartService {

    private $requestStack;
    private $articleRepository;

    public function __construct(RequestStack $requestStack) {//on recupere la session
        $this->requestStack=$requestStack;
    }
  
    public function add(int $id)
    {
        $cart = $this->requestStack->getSession()->get('cart');
        !empty($cart[$id]) ? $cart[$id]++ :$cart[$id] = 1;
        $this->requestStack->getSession() ->set('cart', $cart);
      // if (!empty($cat[$id])) {
      //    $cart[$id]++;
      //   } else {
      //     $cart[$id] = 1
      // }
    }

    public function remove(int $id)
    {
        $cart = $this->requestStack->getSession()->get('cart');
        if (!empty($cat[$id])) unset($cart[$id]);
        $this->requestStack->getSession() ->set('cart', $cart);
    }

    private function getCartInfos()
    {
        $cart= $this->requestStack->getSession()->get('cart');
        $cartInfos = [];
        foreach ($cart as $id => $qty) {
            $cartInfos[] = [
                'article' => $this->articleRepository->find($id),
                'qty' => $qty
            ];
        }
        return $cartInfos;
    }

    private function getTotal()
    {
        $total = 0;
        foreach ($this->getCartInfos() as $cartInfo);
    // ----->completer
    }

    
        
    
}

