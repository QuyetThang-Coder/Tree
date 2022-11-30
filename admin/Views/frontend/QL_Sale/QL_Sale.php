
<style>
    .qlsl {
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
                <li class="breadcrumb-item active"><a href=""><b>Danh sách mã giảm giá</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="index.php?controller=QL_Sale&action=view_add_sale" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mã giảm giá</a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered table-striped sampleTable" cellpadding="0" cellspacing="0" id="sampleTable">
                            <thead>
                            <tr class="">
                                <th width="30">STT</th>
                                <th width="100">Tên mã giảm giá</th>
                                <th width="80">Số tiền</th>
                                <th width="150">Điều kiện</th>
                                <th width="150">Số lượng</th>
                                <th width="150">Còn lại</th>
                                <th width="100">Ngày bắt đầu</th>
                                <th width="100">Ngày kết thúc</th>
                                <th width="80">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i =1;
                                    foreach ($getSale as $key => $getSale) {
                                ?>
                                        <tr class="onRow">
                                            <td style="text-align: center;"><?php echo $i++; ?></td>
                                            <td style="text-align: center;"><?php echo strtoupper($getSale["sale_name"]) ?></td>
                                            <td style="text-align: center;"><?php echo number_format($getSale["sale_price"]) ?> vnđ</td>
                                            <td style="text-align: center;">Đơn hàng có giá trị từ <?php echo number_format($getSale["sale_rule"]) ?> vnđ</td>
                                            <td style="text-align: center;">
                                                <?php 
                                                    if ($getSale["sale_quantity"] == "999999") {
                                                        echo "Không giới hạn";
                                                    } else if ($getSale["sale_quantity"] != "999999") {
                                                        echo "Áp dụng cho ".$getSale["sale_quantity"]." đơn hàng đầu tiên";
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php 
                                                    if ($getSale["sale_quantity"] == "999999") {
                                                        echo "Không giới hạn";
                                                    } else if ($getSale["sale_quantity"] != "999999") {
                                                        echo "còn lại ".$getSale["sale_remain"]." đơn hàng";
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo date_format(date_create($getSale["start_day"]), "d/m/Y")."<br>".date_format(date_create($getSale["start_day"]), "H:i:s") ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo date_format(date_create($getSale["end_day"]), "d/m/Y")."<br>".date_format(date_create($getSale["end_day"]), "H:i:s") ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-primary btn-sm trash" href="index.php?controller=QL_Sale&action=delete_sale&id=<?php echo $getSale["id_sale"] ?>" onclick="return confirm('Bạn có muốn xóa mã giảm giá không?')" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit show-emp" href="index.php?controller=QL_Sale&action=view_update_sale&id=<?php echo $getSale["id_sale"] ?>" title="Sửa"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                } ?>
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
    <script type="text/javascript">
        $('#sampleTable').DataTable();
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