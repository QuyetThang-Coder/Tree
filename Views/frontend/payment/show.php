<?php 
    $this -> view('frontend.payment.payment',
                [
                    'user' => $user,
                    'allCart'  => $allCart,
                    'CountSale'  => $CountSale,
                    'getSale'  => $getSale,
                    'sum_cart' => $sum_cart,
                ]);

?>