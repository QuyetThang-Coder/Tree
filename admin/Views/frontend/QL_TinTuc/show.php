<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_TinTuc.QL_TinTuc',
                [
                    "news" => $news,

                ]);
?>