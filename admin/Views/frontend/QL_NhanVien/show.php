<?php 
    $this -> view('frontend.side_bar', ["getStaff" => $getStaff]);
    $this -> view('frontend.QL_NhanVien.QL_NhanVien',
                [
                    'staff' => $staff,
                ]);
?>