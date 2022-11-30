<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_LienHe.QL_LienHe',
                [
                    "contact" => $contact,
                ]);
?>