// btn-login
$("#btn_addcart").on('click',function() {
    var quantity = $(".product_quantity").val();
    var product = $("#product_text").val();
    $.ajax ({
        url: "index.php?controller=product_detail&product="+product+"&action=add_cart",
        type: "POST",
        data: {quantity: quantity},
        success: function(data) {
            if (data == "Thành công") {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Thêm giỏ hàng thành công",
                    showConfirmButton: false,
                    iconColor: '#30a702',
                    timer: 800
                })
                if ($("#cart_sum").val() == 0) {
                    location.reload();
                }
            }
            else if (data == "Thất bại") {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Thêm giỏ hàng thất bại",
                    showConfirmButton: false,
                    iconColor: '#CC0000',
                    timer: 700
                })
            }
            else if (data == "Đã tồn tại") {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Sản phẩm đã tồn tại trong giỏ hàng",
                    showConfirmButton: false,
                    iconColor: '#CC0000',
                    timer: 700
                })
            }              
            else if (data == false) {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: "vui lòng đăng nhập",
                    showConfirmButton: false,
                    iconColor: '#FF9900',
                    timer: 700
                })
            }      
            $(".div_cart").load("index.php .txt_cart");
            $(".table").load("index.php .table");
        }
    });
});