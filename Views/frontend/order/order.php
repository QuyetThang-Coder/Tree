

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
<style>
    .action {
        background-color: #e3eaef;
        border-left: 3px solid #5b9bd1;
        margin-left: -3px;
    }
    .action a {
        color: #5b9bd1;
    }
    .action a i {
        background-color: #fff;
        color: #5b9bd1;
    }
</style>
<div id="profile">
    <div class="profile laptop_pc">
        <div class="container">
            <div class="row profile_box">
                <!-- product left -->
                <div class="profile_left col-xl-3">
                    <div class="profile_left_box">
                        <div class="profile_left_item">
                            <a href="index.php?controller=profile"><i class="bi bi-person-fill"></i></a>
                            <a href="index.php?controller=profile" class="profile_left_content">Thông tin cá nhân</a>
                        </div>
                        <div class="profile_left_item ">
                            <a href="index.php?controller=change_password"><i class="bi bi-shield-lock-fill"></i></a>
                            <a href="index.php?controller=change_password" class="profile_left_content">Đổi mật khẩu</a>
                        </div>
                        <div class="profile_left_item action">
                            <a href="index.php?controller=order"><i class="bi bi-box2-fill"></i></a>
                            <a href="index.php?controller=order" class="profile_left_content">Thông tin đơn hàng</a>
                        </div>
                        <div class="profile_left_item ">
                            <a href="index.php?controller=login&action=logout"><i class="bi bi-box-arrow-right"></i></a>
                            <a href="index.php?controller=login&action=logout" class="profile_left_content">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <!-- product right -->
                <div class="profile_right col-xl-9">
                    <div class="profile_right_box1">
                        <div class="profile_right_item">
                            <h2>Danh sách đơn hàng</h2>
                        </div>
                        <div class="profile_right_item1">
                            <?php 
                                if(isset($cancel_order)) {
                                    echo $cancel_order;
                                }
                            ?>
                            <table>
                                <tr class="fixed">
                                    <th width="">STT</th>
                                    <th width="100">Tên khách hàng</th>
                                    <th width="90">Số điện thoại</th>
                                    <th width="240">Địa chỉ</th>
                                    <th width="95">Giảm giá</th>
                                    <th width="95">Tổng tiền</th>
                                    <th width="85">Hình thức thanh toán</th>
                                    <th width="100">Trạng thái</th>
                                    <th width="80">Ngày đặt</th>
                                    <th width="60">Hành động</th>
                                </tr>
                                <?php 
                                    $i = 1;
                                    foreach ($getOrder as $getOrder) {
                                        $address = strstr ($getOrder['order_address'],"-, ", true);

                                        $address_1 = strchr($getOrder['order_address'],"-, ");
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
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $getOrder["order_name"] ?></td>
                                            <td><?php echo $getOrder["order_phone"] ?></td>
                                            <td><?php echo $address.', '.$ward_txt.', '.$district_txt.', '.$city_txt ?></td>
                                            <td><?php echo number_format( $getOrder["sale_price"]) ?> vnđ</td>
                                            <td><?php echo number_format( $getOrder["order_price"]) ?> vnđ</td>
                                            <td><?php echo mb_strtoupper($getOrder["payment"], "utf8") ?></td>
                                            <td>
                                                <?php 
                                                    if ($getOrder["status"] == 0) {
                                                ?>
                                                        <p style='background-color: #b6bef5; color: #001397; font-size:12px'>Chờ xử lý</p>
                                                        <a href="index.php?controller=order&action=cancel&id=<?php echo $getOrder['id']; ?>" onclick="return confirm('Bạn có muốn hủy đơn hàng `<?php echo $result_order['order_id']; ?>` không?')" title="Hủy">
                                                            <p style='background-color: #f9c9cd; color: #a90312; font-size:12px; margin-top: 10px;'>Hủy</p>
                                                        </a>
                                                <?php
                                                    } else if ($getOrder["status"] == 1) {
                                                ?>
                                                        <p style='background-color: #f2f98a; color: #808800; font-size:12px'>Đang giao hàng</p>
                                                <?php
                                                    } else if ($getOrder["status"] == 2) {
                                                ?>
                                                        <p style='background-color: #bfefc4; color: #006e09; font-size:12px'>Đã hoàn thành</p>
                                                <?php
                                                    } else if ($getOrder["status"] == 3) {
                                                ?>
                                                        <p style='background-color: #f9c9cd; color: #a90312; font-size:12px'>Đã hủy</p>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo date_format(date_create($getOrder['order_date']), "d/m/Y").'<br>'.date_format(date_create($getOrder['order_date']), "H:i:s"); ?></td>
                                            <td><a href="index.php?controller=order_view&order=<?php echo $getOrder["id"] ?>"><i class="bi bi-eye-fill"></i></a></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



