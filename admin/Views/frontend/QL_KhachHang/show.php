<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_KhachHang.QL_KhachHang',["user" => $user]);
?>