<?php 
    $this -> view('frontend.header', 
                [
                    'category' => $category, 
                    'user' => $user, 
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.product.product',
                [
                    'category' => $category,
                    'getcategory' => $getcategory,
                    'product'  => $product,
                    'productSelling' => $productSelling,
                
                ]);
    $this -> view('frontend.footer');

?>