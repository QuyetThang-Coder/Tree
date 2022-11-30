// btn-login
$(".btn_delete_cart").on('click',function() {
    var product = $(".txt_product_js").val();
    // $.ajax ({
    //     url: "index.php?controller=cart&action=delete_cart",
    //     type: "POST",
    //     data: {product: product},
    //     success: function(data) {
    //         $("#frm_cart")[0].reset();
    //     }
    // });
    alert(product);
});