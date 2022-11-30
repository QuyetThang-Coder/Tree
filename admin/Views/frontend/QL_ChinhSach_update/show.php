<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_ChinhSach_update.QL_ChinhSach_update',
                [
                    "policy" => $policy,
                ]);
?>