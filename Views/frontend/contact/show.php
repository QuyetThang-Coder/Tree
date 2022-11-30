<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category,
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.contact.contact');
    $this -> view('frontend.footer');

?>