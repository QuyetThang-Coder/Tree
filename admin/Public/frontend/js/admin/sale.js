$(document).ready(function () {
    $("#btn_save_add").click(function() {
        var name = $(".sale_name").val();
        var price = $(".sale_price").val();
        var rule = $(".sale_rule").val();
        var quantity = $(".sale_quantity").val();
        var start = $(".start_day").val();
        var end = $(".end_day").val();

        if (name == "" || price == "" || rule == "" || start == "" || end == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thông báo',
                text: "Vui lòng nhập đầy đủ các trường",
                showConfirmButton: false,
                iconColor: 'red',
                denyButtonText: 'Đóng',
                showDenyButton: true,
            })
        } else if (name != "" && price != "" && rule != "" && start != "" && end != "") {
            if (quantity == "") {
                quantity = "999999";
                $.ajax ({
                    url: "index.php?controller=QL_Sale&action=add",
                    type: "POST",
                    data: {name: name, price: price, quantity: quantity, rule: rule, start: start, end: end},
                    success: function(data) {
                        // console.log(data);
                        if (data == "Thêm thành công") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thông báo',
                                text: data,
                                iconColor: 'green',
                            });
                            $(".sale_name").val("");
                            $(".sale_price").val("");
                            $(".sale_rule").val("");
                            $(".sale_quantity").val("");
                            $(".start_day").val("");
                            $(".end_day").val("");
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
                    }
                });
            } else if (quantity != "") {
                $.ajax ({
                    url: "index.php?controller=QL_Sale&action=add",
                    type: "POST",
                    data: {name: name, price: price, quantity: quantity, rule: rule, start: start, end: end},
                    success: function(data) {
                        // console.log(data);
                        if (data == "Thêm thành công") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thông báo',
                                text: data,
                                iconColor: 'green',
                            });
                            $(".sale_name").val("");
                            $(".sale_price").val("");
                            $(".sale_rule").val("");
                            $(".sale_quantity").val("");
                            $(".start_day").val("");
                            $(".end_day").val("");
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
                    }
                });
            }
        }
        
    });

    // Update
    $("#btn_save_update").click(function() {
        var id = $(".sale_id").val();
        var name = $(".sale_name").val();
        var price = $(".sale_price").val();
        var rule = $(".sale_rule").val();
        var quantity = $(".sale_quantity").val();
        var start = $(".start_day").val();
        var end = $(".end_day").val();

        if (id == "" || name == "" || price == "" || rule == "" || start == "" || end == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thông báo',
                text: "Vui lòng nhập đầy đủ các trường",
                showConfirmButton: false,
                iconColor: 'red',
                denyButtonText: 'Đóng',
                showDenyButton: true,
            })
        } else if (id != "" || name != "" && price != "" && rule != "" && start != "" && end != "") {
            if (quantity == "") {
                quantity = "999999";
                $.ajax ({
                    url: "index.php?controller=QL_Sale&action=update",
                    type: "POST",
                    data: {id: id, name: name, price: price, quantity: quantity, rule: rule, start: start, end: end},
                    success: function(data) {
                        // console.log(data);
                        if (data == "Thêm thành công") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thông báo',
                                text: data,
                                iconColor: 'green',
                            });
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
                    }
                });
            } else if (quantity != "") {
                $.ajax ({
                    url: "index.php?controller=QL_Sale&action=update",
                    type: "POST",
                    data: {id: id, name: name, price: price, quantity: quantity, rule: rule, start: start, end: end},
                    success: function(data) {
                        // console.log(data);
                        if (data == "Thêm thành công") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Thông báo',
                                text: data,
                                iconColor: 'green',
                            });
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
                    }
                });
            }
        }
        
    });
});


