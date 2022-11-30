$(document).ready(function () {
    // btn-contact
    $("#su-dung").click(function() {
        var sale = $(".ma-sale").val();
        var price_feeship = $(".price_feeship").val();

        var price_sale = $(".price_sale").text();

        if (sale == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: "Vui lòng nhập mã giảm giá",
                showConfirmButton: false,
                iconColor: 'red',
                timer: 1500
            })
        } else if (sale != "") {
            $.ajax ({
                url: "index.php?controller=payment&action=checkSale",
                type: "POST",
                data: {sale: sale, price_feeship: price_feeship},
                success: function(data) {
                    // console.log(data);
                    if (data == 0) {
                        location.reload();
                    }
                    else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Thông báo',
                            text: data,
                            showConfirmButton: false,
                            iconColor: 'red',
                            denyButtonText: 'Đóng',
                            showDenyButton: true,
                        })
                    }     
                    $(".price_sale").text("0 vnđ");
                    $(".price_sale_input").val("0");
                    $(".sum_price").load("index.php?controller=payment .sum_price");    

                }
            });
        }
    });

    
});


