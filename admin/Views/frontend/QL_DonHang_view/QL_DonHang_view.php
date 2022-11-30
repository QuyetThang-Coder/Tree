
<style>
    .qldh {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
</style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="index.php?controller=QL_DonHang">Danh sách đơn hàng</a></li>
                <li class="breadcrumb-item"><a href=""><b>Chi tiết đơn hàng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div style="margin-bottom: 1rem; border-bottom: 1px solid #ddd">
                            <table class="table table-hover table-bordered table-striped" id="sampleTable1">
                                <thead>
                                    <tr>
                                        <th style="display: none;">STT</th>
                                        <th style="text-align: center;">ID đơn hàng</th>
                                        <th style="text-align: center;">Tên khách hàng</th>
                                        <th style="text-align: center; width: 250px">Địa chỉ nhận hàng</th>
                                        <th style="text-align: center;">Số điện thoại</th>
                                        <th style="text-align: center;">Giảm giá</th>
                                        <th style="text-align: center;">Tổng tiền</th>
                                        <th style="text-align: center;">Hình thức thanh toán</th>
                                        <th style="text-align: center;">Trạng thái</th>
                                        <th style="text-align: center;">Ngày đặt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        // $i = 1;
                                        foreach ($order as $order) {
                                            $address = strstr ($order['order_address'],"-, ", true);

                                            $address_1 = strchr($order['order_address'],"-, ");
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
                                                <!-- <td style="display: none;">1</td> -->
                                                <td style="text-align: center;">DH<?php echo $order["id"] ?></td>
                                                <td style="text-align: center;"><?php echo $order["order_name"] ?></td>
                                                <td style="text-align: center;"><?php echo $address.', '.$ward_txt.', '.$district_txt.', '.$city_txt ?></td>
                                                <td style="text-align: center;"><?php echo $order["order_phone"] ?></td>
                                                <td style="text-align: center;"><?php echo '- '.number_format($order["sale_price"]) ?> vnđ</td>
                                                <td style="text-align: center;"><?php echo number_format($order["order_price"]) ?> vnđ</td>
                                                <td style="text-align: center;"><?php echo mb_strtoupper($order["payment"], "utf8") ?></td>
                                                <td style="text-align: center;">
                                                    <?php if ($order["status"] == 0) { ?>
                                                        <a href="index.php?controller=QL_DonHang&action=update_status1&id=<?php echo $order["id"] ?>" onclick="return confirm('Bạn có muốn cập nhật đơn hàng không?')"><span class="badge bg-info">Chờ xử lý</span></a>
                                                    <?php } else if ($order["status"] == 1) { ?>
                                                        <a href="index.php?controller=QL_DonHang&action=update_status2&id=<?php echo $order["id"] ?>" onclick="return confirm('Bạn có muốn cập nhật đơn hàng không?')"><span class="badge bg-warning">Đang giao hàng</span></a>
                                                    <?php } else if ($order["status"] == 2) { ?>
                                                        <span class="badge bg-success">Hoàn thành</span>
                                                    <?php } else if ($order["status"] == 3) { ?>
                                                        <span class="badge bg-danger">Đã hủy</span>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo date_format(date_create($order["order_date"]), "d/m/Y")."<br>".date_format(date_create($order["order_date"]), "H:i:s") ?></td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <table class="table table-hover table-bordered table-striped" id="sampleTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Ảnh sản phẩm</th>
                                    <th style="text-align: center;">Số lượng</th>
                                    <th style="text-align: center;">Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($getOrder_detail as $getOrder_detail) {
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i++ ?></td>
                                            <td style="text-align: center;"><?php echo $getOrder_detail["name_product"] ?></td>
                                            <td style="text-align: center;">
                                                <img style="width: 100px;" src="Public/uploads/<?php echo $getOrder_detail["image_product"] ?>" class="img-card-person" alt="">
                                            </td>
                                            <td style="text-align: center;"><?php echo $getOrder_detail["quantity_product"] ?></td>
                                            <td style="text-align: center;"><?php echo number_format($getOrder_detail["price_product"]) ?> vnđ</td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="Public/frontend/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="Public/frontend/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="Public/frontend/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="Public/frontend/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                i = "0" + i;
                }
                return i;
            }
        }
    </script>
</body>

</html>