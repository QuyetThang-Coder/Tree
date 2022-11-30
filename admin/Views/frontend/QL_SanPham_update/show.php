<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_SanPham_update.QL_SanPham_update',
                [
                    "product" => $product,
                    "getCategory" => $getCategory,
                    "countCategory" => $countCategory,
                ]);
?>