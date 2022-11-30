$("#btn_login").on('click',function() {
    var phone = $(".phone_login").val();
    var pass = $(".password_login").val();

    if (phone == "" || pass == "" ) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: "Thông báo",
            text: "Vui lòng nhập tất cả các trường",
            showConfirmButton: false,
            iconColor: 'red',
            timer: 1500
        })  
    }
    else if ( phone != "" && pass != "" ) {
        $.ajax ({
            url: "index.php?controller=login&action=login",
            method: "POST",
            data: {phone: phone, password: pass},
            success: function(data) {
                if (data == "0") {
                    window.location="index.php?controller=dashboard";
                }
                else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: "Thông báo",
                        text: data,
                        showConfirmButton: false,
                        iconColor: 'red',
                        timer: 1500
                    })  
                }                    
            }
        });
    }
});