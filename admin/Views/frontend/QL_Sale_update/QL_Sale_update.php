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
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?controller=QL_Sale">Danh sách mã giảm giá</a></li>
                <li class="breadcrumb-item"><a href="">Cập nhật mã giảm giá</a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Cập nhật mã giảm giá</h3>
                    <div class="tile-body">
                        <form class="row" method="POST" enctype="multipart/form-data">
                            <?php foreach ($sale as $sale) { ?>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Mã giảm giá </label>
                                    <input class="form-control sale_id" type="number" readonly placeholder="" value="<?php echo $sale["id_sale"] ?>" name="sale_id">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Tên mã giảm giá</label>
                                    <input class="form-control sale_name" type="text" required autocomplete="off" value="<?php echo $sale["sale_name"] ?>" name="sale_name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleSelect1" class="control-label">Số tiền giảm</label>
                                    <input class="form-control sale_price" type="number" required autocomplete="off" value="<?php echo $sale["sale_price"] ?>" name="sale_price">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Điều kiện áp dụng (Đơn hàng trên .... vnđ)</label>
                                    <input class="form-control sale_rule" type="number"  autocomplete="off" value="<?php echo $sale["sale_rule"] ?>" name="sale_rule">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Số lượng</label>
                                    <input class="form-control sale_quantity" type="number"  autocomplete="off" value="<?php echo $sale["sale_quantity"] ?>" name="sale_quantity">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Ngày bắt đầu</label>
                                    <input class="form-control start_day" type="datetime-local" required autocomplete="off" value="<?php echo $sale["start_day"] ?>" name="start_day">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Ngày kết thúc</label>
                                    <input class="form-control end_day" type="datetime-local" required autocomplete="off" value="<?php echo $sale["end_day"] ?>" name="end_day">
                                </div>  
                            <?php } ?>
                            <div class="form-group col-md-12">
                                <button class="btn btn-save" id="btn_save_update" style="margin-left: 10px; margin-right: 10px" type="button" name="save">Lưu lại</button>
                                <a class="btn btn-cancel" href="">Hủy bỏ</a>
                            </div>

                        </form>
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
    <script src="Public/frontend/js/admin/sale.js"></script>

</body>

</html>