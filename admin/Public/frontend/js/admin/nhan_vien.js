$(document).ready(function () {
    $("#btn_save").click(function() {
        var name = $(".staff_name").val();
        var phone = $(".staff_phone").val();
        var email = $(".staff_email").val();
        let arr = email.split('@');
        var sex = $(".staff_sex").val();
        var position = $(".position").val();
        var address = $(".staff_address").val();

        if (name == "" || phone == "" || email == "" || address == "") {
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
        } else if (name != "" && phone != "" && email != "" && address != "") {
            $.ajax ({
                url: "index.php?controller=QL_NhanVien&action=add",
                type: "POST",
                data: {name: name, phone: phone, email: email, arr0: arr[0],arr1: arr[1], sex: sex, position:position, address: address},
                success: function(data) {
                    // console.log(data);
                    if (data == "Đăng ký thành công") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Thông báo',
                            text: data,
                            iconColor: 'green',
                        })
                        $(".staff_name").val("");
                        $(".staff_phone").val("");
                        $(".staff_email").val("");
                        $(".staff_address").val("");
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
    });

    $("#btn_update").click(function() {
        var id = $(".staff_id").val();
        var name = $(".staff_name").val();
        var phone = $(".staff_phone").val();
        var email = $(".staff_email").val();
        let arr = email.split('@');
        var sex = $(".staff_sex").val();
        var position = $(".position").val();
        var address = $(".staff_address").val();

        if (id == "" || name == "" || phone == "" || email == "" || address == "") {
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
        } else if (id != "" && name != "" && phone != "" && email != "" && address != "") {
            $.ajax ({
                url: "index.php?controller=QL_NhanVien&action=update",
                type: "POST",
                data: {id: id, name: name, phone: phone, email: email, arr0: arr[0],arr1: arr[1], sex: sex, position:position, address: address},
                success: function(data) {
                    // console.log(data);
                    if (data == "Thành công") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Thông báo',
                            text: data,
                            iconColor: 'green',
                        })
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
    });

    // Position
    $("#btn_save_position").click(function() {
        var position = $(".position_name").val();

        if (position == '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thông báo',
                text: "Vui lòng nhập tên chức vụ",
                showConfirmButton: false,
                iconColor: 'red',
                denyButtonText: 'Đóng',
                showDenyButton: true,
            })
        } else if (position != '') {
            $.ajax ({
                url: "index.php?controller=QL_NhanVien&action=add_position",
                type: "POST",
                data: {position: position},
                success: function(data) {
                    // console.log(data);
                    if (data == "Thêm thành công") {
                        $(".div_position").load("index.php?controller=QL_Nhanvien&action=view_add_nhanvien .list_position");
                    }
                    else {
                        Swal.fire({
                            position: 'center',
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


