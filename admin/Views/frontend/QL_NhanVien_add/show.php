<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_NhanVien_add.QL_NhanVien_add',
                [
                    "getPosition" => $getPosition,
                    "countPosition" => $countPosition,
                ]);
?>