
<?php 
    if (!isset($_COOKIE["id_user"])) {
        header("Location: index.php");
    }
    foreach ($sum_cart as $sum_cart) {
        if ($sum_cart["sum"] == "0") {
            header("Location: index.php");
        }
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
    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="Public/frontend/css/payment.css">
    <!-- JS -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    <?php 
        if (isset($_SERVER['HTTP_REFERER']) && isset($_SESSION["error"])) {
            echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Thông báo',
                        text: '".$_SESSION["error"]."',
                        showConfirmButton: false,
                        iconColor: 'red',
                        denyButtonText: 'Đóng',
                        showDenyButton: true,
                    })
                </script>";
        }
    ?>
    <div id="payment">
        <div class="payment">
            <div class="container">
                <form action="index.php?controller=payment&action=order" method="POST">
                    <div class="row">
                        <div class="col col-xl-6 payment-left">
                            <div class="payment-header">
                                <a href="index.php"><h3>Cây cảnh Store</h3></a>
                                <ul>
                                    <li><a href="index.php?controller=cart" style="color: #54b3e5;" >Giỏ hàng</a></li>
                                    <li><a href="#">Thanh toán</a></li>
                                </ul>
                                <h5>Thông tin giao hàng</h5>
                            </div>
                            <?php 
                                if (isset($_COOKIE["id_user"])) {
                                    foreach ($user as $user) {
                                        $address = strstr ($user['address'],"-, ", true);

                                        $address_1 = strchr($user['address'],"-, ");
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
                                            <input type="text" id="txtName" name="txtName" value="<?php echo ucwords($user["name_user"]) ?>">
                                        </div>
                                        <div class="payment-left-input">
                                            <label for="txtPhone">Số điện thoại</label>
                                            <input type="number" id="txtPhone" name="txtPhone" value="<?php echo $user["number_phone"] ?>">
                                        </div>
                                        <div class="payment-left-input">
                                            <label for="txtAddress">Địa chỉ</label>
                                            <!-- <textarea name="" id="txtAddress" cols="30" rows="10"><?php echo $user["address"] ?></textarea> -->
                                            <input type="text" id="txtAddress" name="txtAddress" value="<?php echo $address ?>">
                                            <div>
                                                <select class="form-select form-select-xl mb-4 mt-4 city_register" name="slCity" style="border: none" id="city" aria-label=".form-select-sm">
                                                    <option value="<?php echo $city_id ?>" selected><?php echo ucwords($city_txt) ?></option>           
                                                </select>
                                                <input type="hidden" name="txtCity" class="txtCity" readonly>
                                                        
                                                <select class="form-select form-select-xl mb-4 district_register" name="slDistrict" style="border: none" id="district" aria-label=".form-select-sm">
                                                    <option value="" >Chọn quận huyện</option>    
                                                    <option value="<?php echo $district_id ?>" selected><?php echo $district_txt ?></option>
                                                </select>
                                                <input type="hidden" name="txtDistrict" class="txtDistrict" readonly>

                                                <select class="form-select form-select-xl mb-4 ward_register" name="slWard" style="border: none" id="ward" aria-label=".form-select-sm">
                                                    <option value="" >Chọn phường xã</option>    
                                                    <option value="<?php echo $ward_id ?>" selected><?php echo $ward_txt ?></option>
                                                </select>
                                                <input type="hidden" name="txtWard" class="txtWard" readonly>
                                            </div> 
                                        </div>
                            <?php
                                    }
                                }
                            ?>
            
                            <h3>Phương thức thannh toán</h3>
                            <div class="section">
                                <div class="content-box">
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
                                    <!--  -->
                                    <div class="radio-wrapper">
                                        <label class="radio-label" for="">
                                            <div class="radio-input">
                                                <input class="input-radio" type="radio" value="online" name="redirect" id="redirect" />
                                                <span class="checkmark"></span>
                                            </div>
                                            <div class='radio-content-input'>
                                                <!-- <img  src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=1"/> -->
                                                <i class="bi bi-bank"></i>
                                                <span class="radio-label-primary">Thanh toán online</span>
                                            </div>
                                        </label>
                                    </div>
                                    <!-- span -->
                                    <span class="attention">Chú ý: Cửa hàng chỉ giao hàng trong tỉnh Hà Nội</span>
                                </div>
                            </div>
                            <div class="payment-button payment-button-cart">
                                <a href="index.php?controller=cart">Giỏ hàng</a>
                            </div>
                            <div class="payment-button payment-button-order">
                                <input type="submit" value="Đặt hàng">
                            </div>
                        </div>
                        <!-- payment right -->
                        <div class="col col-xl-6 payment-right">
                            <div class="payment-right-content">
                                <div class="list-product">
                                    <table>
                                        <?php 
                                            $price = 0;
                                            foreach ($allCart as $allCart) {
                                        ?>
                                                <tr>
                                                    <td class="img-product">
                                                        <img src="admin/Public/uploads/<?php echo $allCart["image_product"] ?>" alt="<?php echo $allCart["name_product"] ?>">
                                                        <label for=""><?php echo $allCart["quantity"] ?></label>
                                                    </td>
                                                    <td class="name-product"><?php echo $allCart["name_product"] ?></td>
                                                    <td class="price-product">
                                                        <?php 
                                                            if ($allCart["discount_product"] == "0") {
                                                        ?>
                                                                <label for=""><?php  $price += ($allCart['price_product'] * $allCart['quantity']); echo number_format($allCart["price_product"] * $allCart["quantity"]) ?> vnđ</label>
                                                        <?php
                                                            } else {
                                                        ?>
                                                                <label for=""><?php  $price += ($allCart['discount_product'] * $allCart['quantity']); echo number_format($allCart["discount_product"] * $allCart["quantity"]) ?> vnđ</label>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                                <hr>
                                <div class="payment-right-sale">
                                    <input type="text" id="ma-sale" name="sale_text" placeholder="Mã giảm giá" autocomplete="off" class="ma-sale">
                                    <input type="button" name="use_sale" id="su-dung" value="Sử dụng" class="su-dung">
                                    <input type="button" name="list_sale" data-toggle="modal" data-target="#exampleModalLong" value="Danh sách mã giảm giá" class="list_sale">
                                </div>
                                <hr>
                                <div class="price-sum">
                                    <div>
                                        <p>Tạm tính</p>
                                        <p class="price"><?php echo number_format($price) ?> vnđ</p>
                                        </div>
                                    <div>
                                        <p>Phí vận chuyển</p>
                                        <p class="price"><?php $fee_ship = 30000; echo number_format($fee_ship)?> vnđ</p>
                                    </div>
                                    
                                    <!-- Sale -->
                                    <div class="price_sale_div">
                                        <p>Giảm giá</p>
                                        <p class="price price_sale">
                                            <?php 
                                                $sale_price = 0;
                                                if (!isset($_SESSION["sale_price"]) || $_SESSION["sale_price"] == "0") {
                                                    $sale_price = 0;
                                                    echo "-".$sale_price." vnđ";
                                                } else if (isset($_SESSION["sale_price"]) || $_SESSION["sale_price"] != "0") {
                                                    $sale_price = $_SESSION["sale_price"];
                                                    echo "-".number_format($sale_price).' vnđ';
                                                }
                                            ?>
                                        </p>
                                        <input type="hidden" style="display: none;" readonly class="price_sale_input" name="sale_price" value="<?php echo $sale_price ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="tongcong">
                                    <div>
                                        <p>Tổng cộng</p>
                                        <input type="hidden" class="price_feeship" readonly style="display: none;" value="<?php echo $price + $fee_ship ?>">
                                        <p class="price1 sum_price">
                                            <?php 
                                                if ($sale_price != "0") {
                                                    $sum_price = $price + $fee_ship - $sale_price;
                                                    $_SESSION["sum_price"] = $sum_price;
                                                    echo number_format($sum_price).' vnđ';
                                                } else {
                                                    $sum_price = $price + $fee_ship;
                                                    $_SESSION["sum_price"] = $sum_price;
                                                    echo number_format($sum_price).' vnđ';
                                                }
                                            ?>
                                        </p>
                                        <!-- <input type="text" class="sum_price_input" name="sum_price" value="<?php echo $sum_price ?>"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Danh sách mã giảm giá</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body-content">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="table-fixed-top">
                                                <th width="20">STT</th>
                                                <th width="100">Mã giảm giá</th>
                                                <th width="90">Số tiền</th>
                                                <th width="120">Điều kiện</th>
                                                <th width="120">Số lượng</th>
                                                <th width="90">Còn lại</th>
                                                <th width="120">Ngày bắt đầu</th>
                                                <th width="120">Ngày kết thúc</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($CountSale as $CountSale) {
                                                    if($CountSale["sum_sale"] == "0") {
                                            ?>
                                                        <tr>
                                                            <td colspan="8">Không có mã giảm giá nào trong thời gian này</td>
                                                        </tr>
                                            <?php
                                                    } else {
                                                        $i = 1;
                                                        foreach ($getSale as $getSale) {
                                            ?>
                                                            <tr class="table-border-bottom">
                                                                <td width="40"><?php echo $i++ ?></td>
                                                                <td width="100"><?php echo strtoupper($getSale["sale_name"]) ?></td>
                                                                <td width="80"><?php echo number_format($getSale["sale_price"]) ?> vnđ</td>
                                                                <td width="120">
                                                                    Áp dụng cho đơn hàng trên <?php echo number_format($getSale["sale_rule"]) ?> vnđ
                                                                </td>
                                                                <td width="120">
                                                                    <?php
                                                                        if ($getSale["sale_quantity"] == "999999") {
                                                                            echo "Không giới hạn";
                                                                        } else {
                                                                            echo "Áp dụng cho ".$getSale["sale_quantity"]." đơn hàng đầu tiên";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td width="90">
                                                                    <?php
                                                                        if ($getSale["sale_quantity"] == "999999") {
                                                                            echo "Không giới hạn";
                                                                        } else {
                                                                            echo "Còn lại ".$getSale["sale_remain"]." đơn hàng";
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td width="100"><?php echo date_format(date_create($getSale["start_day"]), "d-m-Y").'<br>'. date_format(date_create($getSale["start_day"]), "H:i:s") ?></td>
                                                                <td width="100"><?php echo date_format(date_create($getSale["end_day"]), "d-m-Y").'<br>'. date_format(date_create($getSale["end_day"]), "H:i:s") ?></td>
                                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                }
                                            ?>
    
                                            <!-- <tr>
                                                <td colspan="8">Không có mã giảm giá nào</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
    <!-- Use sale -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="Public/frontend/js/use_sale.js"></script>
    <!-- Select -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js'></script>
    <script>
        $(document).ready(function () {
            // City
            var city = document.getElementById("city");
            city.onchange = function() {
                var txtCity_select1 = $("#city :selected").text(); 
                $(".txtDistrict").val(txtCity_select1)
            }
            // Ward
            var ward = document.getElementById("ward");
            ward.onchange = function() {
                var txtWard_select1 = $("#ward :selected").text(); 
                $(".txtWard").val(txtWard_select1)
            }
            var txtCity_select = $("#city :selected").text(); 
            $(".txtCity").val(txtCity_select)

            var txtWard_select = $("#ward :selected").text(); 
            $(".txtWard").val(txtWard_select)
        })
    </script>
    <script src="Public/frontend/js/select_location.js"></script>
    <script>
        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }

            const result = data.filter(n => n.Id === "01");
            for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Id);
            }

            const dataWards = result[0].Districts.filter(n => n.Id === "<?php echo $district_id ?>");
            for (const w of dataWards[0].Wards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Id);
            }

            var txtDistrict_select = $("#district :selected").text();
            $(".txtDistrict").val(txtDistrict_select)

            var txtDistrict_select = $("#district :selected").text();
            district.onchange = function () {
                ward.length = 1;

                var txtDistrict_select1 = $("#district :selected").text(); 
                $(".txtDistrict").val(txtDistrict_select1)

                const dataCity = data.filter((n) => n.Id === "01");
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };

        }
    </script>
</body>
</html>