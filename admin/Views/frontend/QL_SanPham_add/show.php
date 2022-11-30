<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_SanPham_add.QL_SanPham_add',
                [
                    "getCategory" => $getCategory,
                    "countCategory" => $countCategory,
                ]);
?>