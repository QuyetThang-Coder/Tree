<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category, 
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.news_detail.news_detail',['news_detail' => $news_detail]);
    $this -> view('frontend.footer');

?>