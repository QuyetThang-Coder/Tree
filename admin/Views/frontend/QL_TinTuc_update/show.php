<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_TinTuc_update.QL_TinTuc_update', 
                [
                    "news" => $news,
                ]);
?>