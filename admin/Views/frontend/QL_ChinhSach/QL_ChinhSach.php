
<style>
    .qlcs {
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
                <li class="breadcrumb-item active"><a href=""><b>Danh sách chính sách</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="index.php?controller=QL_ChinhSach&action=view_add_chinhsach" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm chính sách</a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered table-striped sampleTable" cellpadding="0" cellspacing="0" id="sampleTable">
                            <thead>
                            <tr class="">
                                <th width="10">STT</th>
                                <th width="100">Tên chính sách</th>
                                <th width="50">Ảnh tin tức</th>
                                <th width="200">Mô tả ngắn</th>
                                <th width="20">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($policy as $policy) {
                                ?>
                                        <tr class="onRow">
                                            <td style="text-align: center;"><?php echo $i++; ?></td>
                                            <td style="text-align: center;"><?php echo $policy["title_policy"] ?></td>
                                            <td style="text-align: center;"><img style="width: 150px;" src="Public/uploads/<?php echo $policy["image_policy"] ?>" alt=""></td>
                                            <td style="text-align: center;"><?php echo $policy["description_policy"] ?></td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-primary btn-sm trash" href="index.php?controller=QL_ChinhSach&action=delete&id=<?php echo $policy["id"] ?>" onclick="return confirm('Bạn có muốn xóa chính sách không?')" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                                <a class="btn btn-primary btn-sm edit show-emp" href="index.php?controller=QL_ChinhSach&action=view_update_policy&id=<?php echo $policy["id"] ?>" title="Sửa"><i class="fas fa-edit"></i></a>
                                            </td>
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
    <script src="src/jquery.table2excel.js"></script>
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