<script src="Public/frontend/js/admin/san_pham_add.js"></script>
<link rel="stylesheet" href="Public/frontend/css/san_pham_add.css">
<script src="Public/frontend/tinymce/tinymce.min.js"></script>
<style>
    .qlcs {
        background: #c6defd;
        text-decoration: none;
        color: rgb(22 22 72);
        box-shadow: none;
        border: 1px solid rgb(22 22 72);
    }
    .tox-editor-header {
        position: unset !important;
    }
    .tox-tinymce--toolbar-sticky-off{
        height: 450px !important;
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
                <li class="breadcrumb-item"><a href="index.php?controller=QL_ChinhSach">Danh sách chính sách</a></li>
                <li class="breadcrumb-item"><a href="">Thêm tin chính sách</a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo chính sách mới</h3>
                <div class="tile-body">
                <form class="row" action="index.php?controller=QL_ChinhSach&action=update" method="POST" enctype="multipart/form-data">
                    <?php foreach ($policy as $policy) { ?>
                        <div class="form-group col-md-3">
                            <label class="control-label">Mã chính sách</label>
                            <input class="form-control" type="number" readonly name="id_policy" value="<?php echo $policy["id"] ?>" placeholder="">
                        </div>
                        <div class="form-group col-md-9">
                            <label class="control-label">Tiêu đề chính sách</label>
                            <input class="form-control" type="text" required autocomplete="off" value="<?php echo $policy["title_policy"] ?>" name="title_policy">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả ngắn</label>
                            <!-- <input class="form-control" type="text" required autocomplete="off" name="product_price"> -->
                            <textarea class="form-control" name="desc_policy" required autocomplete="off" id="mota"><?php echo $policy["description_policy"] ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="btn-upload">
                                <label class="control-label">Ảnh chính sách</label> <br>
                                <div id="displayImg">
                                    <img src="Public/uploads/<?php echo $policy["image_policy"] ?>" alt="">
                                </div>
                                <input type="file" onchange="ImagesFileAsURL()" name="image" id="upload">
                                <button id="btn"  class="btn">Chọn ảnh</button>
                            </label>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nội dung</label>
                            <!-- <textarea class="form-control" name="product_describe" required autocomplete="off" id="mota"></textarea> -->
                            <textarea name="content_policy" id="myTextarea" cols="30" rows="10" style="resize: vertical;"><?php echo $policy["content_policy"] ?></textarea>
                        </div>
                    <?php } ?>
                    <button class="btn btn-save" style="margin-left: 10px; margin-right: 10px" name="save">Lưu lại</button>
                    <a class="btn btn-cancel" href="">Hủy bỏ</a>
                </form>
            </div>
        </div>
    </main>






    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <script src="Public/frontend/js/main.js"></script>
    <script src="Public/frontend/js/plugins/pace.min.js"></script>
    <script>
        const inpFile = document.getElementById("inpFile");
        const loadFile = document.getElementById("loadFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
        inpFile.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            previewDefaultText.style.display = "none";
            previewImage.style.display = "block";
            reader.addEventListener("load", function () {
            previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(file);
        }
        });

    </script>


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
            /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
            link_list: [
                { title: 'My page 1', value: 'https://www.codexworld.com' },
                { title: 'My page 2', value: 'https://www.xwebtools.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'https://www.codexworld.com' },
                { title: 'My page 2', value: 'https://www.xwebtools.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }
            
                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }
            
                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script>
    <script type="text/javascript">
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