<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_ChinhSach.QL_ChinhSach',
                [
                    "policy" => $policy,
                ]);
?>