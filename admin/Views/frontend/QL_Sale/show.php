<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_Sale.QL_Sale',
                [
                    "getSale" => $getSale,
                ]);
?>