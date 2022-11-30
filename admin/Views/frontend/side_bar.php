
<?php
    if (!isset($_COOKIE["phone_admin"])) {
        header("Location: index.php?controller=login");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href="Public/frontend/img/cropped-unnamed-32x32.ico">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="Public/frontend/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li>
                <a class="app-nav__item" href="index.php?controller=login&action=logout"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <!-- <img class="app-sidebar__user-avatar" src="Public/frontend/img/staffe73f4697b3.jpg" width="50px" alt=""> -->
            <div>
                <?php foreach ($getStaff as $getStaff) { ?>
                    <p class="app-sidebar__user-name"><b>Lại Quyết Thắng</b></p>
                <?php } ?>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li><a class="app-menu__item dashboard " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
                    class="app-menu__label">Bảng điều khiển</span></a>
            </li>
            <li><a class="app-menu__item qlnv" href="index.php?controller=QL_NhanVien"><i class='app-menu__icon bx bx-id-card'></i> <span
                    class="app-menu__label">Quản lý nhân viên</span></a>
            </li>
            <li><a class="app-menu__item qlkh" href="index.php?controller=QL_KhachHang"><i class='app-menu__icon bx bx-user-voice'></i><span
                    class="app-menu__label">Quản lý khách hàng</span></a>
            </li>
            <li><a class="app-menu__item qlsp" href="index.php?controller=QL_SanPham"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span 
                    class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item qldh" href="index.php?controller=QL_DonHang"><i class='app-menu__icon bx bx-task'></i><span
                    class="app-menu__label">Quản lý đơn hàng</span></a>
            </li>
            <li><a class="app-menu__item qlsl" href="index.php?controller=QL_Sale"><i class='app-menu__icon bx bx-money'></i><span 
                    class="app-menu__label">Mã giảm giá</span></a>
            </li>


            <li><a class="app-menu__item qllh" href="index.php?controller=QL_LienHe"><i class='app-menu__icon bx bxs-contact'></i><span
                    class="app-menu__label">Quản lý liên hệ</span></a>
            </li>
            <li><a class="app-menu__item qltt" href="index.php?controller=QL_TinTuc"><i class='app-menu__icon bx bxs-news'></i><span 
                    class="app-menu__label">Quản lý tin tức</span></a>
            </li>
            <li><a class="app-menu__item qlcs" href="index.php?controller=QL_ChinhSach"><i class='app-menu__icon bx bxs-credit-card-front'></i><span 
                    class="app-menu__label">Quản lý chính sách</span></a>
            </li>
        </ul>
    </aside>