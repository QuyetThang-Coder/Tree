<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_NhanVien_update.QL_NhanVien_update',
                [
                    "staff" => $staff,
                    "getPosition" => $getPosition,
                    "countPosition" => $countPosition,
                ]);
?>