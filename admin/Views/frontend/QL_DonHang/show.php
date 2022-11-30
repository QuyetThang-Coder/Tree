<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_DonHang.QL_DonHang',
                [
                    "getOrder" => $getOrder,
                    "countStatus0" => $countStatus0,
                    "countStatus1" => $countStatus1,

                ]);
?>