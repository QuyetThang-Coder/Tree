<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category,
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.introduce.introduce',['introduce' => $introduce]);
    $this -> view('frontend.footer');

?>