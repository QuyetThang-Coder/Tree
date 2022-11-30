<?php 
    $this -> view('frontend.header',
                [
                    'category' => $category, 
                    'user' => $user,
                    'sum_cart'   => $sum_cart,
                    'allCart'   => $allCart,
                ]);
    $this -> view('frontend.policy_detail.policy_detail',
                [
                    'policy_detail' => $policy_detail,
                    'policy'        => $policy,
                ]);
    $this -> view('frontend.footer');

?>