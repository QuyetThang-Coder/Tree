

<link rel="stylesheet" href="Public/frontend/css/nhan_vien_add.css">
<style> 
    .qlnv {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
    .span_delete {
        float: right;
        color: red;
        cursor: pointer;
    }
    .span_delete:hover {
        opacity: 0.8;
    }
</style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?controller=QL_NhanVien">Danh sách nhân viên</a></li>
                <li class="breadcrumb-item"><a href="">Cập nhật thông tin nhân viên</a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">

                    <h3 class="tile-title">Cập nhật thông tin nhân viên</h3>
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                                    class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a>
                            </div>
                        </div>
                        <div class="row">
                            <?php 
                                foreach ($staff as $staff) {
                            ?>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="exampleSelect1">ID nhân viên</label>
                                        <input class="form-control staff_id" id="exampleSelect1" value="<?php echo $staff["id_staff"] ?>" type="text" name="staff_id" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="exampleSelect2">Họ và tên</label>
                                        <input class="form-control staff_name" id="exampleSelect2" value="<?php echo $staff["name_staff"] ?>" type="text" name="staff_name" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="exampleSelect3">Số điện thoại</label>
                                        <input class="form-control staff_phone" id="exampleSelect3" value="<?php echo $staff["phone_staff"] ?>" type="number" name="staff_phone" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="exampleSelect4">Địa chỉ email</label>
                                        <input class="form-control staff_email" id="exampleSelect4" value="<?php echo $staff["email_staff"] ?>" type="text" name="staff_email" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="exampleSelect5">Giới tính</label>
                                        <select class="form-control staff_sex" id="exampleSelect5" name="staff_sex">
                                            <option <?php if ($staff['sex_staff'] == 'Nam') { echo 'selected'; } ?> value="Nam">Nam</option>
                                            <option <?php if ($staff['sex_staff'] == 'Nữ') { echo 'selected'; } ?> value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-md-4">
                                        <label for="exampleSelect6" class="control-label">Chức vụ</label>
                                        <select class="form-control position" id="exampleSelect6" name="position">
                                            <?php 
                                                foreach ($countPosition as $count) {
                                                    if ($count["position"] == "0") {
                                            ?>
                                                        <option value="0">Không có chức vụ</option>
                                            <?php
                                                    } else {
                                                        foreach ($getPosition as $positionAll) {
                                            ?>
                                                            <option 
                                                                <?php if ($staff['position_staff'] == $positionAll['id_position']) { echo 'selected'; } ?>
                                                                value="<?php echo $positionAll['id_position']; ?>"><?php echo $positionAll['name_position']; ?>
                                                            </option>
                                            <?php
                                                        } 
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="exampleSelect7">Địa chỉ thường trú</label>
                                        <input class="form-control staff_address" id="exampleSelect7" value="<?php echo $staff["address_staff"] ?>" type="text" name="staff_address" autocomplete="off">
                                    </div>
                            <?php
                                }
                            ?>

                            <button class="save btn btn-save" style="margin-left: 10px; margin-right: 10px;" id="btn_update" type="submit" name="save" >Lưu lại</button>
                            <a class="btn btn-cancel" href="">Hủy bỏ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


  <!--
  MODAL
-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <!-- <form action="" method="POST"> -->
                        <div class="row">
                            <div class="form-group  col-md-12">
                                <span class="thong-tin-thanh-toan">
                                <h5>Tạo chức vụ mới</h5>
                                </span>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Nhập tên chức vụ mới</label>
                                <input class="form-control position_name" type="text" required name="position_name">
                            </div>
                            <div class="form-group div_position col-md-12">
                                <label class="control-label">Danh sách chức vụ hiện đang có</label>
                                <ul style="padding-left: 20px;" class="list_position">
                                    <?php 
                                        foreach ($countPosition as $count) {
                                            if ($count["position"] == "0") {
                                                echo "Hiện tại không có chức vụ";
                                            } else {
                                                foreach ($getPosition as $position) {
                                    ?>
                                                    <li style="border-bottom: 1px solid #ccc; padding: 5px 0;">
                                                        <?php echo $position["name_position"] ?>
                                                        <a class="span_delete" href="index.php?controller=QL_NhanVien&action=delete_position&id=<?php echo $position["id_position"] ?>">Xóa</a>
                                                    </li>
                                    <?php
                                            } 
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <BR>
                        <button class="btn btn-save" id="btn_save_position" name="addposition">Lưu lại</button>
                        <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                        <BR>
                    <!-- </form> -->
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
  <!--
  MODAL
-->


    <!-- Essential javascripts for application to work-->
    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <script src="Public/frontend/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="Public/frontend/js/plugins/pace.min.js"></script>

    <script src="Public/frontend/js/admin/nhan_vien.js"></script>
    <!-- <script type="text/javascript">
        function ImagesFileAsURL() {
            var fileSelected = document.getElementById('upload').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    document.getElementById('displayImg').innerHTML = newImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script> -->
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