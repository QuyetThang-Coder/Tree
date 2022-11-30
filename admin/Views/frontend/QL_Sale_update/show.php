<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_Sale_update.QL_Sale_update',
                [
                    "sale" => $sale,
                ]);
?>