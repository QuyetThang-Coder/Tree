<?php 
    // session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cây cảnh</title>
    <link rel='shortcut icon' href="Public/frontend/img/cropped-unnamed-32x32.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font family-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&display=swap" rel="stylesheet">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <scrip src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></scrip>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="Public/frontend/css/index.css">

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    <div id="body">
        <!-- Header -->
        <header>
            <div class="header">
                <div class="header-hotline">
                    <a href="tel:0946312559"><h6>Hotline: 0946312559</h6></a>
                </div>
                <div class="container">
                    <div class="row header-top">
                        <div class="col col-xl-3 header-top-item header-top-item-lf">
                            <a href="index.php"><img src="admin/Public/uploads/logo-cay-canh-store.png" alt=""></a>
                        </div>
                        <div class="col col-xl-6 header-top-item">
                            <div>
                                <input type="text" placeholder="Tìm kiếm">
                                <span><i class="bi bi-search"></i></span>
                            </div>
                        </div>
                        <div class="col col-xl-3 header-top-item">
                            <!-- <a href="index.php?controller=login" class="h6">Đăng nhập</a> -->
                            <ul class="header-top-item-login">
                                <li>
                                    <!-- <a href="login.html" class="h6">Đăng nhập</a> -->
                                    <?php 
                                        if (isset($_COOKIE["phone"])) {
                                            foreach ($user as $user) {
                                                // $_COOKIE['id_user'] = $user['id_user'];
                                    ?>
                                                <a href="#" class="h6"><?php echo ucwords($user['name_user']) ?></a>
                                                <ul>
                                                    <li>
                                                        <a href="index.php?controller=profile"><i class="bi bi-person-fill"></i></a>
                                                        <a href="index.php?controller=profile" class="button_href">Thông tin cá nhân</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="bi bi-box2-fill"></i></a>
                                                        <a href="index.php?controller=order" class="button_href">Thông tin đơn hàng</a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?controller=login&action=logout"><i class="bi bi-box-arrow-right"></i></a>
                                                        <a href="index.php?controller=login&action=logout" class="button_href">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                    <?php
                                            }
                                        } else {
                                    ?>
                                            <a href="index.php?controller=login" class="h6 btn-login-header">Đăng nhập</a>
                                    <?php
                                        }
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-bg">
                    <div class="container">
                        <div class="row header-bottom">
                            <div class="col col-9 header-bottom-left">
                                <ul>
                                    <li>
                                        <a href="index.php?controller=home" class="active_home">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="index.php?controller=introduce" class="active_introduce">Giới thiệu</a>
                                    </li>
                                    <li class="menu-nav menu-drop">
                                        <a href="index.php?controller=product" class="active_product">Sản phẩm <i class="bi bi-chevron-down"></i></a>
                                        <ul class="subnav">
                                            <?php 
                                                foreach ($category as $category) {
                                            ?> 
                                                <li><a href="index.php?controller=product&action=select&category=<?php echo $category['id'] ?>"><?php echo $category['name_category'] ?></a></li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="index.php?controller=news" class="active_news">Tin tức</a>
                                    </li>
                                    <li>
                                        <a href="index.php?controller=policy" class="active_policy">Chính sách</a>
                                    </li>
                                    <li>
                                        <a href="index.php?controller=contact" class="active_contact">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-3 header-bottom-right">
                                <ul>
                                    <li class="menu-nav cart-drop">
                                        <?php 
                                            if (isset($_COOKIE["id_user"])) {
                                                foreach ($sum_cart as $sum_cart) {
                                                    if ($sum_cart['sum'] == 0) {
                                        ?>
                                                        <a href="index.php?controller=cart" id="cart_sum" class="active">Giỏ hàng: 0 | 0 vnđ</a>
                                                        <div class="cart-list">
                                                            <div class="cart-empty">
                                                                <h5 class="h5">Không có sản phẩm nào trong giỏ hàng</h5>
                                                            </div>
                                                        </div>
                                        <?php
                                                    } else {
                                        ?>
                                                        <div class="div_cart">
                                                            <a href="index.php?controller=cart" class="active txt_cart">
                                                                Giỏ hàng: <?php echo $sum_cart['sum'] ?> | 
                                                                <?php
                                                                    $total_money = 0; 
                                                                    foreach ($allCart as $total) {
                                                                        if ($total["discount_product"] == 0) {
                                                                            $total_money += ($total["price_product"] * $total["quantity"]);
                                                                        } else {
                                                                            $total_money += ($total["discount_product"] * $total["quantity"]);
                                                                        }
                                                                    }
                                                                    echo number_format($total_money); 
                                                                ?> vnđ
                                                            </a>
                                                        </div>
                                                        <div class="cart-list">
                                                            <div class="cart-list-heading"><h6>Giỏ hàng</h6></div>
                                                            <div class="cart-list-table">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr class="fixed">
                                                                            <th scope="col" width="5">#</th>
                                                                            <th scope="col" width="10">Ảnh</th>
                                                                            <th scope="col" width="80">Tên</th>
                                                                            <th scope="col" width="70">Giá</th>
                                                                            <th scope="col" width="50">Số lượng</th>
                                                                            <th scope="col" width="70">Thành tiền</th>
                                                                            <th scope="col" width="5">Xóa</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="cart_list_content">
                                                                        <?php
                                                                            $i = 1; 
                                                                            $price = 0;
                                                                            foreach ($allCart as $allCart) {
                                                                            
                                                                        ?>
                                                                                <tr>
                                                                                    <td scope="row"><?php echo $i++ ?></td>
                                                                                    <td>
                                                                                        <img src="admin/Public/uploads/<?php echo $allCart['image_product'] ?>" alt="">
                                                                                    </td>
                                                                                    <td><?php echo $allCart['name_product'] ?></td>
                                                                                    <?php 
                                                                                        if ($allCart['discount_product'] == 0) {
                                                                                    ?>
                                                                                            <td><?php echo number_format($allCart['price_product']) ?> ₫</td>
                                                                                    <?php
                                                                                        } else {
                                                                                    ?>
                                                                                            <td><?php echo  number_format($allCart['discount_product']) ?> ₫</td>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                    <td><?php echo $allCart['quantity'] ?></td>
                                                                                    <?php 
                                                                                        if ($allCart['discount_product'] == 0) {
                                                                                    ?>
                                                                                            <td><?php $price += ($allCart['price_product'] * $allCart['quantity']); echo number_format($allCart['price_product'] * $allCart['quantity']) ?> ₫</td>
                                                                                    <?php
                                                                                        } else {
                                                                                    ?>
                                                                                            <td><?php $price += ($allCart['discount_product'] * $allCart['quantity']); echo number_format($allCart['discount_product'] * $allCart['quantity']) ?> ₫</td>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                    <td>
                                                                                        <a class="btn btn-danger" href="index.php?controller=cart&action=delete_cart&product=<?php echo $allCart['id_product'] ?>">
                                                                                            <i class="bi bi-trash3"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php        
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <hr>
                                                            <div class="cart-list-price">
                                                                <h5>Tổng: <?php echo number_format($price) ?> vnđ</h5>
                                                            </div>
                                                        </div>
                                        <?php
                                                    }
                                        ?>
                    
                                        <?php
                                            } } else {
                                        ?>
                                                <a href="index.php?controller=cart" class="active">Giỏ hàng: 0 | 0 vnđ</a>
                                        <?php
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- <script src="Public/frontend/js/delete_cart.js"></script> -->