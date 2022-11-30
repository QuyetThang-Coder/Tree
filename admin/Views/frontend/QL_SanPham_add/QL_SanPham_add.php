
<link rel="stylesheet" href="Public/frontend/css/san_pham_add.css">
<style>
    .qlsp {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
    .tox-editor-header {
        position: unset !important;
    }
    /* .tox-tinymce--toolbar-sticky-off{
        height: 450px !important;
    } */
    .span_delete {
        float: right;
        color: red;
        cursor: pointer;
    }
    .span_delete:hover {
        opacity: 0.8;
    }
</style>
<?php
    if (isset($_SERVER['HTTP_REFERER']) && isset($_SESSION["success"])) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thông báo',
                    text: 'Thêm thành công',
                    iconColor: 'green',
                })
            </script>";
        unset($_SESSION["success"]);
    }
    if (isset($_SERVER['HTTP_REFERER']) && isset($_SESSION["error"])) {
        echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Thông báo',
                    text: 'Upload không thành công',
                    iconColor: 'red',
                })
            </script>";
        unset($_SESSION["error"]);
    }
?>
  <main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?controller=QL_SanPham">Danh sách sản phẩm</a></li>
            <li class="breadcrumb-item"><a href="">Thêm sản phẩm</a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                            class="fas fa-folder-plus"></i> Thêm danh mục</a>
                    </div>
                </div>
                <form class="row" action="index.php?controller=QL_SanPham&action=add" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-md-4">
                        <label class="control-label">Mã sản phẩm </label>
                        <input class="form-control" type="number" readonly placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Tên sản phẩm</label>
                        <input class="form-control product_name" type="text"  autocomplete="off" name="product_name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleSelect1" class="control-label">Danh mục</label>
                        <select class="form-control category" id="exampleSelect1" name="category">
                            <?php 
                                foreach ($countCategory as $count) {
                                    if ($count["Category"] == "0") {
                            ?>
                                        <option value="0">Không có danh mục</option>
                            <?php
                                    } else {
                                        foreach ($getCategory as $CategoryAll) {
                            ?>
                                            <option value="<?php echo $CategoryAll["id"] ?>"><?php echo $CategoryAll["name_category"] ?></option>
                            <?php
                                        } 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Giá bán</label>
                        <input class="form-control product_price" type="number"  autocomplete="off" name="product_price">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Giảm giá</label>
                        <input class="form-control product_discount" type="number"  autocomplete="off" name="product_discount">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Số lượng</label>
                        <input class="form-control product_amount" type="number"  autocomplete="off" name="product_amount">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Mô tả ngắn</label>
                        <textarea name="product_shortdesc" class="form-control product_shortdesc" id="" cols="40" rows="20" style="resize: vertical;"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="btn-upload">
                        <label class="control-label">Ảnh sản phẩm</label> <br>
                        <div id="displayImg"></div>
                        <input type="file" onchange="ImagesFileAsURL()" class="product_image" name="image" id="upload">
                        <button id="btn"  class="btn">Chọn ảnh</button>
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Mô tả sản phẩm</label>
                        <!-- <textarea class="form-control" name="product_describe"  autocomplete="off" id="mota"></textarea> -->
                        <textarea name="product_description" id="myTextarea" class="product_description" cols="30" rows="10" style="resize: vertical;"></textarea>
                    </div>
                    <button class="btn btn-save" id="btn_save" style="margin-left: 10px; margin-right: 10px" name="save">Lưu lại</button>
                    <a class="btn btn-cancel" href="QL_SanPham.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
  </main>

  <!--
  MODAL DANH MỤC
-->
    <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                            <h5>Thêm mới danh mục </h5>
                            </span>
                        </div>
                        <div class="form-group  col-md-12">
                            
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tên danh mục mới</label>
                            <input class="form-control category_name" type="text" name="category_name">
                        </div>
                        <div class="form-group col-md-12 div_category">
                            <label class="control-label">Danh mục sản phẩm hiện đang có</label>
                            <ul style="padding-left: 20px;" class="list_category">
                                <?php 
                                    foreach ($countCategory as $count) {
                                        if ($count["category"] == "0") {
                                            echo "Hiện tại không có danh mục nào";
                                        } else {
                                            foreach ($getCategory as $category) {
                                    ?>
                                                <li style="border-bottom: 1px solid #ccc; padding: 5px 0;">
                                                    <?php echo $category["name_category"] ?>
                                                    <a class="span_delete" href="index.php?controller=QL_SanPham&action=delete_category&id=<?php echo $category["id"] ?>">Xóa</a>
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
                    <button class="btn btn-save" id="btn_save_category" name="addcategory">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
  <!--
MODAL
-->




    <!-- JS -->
    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <script src="Public/frontend/js/main.js"></script>
    <script src="Public/frontend/js/plugins/pace.min.js"></script>
    <!--  -->
    <script src="Public/frontend/js/admin/san_pham.js"></script>

    <!-- image -->
    <script>
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
    </script>

    <!-- Tiny -->
    <script src="Public/frontend/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myTextarea',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            importcss_append: true,
            
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 550,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script>
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