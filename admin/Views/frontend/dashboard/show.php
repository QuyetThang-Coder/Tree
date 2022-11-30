<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.dashboard.dashboard',
                [
                    "user" => $user,
                    "product" => $product,
                    "order" => $order,
                    "sale" => $sale,
                    "statistical" => $statistical,
                    "statistical_year" => $statistical_year,
                ]);
?>