
<?php 
    if (!isset($_COOKIE["id_user"])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel='shortcut icon' href="Public/frontend/img/cropped-unnamed-32x32.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font family-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="Public/frontend/css/payment.css">
</head>
<body>
    <div id="payment">
        <div class="payment">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-6 payment-left">
                        <div class="payment-header">
                            <a href="index.php"><h3>Cây cảnh Store</h3></a>
                            <h5>Thông tin giao hàng</h5>
                        </div>
                        <?php 
                            if (isset($_COOKIE["id_user"])) {
                                foreach ($user_order as $user_order) {
                                    $address = strstr ($user_order['order_address'],"-, ", true);

                                    $address_1 = strchr($user_order['order_address'],"-, ");
                                    $dele_ward = trim($address_1,"-, ");
                                    $address_ward = strstr ($dele_ward,"-, ", true);
                                    $ward_txt = strstr ($address_ward,".", true);
                                    $ward = strstr ($address_ward,".");
                                    $ward_id = trim($ward,".");

                                    $address_2 = strchr($dele_ward, "-, ");
                                    $dele_district = trim($address_2,"-, ");
                                    $address_district = strstr ($dele_district,"-, ", true);
                                    $district_txt = strstr ($address_district,".", true);
                                    $district = strstr ($address_district,".");
                                    $district_id = trim($district,".");

                                    $address_3 = strchr($dele_district, "-, ");
                                    $address_city = trim($address_3,"-, ");
                                    $city_txt = strstr ($address_city,".", true);
                                    $city = strstr ($address_city,".");
                                    $city_id = trim($city,".");

                        ?>
                                    <div class="payment-left-input">
                                        <label for="txtName">Họ tên</label>
                                        <input type="text" id="txtName" value="<?php echo $user_order["order_name"] ?>" disabled>
                                    </div>
                                    <div class="payment-left-input">
                                        <label for="txtPhone">Số điện thoại</label>
                                        <input type="number" id="txtPhone" value="<?php echo $user_order["order_phone"] ?>" disabled>
                                    </div>
                                    <div class="payment-left-input">
                                        <label for="txtAddress">Địa chỉ</label>
                                        <textarea disabled name="" id="txtAddress" cols="30" rows="10"><?php echo $address.', '.$ward_txt.', '.$district_txt.', '.$city_txt ?></textarea>
                                    </div>
                                    <h3>Phương thức thannh toán</h3>
                                    <div class="section">
                                        <div class="content-box">
                                            <?php 
                                                if ($user_order["payment"] == "cod") {
                                            ?>
                                                    <div class="radio-wrapper">
                                                        <label class="radio-label" for="">
                                                            <div class="radio-input">
                                                                <input class="input-radio" type="radio" value="cod" name="redirect" id="redirect" checked />
                                                                <span class="checkmark"></span>
                                                            </div>
                                                            <div class='radio-content-input'>
                                                                <!-- name="redirect" id="redirect" -->
                                                                <!-- <img  src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=1"/> -->
                                                                <i class="bi bi-cash-stack"></i>
                                                                <span class="radio-label-primary">Thanh toán khi giao hàng (COD)</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                            <?php
                                                } else {
                                            ?>
                                                    <div class="radio-wrapper">
                                                        <label class="radio-label" for="">
                                                            <div class="radio-input">
                                                                <input class="input-radio" type="radio" value="online" name="redirect" id="redirect" checked />
                                                                <span class="checkmark"></span>
                                                            </div>
                                                            <div class='radio-content-input'>
                                                                <i class="bi bi-bank"></i>
                                                                <span class="radio-label-primary">Thanh toán online</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
        
                    </div>
                    <!-- payment right -->
                    <div class="col col-xl-6 payment-right">
                        <div class="payment-right-content">
                            <div class="list-product">
                                <table>
                                    <?php 
                                        $price = 0;
                                        foreach ($order_detail as $order_detail) {
                                    ?>
                                            <tr>
                                                <td class="img-product">
                                                    <img src="admin/Public/uploads/<?php echo $order_detail["image_product"] ?>" alt="">
                                                    <label for=""><?php echo $order_detail["quantity_product"] ?></label>
                                                </td>
                                                <td class="name-product"><?php echo $order_detail["name_product"] ?></td>
                                                <td class="price-product">
                                                    <label for="">
                                                        <?php $price += $order_detail["price_product"]; echo number_format($order_detail["price_product"]) ?> vnđ
                                                    </label>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                            </div>
                            <hr>
                            <div class="price-sum">
                                <div>
                                    <p>Tạm tính</p>
                                    <p class="price"><?php echo number_format($price) ?> vnđ</p>
                                    </div>
                                <div>
                                    <p>Phí vận chuyển</p>
                                    <p class="price">30.000 vnđ</p>
                                </div>
                                
                                <!-- Sale -->
                                <div>
                                    <p>Giảm giá</p>
                                    <p class="price">-<?php echo number_format($user_order["sale_price"]) ?> vnđ</p>
                                </div>
                            </div>
                            <hr>
                            <div class="tongcong">
                                <div>
                                    <p>Tổng cộng</p>
                                    <p class="price1"><?php echo number_format($user_order["order_price"]) ?> vnđ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Select -->
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script src="Public/frontend/js/select_location.js"></script>
</body>
</html>