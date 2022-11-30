$(document).ready(function () {
    // btn-contact
    $(".btn-save").click(function() {
        var pass_old = $(".pass_old").val();
        var pass = $(".pass").val();
        var repass = $(".repass").val();

        if (pass == "" || pass_old == "" || repass == "" ) {
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
        } else if (pass != "" && pass_old != "" && repass != "" ) {
            if (pass.length < 6) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Thông báo',
                    text: "Mật khẩu tối thiểu 6 ký tự",
                    showConfirmButton: false,
                    iconColor: 'red',
                    denyButtonText: 'Đóng',
                    showDenyButton: true,
                })
            } else if (pass.length > 30) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Thông báo',
                    text: 'Mật khẩu tối đa 30 ký tự',
                    showConfirmButton: false,
                    iconColor: 'red',
                    denyButtonText: 'Đóng',
                    showDenyButton: true,
                })
            } else if ( 6 <= pass.length <= 30) {
                if (pass != repass) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Thông báo',
                        text: 'Mật khẩu không trùng nhau',
                        showConfirmButton: false,
                        iconColor: 'red',
                        denyButtonText: 'Đóng',
                        showDenyButton: true,
                    })
                } else if (pass == repass) {
                    $.ajax ({
                        url: "index.php?controller=change_password&action=update",
                        type: "POST",
                        data: {pass_old: pass_old, pass: pass, repass: repass},
                        success: function(data) {
                            // console.log(data);
                            if (data == "Thành công") {
                                // location.reload();
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Thông báo',
                                    text: "Cập nhật thành công",
                                    showConfirmButton: false,
                                    iconColor: 'green',
                                    timer: '1000',
                                })
                                $(".pass_old").val("");
                                $(".pass").val("");
                                $(".repass").val("");
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
        }
    });

    
});


