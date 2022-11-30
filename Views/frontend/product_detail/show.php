<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category, 
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.product_detail.product_detail', 
                [
                    'getproduct'      => $getproduct,
                    'similar_product' => $similar_product,
                    'category'        => $category,
                    'productSelling'  => $productSelling,
                    'exist_comment'   => $exist_comment,
                    'getComment'      => $getComment,
                ]);
    $this -> view('frontend.footer');

?>