$(document).ready(function () {
    // Product


    // Category
    $("#btn_save_category").click(function() {
        var category = $(".category_name").val();

        console.log(category);
        if (category == '') {
            Swal.fire({
                category: 'center',
                icon: 'error',
                title: 'Thông báo',
                text: "Vui lòng nhập tên chức vụ",
                showConfirmButton: false,
                iconColor: 'red',
                denyButtonText: 'Đóng',
                showDenyButton: true,
            })
        } else if (category != '') {
            $.ajax ({
                url: "index.php?controller=QL_SanPham&action=add_category",
                type: "POST",
                data: {category: category},
                success: function(data) {
                    // console.log(data);
                    if (data == "Thêm thành công") {
                        $(".div_category").load("index.php?controller=QL_SanPham&action=view_add_product .list_category");
                    }
                    else {
                        Swal.fire({
                            category: 'center',
                            icon: 'error',
                            title: 'Thất bại',
                            text: data,
                            showConfirmButton: false,
                            iconColor: 'red',
                            denyButtonText: 'Đóng',
                            showDenyButton: true,
                        })
                    }     
                }
            });
        }
    });
});


