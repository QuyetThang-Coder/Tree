<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_DonHang_view.QL_DonHang_view',
                [
                    "getOrder_detail" => $getOrder_detail,
                    "order" => $order,
                ]);
?>