

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
                        <div class="profile_left_item action">
                            <a href="index.php?controller=profile"><i class="bi bi-person-fill"></i></a>
                            <a href="index.php?controller=profile" class="profile_left_content">Thông tin cá nhân</a>
                        </div>
                        <div class="profile_left_item ">
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
                            <h2>Thông tin cá nhân</h2>
                        </div>
                        <?php 
                            foreach ($user as $getUser) {
                                $address = strstr ($getUser['address'],"-, ", true);

                                $address_1 = strchr($getUser['address'],"-, ");
                                $dele_ward = trim($address_1,"-, ");
                                $address_ward = strstr ($dele_ward,"-, ", true);
                                $ward_txt = strstr ($address_ward,".", true);
                                $ward = strstr ($address_ward,".");
                                $ward_id = trim($ward,".");

                                $address_2 = strchr($dele_ward, "-, ");
                                $dele_district = trim($address_2,"-, ");
                                $address_district = strstr ($dele_district,"-, ", true);
                                $district_txt = strstr ($address_district,".", true);
                                $district = strstr ($address_district,".");
                                $district_id = trim($district,".");

                                $address_3 = strchr($dele_district, "-, ");
                                $address_city = trim($address_3,"-, ");
                                $city_txt = strstr ($address_city,".", true);
                                $city = strstr ($address_city,".");
                                $city_id = trim($city,".");
                        ?>
                                <div class="profile_right_item">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="user_name" class="txtName" value="<?php echo ucwords($getUser["name_user"]) ?>">
                                </div>
                                <div class="profile_right_item">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="user_phone" class="txtPhone" value="<?php echo $getUser["number_phone"] ?>">
                                </div>
                                <div class="profile_right_item">
                                    <label for="">Email</label>
                                    <input type="text" name="user_email" class="txtEmail" value="<?php echo $getUser["email"] ?>">
                                </div>
                                <div class="profile_right_item">
                                    <label for="">Địa chỉ nhận hàng</label>
                                    <!-- <textarea name="user_address" id="" cols="30" rows="10"><?php echo ucwords($getUser["address"]) ?></textarea> -->
                                    <input type="text" name="" id="" class="txtAddress" value="<?php echo ucwords($address) ?>">
                                    <div class="profile_right_item row">
                                        <div class="col-xl-4">
                                            <select class="form-select form-select-xl mb-4 mt-4 slCity" name="slCity" style="border: none" id="city" aria-label=".form-select-sm">
                                                <option value="<?php echo $city_id ?>" selected><?php echo ucwords($city_txt) ?></option>           
                                            </select>
                                        </div> 
                                        <div class="col-xl-4">
                                            <select class="form-select form-select-xl mb-4 mt-4 slDistrict" name="slDistrict" style="border: none" id="district" aria-label=".form-select-sm">
                                                <option value="" >Chọn quận huyện</option>    
                                                <option value="<?php echo $district_id ?>" selected><?php echo $district_txt ?></option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <select class="form-select form-select-xl mb-4 mt-4 slWard" name="slWard" style="border: none" id="ward" aria-label=".form-select-sm">
                                                <option value="" >Chọn phường xã</option>    
                                                <option value="<?php echo $ward_id ?>" selected><?php echo $ward_txt ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        <?php        
                            }
                        ?>
                        <div class="profile_right_item">
                            <input type="submit" class="btn-save" name="submit" style="cursor: pointer;" value="Lưu thay đổi">
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
<!-- Select -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js'></script>
<script src="Public/frontend/js/select_location.js"></script>
<script>
    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }

        const result = data.filter(n => n.Id === "01");
        for (const k of result[0].Districts) {
            district.options[district.options.length] = new Option(k.Name, k.Id);
        }

        const dataWards = result[0].Districts.filter(n => n.Id === "<?php echo $district_id ?>");
        for (const w of dataWards[0].Wards) {
            wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }

        var txtDistrict_select = $("#district :selected").text();
        district.onchange = function () {
            ward.length = 1;

            const dataCity = data.filter((n) => n.Id === "01");
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };

    }
</script>
<!-- Profile -->
<script src="Public/frontend/js/profile.js"></script>


