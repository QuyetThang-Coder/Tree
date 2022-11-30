
<style>
    .action {
        background-color: #e3eaef;
        border-left: 3px solid #5b9bd1;
        margin-left: -3px;
    }
    .action a {
        color: #5b9bd1;
    }
    .action a i {
        background-color: #fff;
        color: #5b9bd1;
    }
</style>
<div id="profile">
    <div class="profile laptop_pc">
        <div class="container">
            <div class="row profile_box">
                <!-- product left -->
                <div class="profile_left col-xl-3">
                    <div class="profile_left_box">
                    <div class="profile_left_item">
                            <a href="index.php?controller=profile"><i class="bi bi-person-fill"></i></a>
                            <a href="index.php?controller=profile" class="profile_left_content">Thông tin cá nhân</a>
                        </div>
                        <div class="profile_left_item action">
                            <a href="index.php?controller=change_password"><i class="bi bi-shield-lock-fill"></i></a>
                            <a href="index.php?controller=change_password" class="profile_left_content">Đổi mật khẩu</a>
                        </div>
                        <div class="profile_left_item ">
                            <a href="index.php?controller=order"><i class="bi bi-box2-fill"></i></a>
                            <a href="index.php?controller=order" class="profile_left_content">Thông tin đơn hàng</a>
                        </div>
                        <div class="profile_left_item ">
                            <a href="index.php?controller=login&action=logout"><i class="bi bi-box-arrow-right"></i></a>
                            <a href="index.php?controller=login&action=logout" class="profile_left_content">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <!-- product right -->
                <div class="profile_right col-xl-9">
                    <div class="profile_right_box">
                        <div class="profile_right_item">
                            <h2>Đổi mật khẩu</h2>
                        </div>
                        <div class="profile_right_item">
                            <label for="">Mật khẩu cũ</label>
                            <input type="password" class="pass_old" name="pass_old">
                        </div>
                        <div class="profile_right_item">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" class="pass" name="pass">
                        </div>
                        <div class="profile_right_item">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="password" class="repass" name="repassword">
                        </div>
                        <div class="profile_right_item">
                            <input type="submit" name="submit" class="btn-save" value="Lưu thay đổi">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS -->
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Back to top -->
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js' type='text/javascript'></script>
<script  src="Public/frontend/js/scrollTop.js"></script>
<!-- Profile -->
<script src="Public/frontend/js/change_pass.js"></script>
