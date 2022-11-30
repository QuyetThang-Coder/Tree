$(document).ready(function () {
    // Login
    $(".phone_login").blur(function() {
        var phone = $(this).val();
        if (phone == "") {
            $(".info-phone_login").html("Vui lòng nhập trường này");
            $(".label-phone_login").addClass('form-label-err');
            $(".phone_login").addClass('input-err');
            $(".label-phone_login").removeClass('form-label-success');
        }
        else {
            $.ajax ({
                url: "index.php?controller=login&action=validate_phone_login",
                method: "POST",
                data: {phone:phone},
                success:function(data) {
                    if (data != '') {
                        $(".info-phone_login").html(data);
                        $(".phone_login").removeClass('input-err');
                        $(".label-phone_login").removeClass('form-label-success');
                        $(".label-phone_login").addClass('form-label-err');
                    } else {
                        $(".info-phone_login").html(data);
                        $(".phone_login").removeClass('input-err');
                        $(".label-phone_login").addClass('form-label-success');
                        $(".label-phone_login").removeClass('form-label-err');
                    }
                },
            });
        }
    });

    $(".password_login").blur(function() {
        var password = $(this).val();
        if (password == "") {
            $(".info-password_login").html("Vui lòng nhập trường này");
            $(".label-password_login").addClass('form-label-err');
            $(".password_login").addClass('input-err');
            $(".label-password_login").removeClass('form-label-success');
        } 
        else if (password.length < 6 ) {
            $(".info-password_login").html("Mật khẩu tối thiểu 6 ký tự");
            $(".label-password_login").addClass('form-label-err');
            $(".label-password_login").removeClass('form-label-success');
            $(".password_login").removeClass('input-err');
        } 
        else if (password.length >= 6) {
            $(".info-password_login").html("");
            $(".password_login").removeClass('input-err');
            $(".label-password_login").addClass('form-label-success');
            $(".label-password_login").removeClass('form-label-err');
        }
    });

    // btn-login
    $("#btn_login").on('click',function() {
        var phone = $(".phone_login").val();
        var password = $(".password_login").val();

        if (phone == "" || password == "" ) {
            $(".info-password_login").html("Vui lòng nhập tất cả các trường");
            $(this).addClass('btn-err');
        } else if (phone != "" && password != "") {
                if (password.length < 6) {
                    $(".info-password_login").html("Mật khẩu tối thiểu 6 ký tự.");
                }
                else if (password.length > 30) {
                    $(".info-password_login").html("Mật khẩu tối đa 30 ký tự.");
                }
                else if (6 <= password.length <= 30) {
                    $.ajax ({
                        url: "index.php?controller=login&action=login",
                        method: "POST",
                        data: {phone: phone, password: password},
                        success: function(data) {
                            if (data == "0") {
                                $(".info-password_login").html("");
                                window.location="index.php?controller=home";
                            }
                            else {
                                $(".info-password_login").html("");
                                $(".info-password_login").html(data);   
                            }                    
                        }
                    });
                }
            
        }
    });

    // Register
    $(".name_register").blur(function() {
        var name = $(this).val();
        if (name == "") {
            $(".info-name_register").html("Vui lòng nhập trường này");
            $(".label-name_register").addClass('form-label-err');
            $(".name_register").addClass('input-err');
            $(".label-name_register").removeClass('form-label-success');
        } else {
            $.ajax ({
                url: "index.php?controller=login&action=validate_name",
                method: "POST",
                data: {name:name.toLowerCase()},
                success:function(data) {
                    if (data != '') {
                        $(".info-name_register").html(data);
                        $(".name_register").removeClass('input-err');
                        $(".label-name_register").addClass('form-label-err');
                        $(".label-name_register").removeClass('form-label-success');
                    } else {
                        $(".info-name_register").html(data);
                        $(".name_register").removeClass('input-err');
                        $(".label-name_register").addClass('form-label-success');
                        $(".label-name_register").removeClass('form-label-err');
                    }
                },
            });
        }
    });
    $(".phone_register").blur(function() {
        var phone = $(this).val();
        if (phone == "") {
            $(".info-phone_register").html("Vui lòng nhập trường này");
            $(".label-phone_register").addClass('form-label-err');
            $(".phone_register").addClass('input-err');
            $(".label-phone_register").removeClass('form-label-success');
        } else {
            $.ajax ({
                url: "index.php?controller=login&action=validate_phone",
                method: "POST",
                data: {phone:phone},
                success:function(data) {
                    if (data != '') {
                        $(".info-phone_register").html(data);
                        $(".phone_register").removeClass('input-err');
                        $(".label-phone_register").addClass('form-label-err');
                        $(".label-phone_register").removeClass('form-label-success');
                    } else {
                        $(".info-phone_register").html(data);
                        $(".phone_register").removeClass('input-err');
                        $(".label-phone_register").addClass('form-label-success');
                        $(".label-phone_register").removeClass('form-label-err');
                    }
                },
            });
        }
    });
    $(".email_register").blur(function() {
        var email = $(this).val();
        let arr = email.split('@');
        if (email == "") {
            $(".info-email_register").html("Vui lòng nhập trường này");
            $(".label-email_register").addClass('form-label-err');
            $(".email_register").addClass('input-err');
            $(".label-email_register").removeClass('form-label-success');
        } 
        else if (arr[0].length < 6) {
            $(".info-email_register").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            $(".label-email_register").addClass('form-label-err');
            $(".email_register").removeClass('input-err');
            $(".label-email_register").removeClass('form-label-success');
        } else if (arr[0].length > 30) {
            $(".info-email_register").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            $(".label-email_register").addClass('form-label-err');
            $(".email_register").removeClass('input-err');
            $(".label-email_register").removeClass('form-label-success');
        }
        else if ( 6 <= arr[0].length <= 30) {
            $.ajax ({
                url: "index.php?controller=login&action=validate_email",
                method: "POST",
                data: {email: email, arr0:arr[0],arr1:arr[1]},
                success:function(data) {
                    if (data != '') {
                        $(".info-email_register").html(data);
                        $(".email_register").removeClass('input-err');
                        $(".label-email_register").addClass('form-label-err');
                        $(".label-email_register").removeClass('form-label-success');
                    } else {
                        $(".info-email_register").html(data);
                        $(".email_register").removeClass('input-err');
                        $(".label-email_register").addClass('form-label-success');
                        $(".label-email_register").removeClass('form-label-err');
                    }
                },
            });
        }
    });

    $(".location_register").blur(function() {
        var location = $(this).val();
        if (location == "") {
            $(".info-location_register").html("Vui lòng nhập trường này");
            $(".label-location_register").addClass('form-label-err');
            $(".label-location_register").removeClass('form-label-success');
            $(".location_register").addClass('input-err');
        }
        else {
            $.ajax ({
                url: "index.php?controller=login&action=validate_location",
                method: "POST",
                data: {location:location.toLowerCase()},
                success:function(data) {
                    if (data != '') {
                        $(".info-location_register").html(data);
                        $(".location_register").removeClass('input-err');
                        $(".label-location_register").addClass('form-label-err');
                        $(".label-location_register").removeClass('form-label-success');
                    } else {
                        $(".info-location_register").html(data);
                        $(".label-location_register").addClass('form-label-success');
                        $(".label-location_register").removeClass('form-label-err');
                        $(".location_register").removeClass('input-err');
                    }
                },
            });
        }
    });

    $(".password_register").blur(function() {
        var password = $(this).val();
        if (password == "") {
            $(".info-password_register").html("Vui lòng nhập trường này");
            $(".label-password_register").addClass('form-label-err');
            $(".password_register").addClass('input-err');
            $(".label-password_register").removeClass('form-label-success');
        } else if (password.length <6) {
            $(".info-password_register").html("Mật khẩu tối thiểu 6 ký tự");
            $(".label-password_register").addClass('form-label-err');
            $(".password_register").removeClass('input-err');
            $(".label-password_register").removeClass('form-label-success');
        } 
        else if (password.length > 30) {
            $(".info-password_register").html("Mật khẩu tối đa 30 ký tự");
            $(".label-password_register").addClass('form-label-err');
            $(".password_register").removeClass('input-err');
            $(".label-password_register").removeClass('form-label-success');
        }
        else if (6 <= password.length <= 30) {
            $.ajax ({
                url: "index.php?controller=login&action=validate_password",
                method: "POST",
                data: {password:password.toLowerCase()},
                success:function(data) {
                    if (data != '') {
                        $(".info-password_register").html(data);
                        $(".password_register").removeClass('input-err');
                        $(".label-password_register").addClass('form-label-err');
                        $(".label-password_register").removeClass('form-label-success');
                    } else {
                        $(".info-password_register").html(data);
                        $(".label-password_register").addClass('form-label-success');
                        $(".label-password_register").removeClass('form-label-err');
                        $(".password_register").removeClass('input-err');
                    }
                },
            });
        }
    });
    $(".repassword_register").blur(function() {
        var repassword = $(this).val();
        var password = $(".password_register").val();
        if (repassword == "") {
            $(".info-repassword_register").html("Vui lòng nhập trường này");
            $(".label-repassword_register").addClass('form-label-err');
            $(".repassword_register").addClass('input-err');
            $(".label-repassword_register").removeClass('form-label-success');
        } else {
            if (repassword != password) {
                $(".info-repassword_register").html("Mật khẩu không giống nhau");
                $(".label-repassword_register").addClass('form-label-err');
                $(".repassword_register").removeClass('input-err');
                $(".label-repassword_register").removeClass('form-label-success');
            }
            else {
                $(".info-repassword_register").html("");
                $(".label-repassword_register").removeClass('form-label-err');
                $(".repassword_register").removeClass('input-err');
                $(".label-repassword_register").addClass('form-label-success');
            }
        }
    });

    // btn-register
    $("#btn_register").on('click',function() {
        var name = $(".name_register").val();
        var email = $(".email_register").val();
        let arr = email.split('@');
        var phone = $(".phone_register").val();
        var location = $(".location_register").val();
        var password = $(".password_register").val();
        var repassword = $(".repassword_register").val();
        var city = $('.city_register').val();
        var district = $(".district_register").val();
        var ward = $(".ward_register").val();
        var city_text = $('.city_register :selected').text();
        var district_text = $(".district_register :selected").text();
        var ward_text = $(".ward_register :selected").text();
        var checkbox = $(".form-check-input").prop('checked');

        if (name == "" || email == "" || phone == "" || location == "" || password == "" || repassword == "" || city == "" || district == "" || ward == "") {
            $(".info-repassword_register").html("Vui lòng nhập tất cả các trường");
            $(this).addClass('btn-err');
        } else if (password !=  repassword ) {
            $(".info-repassword_register").html("Mật khẩu không giống nhau");
        } else if (checkbox == false) {
            $(".info-repassword_register").html("Bạn chưa chấp nhận điều khoản của chúng tôi");
        } else if (name != "" && email != "" && phone != "" && location != "" && password != "" && repassword != "" && password ==  repassword && city != "" && district != "" && ward != "" && checkbox == true) {
            if (arr[0].length < 6) {
                $(".info-repassword_register").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if (arr[0].length > 30) {
                $(".info-repassword_register").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if ( 6 <= arr[0].length <=30 ) {
                if (password.length < 6) {
                    $(".info-repassword_register").html("Mật khẩu tối thiểu 6 ký tự.");
                }
                else if (password.length > 30) {
                    $(".info-repassword_register").html("Mật khẩu tối đa 30 ký tự.");
                }
                else if (6 <= password.length <= 30) {
                    $.ajax ({
                        url: "index.php?controller=login&action=insert",
                        method: "POST",
                        data: {name: name.toLowerCase(), email: email, arr0: arr[0],arr1: arr[1],  phone: phone, location: location, password: password, city: city, district: district, ward: ward, city_text: city_text, district_text: district_text, ward_text: ward_text},
                        success: function(data) {
                            if (data == "Đăng ký thành công") {
                                $(".info-repassword_register").html("");
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    iconColor: '#30a702',
                                    timer: 1500
                                })
                                $("#frm_register")[0].reset();
                                function reload() {
                                    location.reload()
                                }
                                setTimeout(reload,500);
                            }
                            else {
                                $(".info-repassword_register").html("");
                                $(".info-repassword_register").html(data);   
                            }                    
                        }
                    });
                }
            }
        }
    });


    // Modal

    $(".phone_modal").blur(function() {
        var phone = $(this).val();
        if (phone == "") {
            $(".info-phone_modal").html("Vui lòng nhập trường này");
            $(".label-phone_modal").addClass('form-label-err');
            $(".phone_modal").addClass('input-err');
            $(".label-phone_modal").removeClass('form-label-success');
        } else {
            $.ajax ({
                url: "index.php?controller=login&action=validate_phone_modal",
                method: "POST",
                data: {phone:phone},
                success:function(data) {
                    if (data != '') {
                        $(".info-phone_modal").html(data);
                        $(".phone_modal").removeClass('input-err');
                        $(".label-phone_modal").addClass('form-label-err');
                        $(".label-phone_modal").removeClass('form-label-success');
                    } else {
                        $(".info-phone_modal").html(data);
                        $(".phone_modal").removeClass('input-err');
                        $(".label-phone_modal").addClass('form-label-success');
                        $(".label-phone_modal").removeClass('form-label-err');
                    }
                },
            });
        }
    });
    $(".email_modal").blur(function() {
        var email = $(this).val();
        let arr = email.split('@');
        if (email == "") {
            $(".info-email_modal").html("Vui lòng nhập trường này");
            $(".label-email_modal").addClass('form-label-err');
            $(".email_modal").addClass('input-err');
            $(".label-email_modal").removeClass('form-label-success');
        } 
        else if (arr[0].length < 6) {
            $(".info-email_modal").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            $(".label-email_modal").addClass('form-label-err');
            $(".email_modal").removeClass('input-err');
            $(".label-email_modal").removeClass('form-label-success');
        } else if (arr[0].length > 30) {
            $(".info-email_modal").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            $(".label-email_modal").addClass('form-label-err');
            $(".email_modal").removeClass('input-err');
            $(".label-email_modal").removeClass('form-label-success');
        }
        else if ( 6 <= arr[0].length <= 30) {
            $.ajax ({
                url: "index.php?controller=login&action=validate_email_modal",
                method: "POST",
                data: {email: email, arr0:arr[0],arr1:arr[1]},
                success:function(data) {
                    if (data != '') {
                        $(".info-email_modal").html(data);
                        $(".email_modal").removeClass('input-err');
                        $(".label-email_modal").addClass('form-label-err');
                        $(".label-email_modal").removeClass('form-label-success');
                    } else {
                        $(".info-email_modal").html(data);
                        $(".email_modal").removeClass('input-err');
                        $(".label-email_modal").addClass('form-label-success');
                        $(".label-email_modal").removeClass('form-label-err');
                    }
                },
            });
        }
    });


    $(".password_modal").blur(function() {
        var password = $(this).val();
        if (password == "") {
            $(".info-password_modal").html("Vui lòng nhập trường này");
            $(".label-password_modal").addClass('form-label-err');
            $(".password_modal").addClass('input-err');
            $(".label-password_modal").removeClass('form-label-success');
        } else if (password.length <6) {
            $(".info-password_modal").html("Mật khẩu tối thiểu 6 ký tự");
            $(".label-password_modal").addClass('form-label-err');
            $(".password_modal").removeClass('input-err');
            $(".label-password_modal").removeClass('form-label-success');
        } 
        else if (password.length > 30) {
            $(".info-password_modal").html("Mật khẩu tối đa 30 ký tự");
            $(".label-password_modal").addClass('form-label-err');
            $(".password_modal").removeClass('input-err');
            $(".label-password_modal").removeClass('form-label-success');
        }
        else if (6 <= password.length <= 30) {
            $.ajax ({
                url: "index.php?controller=login&action=validate_password",
                method: "POST",
                data: {password:password.toLowerCase()},
                success:function(data) {
                    if (data != '') {
                        $(".info-password_modal").html(data);
                        $(".password_modal").removeClass('input-err');
                        $(".label-password_modal").addClass('form-label-err');
                        $(".label-password_modal").removeClass('form-label-success');
                    } else {
                        $(".info-password_modal").html(data);
                        $(".label-password_modal").addClass('form-label-success');
                        $(".label-password_modal").removeClass('form-label-err');
                        $(".password_modal").removeClass('input-err');
                    }
                },
            });
        }
    });
    $(".repassword_modal").blur(function() {
        var repassword = $(this).val();
        var password = $(".repassword_modal").val();
        if (repassword == "") {
            $(".info-repassword_modal").html("Vui lòng nhập trường này");
            $(".label-repassword_modal").addClass('form-label-err');
            $(".repassword_modal").addClass('input-err');
            $(".label-repassword_modal").removeClass('form-label-success');
        } else {
            if (repassword != password) {
                $(".info-repassword_modal").html("Mật khẩu không giống nhau");
                $(".label-repassword_modal").addClass('form-label-err');
                $(".repassword_modal").removeClass('input-err');
                $(".label-repassword_modal").removeClass('form-label-success');
            }
            else {
                $(".info-repassword_modal").html("");
                $(".label-repassword_modal").removeClass('form-label-err');
                $(".repassword_modal").removeClass('input-err');
                $(".label-repassword_modal").addClass('form-label-success');
            }
        }
    });

    var email_check;
    var phone_check;

    $("#btn_check").on('click',function() {
        var email = $(".email_modal").val();
        let arr = email.split('@');
        var phone = $(".phone_modal").val();


        if (email == "" || phone == "") {
            $(".info-result_modal").html("Vui lòng nhập tất cả các trường");
            $(this).addClass('btn-err');
        } else if (email != "" && phone != "") {
            if (arr[0].length < 6) {
                $(".info-result_modal").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if (arr[0].length > 30) {
                $(".info-result_modal").html("Email của bạn phải nằm trong khoảng độ dài ký tự giữa 6 và 30.");
            } else if ( 6 <= arr[0].length <=30 ) {
                $.ajax ({
                    url: "index.php?controller=login&action=check",
                    method: "POST",
                    data: {email: email, arr0: arr[0], arr1: arr[1],  phone: phone},
                    success: function(data) {
                        if (data == "0") {
                            $("#btn_check").attr({'data-mdb-target':'#exampleModalToggle22','data-mdb-toggle':'modal','data-mdb-dismiss':'modal'});
                            $("#form-check")[0].reset();
                            $("#btn_check").click();
                            email_check = email;
                            phone_check = phone;
                        }
                        else {
                            $(".info-result_modal").html("");
                            $(".info-result_modal").html(data);   
                        }                    
                    }
                });
                
            }
        }
    });

    $("#exampleModalToggle22").on('shown.bs.modal',function () {
        $("#btn_check").removeAttr('data-mdb-target');
        $("#btn_check").removeAttr('data-mdb-toggle');
        $("#btn_check").removeAttr('data-mdb-dismiss');
    })

    $("#btn_change").on('click',function() {
        var password = $(".password_modal").val();
        var repassword = $(".repassword_modal").val();


        if (password == "" || repassword == "") {
            $(".info-result1_modal").html("Vui lòng nhập tất cả các trường");
            $(this).addClass('btn-err');
        } else if (password != "" && repassword != "") {
            if (password.length < 6) {
                $(".info-result1_modal").html("Mật khẩu phải tối thiểu 6 ký tự.");
            }
            else if (password.length > 30) {
                $(".info-result1_modal").html("Mật khẩu có tối đa 30 ký tự.");
            }
            else if (6 <= password.length <= 30) {
                if (password != repassword) {
                    $(".info-result1_modal").html("Mật khẩu không trunhgf nhau.");
                } else if (password == repassword) {
                    $.ajax ({
                        url: "index.php?controller=login&action=change_password",
                        method: "POST",
                        data: {email: email_check,  phone: phone_check, password: password, repassword: repassword},
                        success: function(data) {
                            if (data == "Đổi mật khẩu thành công") {
                                $(".info-result1_modal").html("");
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    iconColor: '#30a702',
                                    timer: 1000
                                })
                                function reload() {
                                    location.reload()
                                }
                                setTimeout(reload,500);
                                $("#frm_change")[0].reset();
                            }
                            else {
                                $(".info-result1_modal").html("");
                                $(".info-result1_modal").html(data);   
                            }                    
                        }
                    });
                    
                }
            }
        }
    });
    
});


