$(document).ready(function () {
    $(".name_contact").blur(function() {
        var name = $(this).val();
        if (name == "") {
            $(".info-name_contact").html("Vui lòng nhập trường này");
        } else {
            $(".info-name_contact").html("");
        }
    });
    $(".phone_contact").blur(function() {
        var phone = $(this).val();
        if (phone == "") {
            $(".info-phone_contact").html("Vui lòng nhập trường này");
        } else {
            $.ajax ({
                url: "index.php?controller=contact&action=validate_phone",
                type: "POST",
                data: {phone: $(".phone_contact").val()},
                success:function(data) {
                    console.log(data);
                    $(".info-phone_contact").html(data);
                },
            });
        }
    });
    $(".email_contact").blur(function() {
        var email = $(this).val();
        let arr = email.split('@');
        if (email == "") {
            $(".info-email_contact").html("Vui lòng nhập trường này");
        } 
        else if (arr[0].length < 6) {
            $(".info-email_contact").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
        } else if (arr[0].length > 30) {
            $(".info-email_contact").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
        }
        else if ( 6 <= arr[0].length <= 30) {
            $.ajax ({
                url: "index.php?controller=contact&action=validate_email",
                type: "POST",
                data: {email: email, arr0:arr[0],arr1:arr[1]},
                success:function(data) {
                    if (data != '') {
                        $(".info-email_contact").html(data);
                    } else {
                        $(".info-email_contact").html(data);
                    }
                },
            });
        }
    });

    $(".location_contact").blur(function() {
        var location = $(this).val();
        if (location == "") {
            $(".info-location_contact").html("Vui lòng nhập trường này");
        }
        else {
            $(".info-location_contact").html("");
        }
    });

    $(".desc_contact").blur(function() {
        var location = $(this).val();
        if (location == "") {
            $(".info-desc_contact").html("Vui lòng nhập trường này");
        }
        else {
            $(".info-desc_contact").html("");
        }
    });

    // btn-contact
    $("#btn_contact").click(function() {
        var name = $(".name_contact").val();
        var email = $(".email_contact").val();
        let arr = email.split('@');
        var phone = $(".phone_contact").val();
        var location = $(".location_contact").val();
        var desc = $(".desc_contact").val();

        if (name == "" || email == "" || phone == "" || location == "" || desc =="" ) {
            $(".info-desc_contact").html("Vui lòng nhập tất cả các trường");
            $(this).addClass('btn-err');
        } else if (name != "" && email != "" && phone != "" && location != "" && desc != "") {
            if (arr[0].length < 6) {
                $(".info-desc_contact").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if (arr[0].length > 30) {
                $(".info-desc_contact").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if ( 6 <= arr[0].length <=30 ) {
                $.ajax ({
                    url: "index.php?controller=contact&action=insert",
                    type: "POST",
                    data: {name: name, email: email, arr0: arr[0],arr1: arr[1],  phone: phone, location: location, desc: desc},
                    success: function(data) {
                        if (data == "Gửi thành công") {
                            $(".info-desc_contact").html("");
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data,
                                showConfirmButton: false,
                                iconColor: '#30a702',
                                timer: 1500
                            })
                            $("#frm_contact")[0].reset();
                            function reload() {
                                location.reload()
                            }
                            setTimeout(reload,500);
                        }
                        else {
                            $(".info-desc_contact").html("");
                            $(".info-desc_contact").html(data);   
                        }                    
                    }
                });
            }
        }
    });

    
});


