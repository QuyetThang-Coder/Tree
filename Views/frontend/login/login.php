<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Đăng ký</title>
    <link rel='shortcut icon' href="Public/frontend/img/cropped-unnamed-32x32.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font family-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="Public/frontend/css/login.css">
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    <div class="body">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                                aria-controls="pills-login" aria-selected="true">Đăng nhập</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                                aria-controls="pills-register" aria-selected="false">Đăng ký</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="tab-content">
            <div class="tab-pane fade show active vh-100 " id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <div class="container ">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5 card shadow-2-strong">
                            <!-- <form action="" class="card shadow-2-strong" style="border-radius: 1rem;"> -->
                                <div class="card-body p-5 ">
                    
                                    <h3 class="mb-5 text-center">Đăng nhập</h3>
                        
                                    <div class="form-outline">
                                        <input type="number" id="typePhoneX-2" class="form-control form-control-lg phone_login" />
                                        <label class="form-label label-phone_login" for="typePhoneX-2">Số điện thoại</label>
                                        <div class="form-helper info info-phone_login mb-3"></div>
                                    </div>
                        
                                    <div class="form-outline">
                                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg password_login" />
                                        <label class="form-label label-password_login" for="typePasswordX-2">Mật khẩu</label>
                                        <div class="form-helper info info-password_login"></div>
                                    </div>
                        
                                    <!-- Checkbox -->
                                    <div class="form-check text-end text-decoration-underline mb-4">
                                        <!-- <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                        <label class="form-check-label" for="form1Example3"> Nhớ mật khẩu </label> -->
                                        <a href="index.php?controller=home" class="text-body hover-a">Về trang chủ</a>
                                    </div>
                        
                                    <button id="btn_login" class="btn btn-primary btn-lg btn-block" type="button">Đăng nhập</button>
                                    <div class="form-check text-center text-decoration-underline mb-2 mt-4">
                                        <a data-mdb-toggle="modal" href="#exampleModalToggle1" role="button">Quên mật khẩu</a>
                                    </div>
                        
                                    <hr class="my-4">
                        
                                    <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                        type="submit"><i class="fab fa-google me-2"></i> Đăng nhập với google</button>
                                    <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                        type="submit"><i class="fab fa-facebook-f me-2"></i>Đăng nhập với facebook</button>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- register -->
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <div class="container  ">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <form action="" method="POST" id="frm_register" class="card shadow-2-strong" style="border-radius: 1rem;">
                                <div class=" card-body p-5 ">
                    
                                    <h3 class="mb-5 text-center">Đăng ký</h3>
                        
                                    <div class="form-outline ">
                                        <input type="text" id="typeNameX-2" class="form-control form-control-lg name_register" />
                                        <label class="form-label label-name_register" for="typeNameX-2">Họ tên</label>
                                        <div class="form-helper info info-name_register mb-3"></div>
                                    </div>

                                    <div class="form-outline ">
                                        <input type="number" id="typePhoneX-2" class="form-control form-control-lg phone_register" />
                                        <label class="form-label label-phone_register" for="typePhoneX-2">Số điện thoại</label>
                                        <div class="form-helper info info-phone_register mb-3"></div>
                                    </div>

                                    <div class="form-outline ">
                                        <input type="email" id="typeEmailX-2" class="form-control form-control-lg email_register" />
                                        <label class="form-label label-email_register" for="typeEmailX-2">Email</label>
                                        <div class="form-helper info info-email_register mb-3"></div>
                                    </div>

                                    <div class="form-outline ">
                                        <!-- <textarea name="" id="typeAddressX-2" class="form-control form-control-lg location_register" placeholder="Số nhà, tên đường"  cols="30" rows="10"></textarea> -->
                                        <input type="text" id="typeAddressX-2" class="form-control form-control-lg location_register" placeholder="Số nhà, tên đường">
                                        <label class="form-label label-location_register" for="typeAddressX-2">Địa chỉ</label>
                                        <div class="form-helper info info-location_register mb-3"></div>
                                    </div>
                                    <!-- select -->
                                    <!-- <div class="row"> -->
                                        <!-- <div class="select-form col-xl-6">
                                            <select class="city_register select_city" id="" name="calc_shipping_provinces" required="" disabled>
                                                <option value="">Hà Nội</option>
                                            </select>
                                        </div>
                                        <div class="select-form col-xl-6">
                                            <select class="district_register" name="calc_shipping_district" required="">
                                                <option value="">Quận / Huyện</option>
                                            </select>
                                        </div> -->
                                        <div>
                                            <select class="form-select form-select-xl mb-4 city_register" style="border: none" id="city" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn tỉnh thành</option>           
                                            </select>
                                                    
                                            <select class="form-select form-select-xl mb-4 district_register" style="border: none" id="district" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn quận huyện</option>
                                            </select>

                                            <select class="form-select form-select-xl mb-4 ward_register" style="border: none" id="ward" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn phường xã</option>
                                            </select>
                                        </div>  
                                    <!-- </div> -->
                                    
                                    <!-- end select -->
                                    <div class="form-outline ">
                                        <input type="password" id="typePasswordX-2" class="form-control form-control-lg password_register" />
                                        <label class="form-label label-password_register" for="typePasswordX-2">Mật khẩu</label>
                                        <div class="form-helper info info-password_register mb-3"></div>
                                    </div>

                                    <div class="form-outline ">
                                        <input type="password" id="typeRepeatpasswordX-2" class="form-control form-control-lg repassword_register" />
                                        <label class="form-label label-repassword_register" for="typeRepeatpasswordX-2">Nhập lại mật khẩu</label>
                                        <div class="form-helper info info-repassword_register mb-3"></div>
                                    </div>
                        
                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start ">
                                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                        <label class="form-check-label" for="form1Example3"> Bạn đồng ý với các <a href="#">điều khoản</a> </label>
                                    </div>
                        
                                    <button id="btn_register" class="btn btn-primary btn-lg btn-block" type="button">Đăng ký</button>
                                    <!-- <input type="button" id="btn_register" class="btn btn-primary btn-lg btn-block" value="Đăng ký"> -->
                                    
                                    <hr class="my-4">
                        
                                    <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                                        type="submit"><i class="fab fa-google me-2"></i> Đăng ký với google</button>
                                    <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                                        type="submit"><i class="fab fa-facebook-f me-2"></i>Đăng ký với facebook</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- First modal dialog -->
        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="form-check">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel1">Quên mật khẩu</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-outline ">
                                <input type="number" id="typePhoneX-2" class="form-control form-control-lg phone_modal" />
                                <label class="form-label label-phone_modal" for="typePhoneX-2">Số điện thoại</label>
                                <div class="form-helper info info-phone_modal mb-3"></div>
                            </div>

                            <div class="form-outline ">
                                <input type="email" id="typeEmailX-2" class="form-control form-control-lg email_modal" />
                                <label class="form-label label-email_modal" for="typeEmailX-2">Email</label>
                                <div class="form-helper info info-email_modal mb-3"></div>
                                <div class="form-helper info info-result_modal mb-3"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btn_check" type="button">Tiếp theo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Second modal dialog -->
        <div class="modal fade" id="exampleModalToggle22" aria-hidden="true" aria-labelledby="exampleModalToggleLabel22" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="" id="form-change">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel22">Đổi mật khẩu</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-outline ">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg password_modal" />
                                <label class="form-label label-password_modal" for="typePasswordX-2">Mật khẩu</label>
                                <div class="form-helper info info-password_modal mb-3"></div>
                            </div>

                            <div class="form-outline ">
                                <input type="password" id="typeRepeatpasswordX-2" class="form-control form-control-lg repassword_modal" />
                                <label class="form-label label-repassword_modal" for="typeRepeatpasswordX-2">Nhập lại mật khẩu</label>
                                <div class="form-helper info info-repassword_modal mb-3"></div>
                                <div class="form-helper info info-result1_modal mb-3"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="btn_change" type="button">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js" ></script>
    <!-- Login js (ajax) -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="Public/frontend/js/login.js"></script>
    <!-- Select -->
    <!-- <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script src="Public/frontend/js/select_location.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="Public/frontend/js/select_location.js"></script>
</body>
</html>