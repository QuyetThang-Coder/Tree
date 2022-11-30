<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_SanPham.QL_SanPham',
                [
                    "getProduct" => $getProduct,
                ]);
?>