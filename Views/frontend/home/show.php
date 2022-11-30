<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category, 
                    'user' => $user, 
                    'allCart' => $allCart,
                    'sum_cart' => $sum_cart, 
                ]);
    $this -> view('frontend.home.index',
                [
                    'banner' => $banner, 
                    'newproduct' => $newproduct,
                    'productSelling' => $productSelling,
                ]);
    $this -> view('frontend.footer');

?>