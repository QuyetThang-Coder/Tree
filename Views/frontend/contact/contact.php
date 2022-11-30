
<!-- style -->
<style>
    .active_contact {
        color: var(--black) !important;
        background-color: var(--white);
    }
</style>
<!-- Body -->
<div id="contact">
    <div class="contact">
        <!--  -->
        <div class="contact-content">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-7 contact-left">
                        <div class="contact-left-img">
                            <img src="Public/frontend/img/logo-cay-canh-store.png" alt="">
                        </div>
                        <p><i class="bi bi-geo-alt"></i> <b>Địa chỉ:</b> Số 106, Ngõ 72, Nguyễn Trãi, Thanh Xuân (Cạnh Royal City), Hà Nội</p>
                        <a href="tel:0946312559"><i class="bi bi-telephone-outbound"></i> <b>Hotline:</b> 0946.312.559</a>
                        <a href="mailto:caycanhstore@gmail.com"><i class="bi bi-envelope"></i> <b>Email:</b> caycanhstore@gmail.com</a>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.730740790093!2d105.81678736406445!3d21.00342782157767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9b48b76a6b%3A0x19f125357872ef08!2zMTA2IE5nLiA3MiDEkC4gTmd1eeG7hW4gVHLDo2ksIFRoxrDhu6NuZyDEkMOsbmgsIFRoYW5oIFh1w6JuLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1664105970037!5m2!1svi!2s" width="100%" height="370" style="margin: 20px 0 0 0; border:1px solid #ccc;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col col-xl-5 contact-right">
                        <form action="" method="POST" id="frm_contact">
                            <h3>Đăng ký tư vấn</h3>
                            <div class="contact-right-item">
                                <label for="txtname-fr">Họ tên:</label>
                                <input type="text" placeholder="Họ tên" class="name_contact" id="txtname-fr">
                                <span class="info-name_contact"></span>
                            </div>
                            <div class="contact-right-item">
                                <label for="txtnumber-fr">Số điện thoại:</label>
                                <input type="number" placeholder="Số điện thoại" class="phone_contact" id="txtnumber-fr">
                                <span class="info-phone_contact"></span>
                            </div>
                            <div class="contact-right-item">
                                <label for="txtemail-fr">Email:</label>
                                <input type="email"  placeholder="Email" class="email_contact" id="txtemail-fr">
                                <span class="info-email_contact"></span>
                            </div>
                            <div class="contact-right-item">
                                <label for="txtlocation-fr">Địa chỉ:</label>
                                <input type="text"  class="location_contact" placeholder="Địa chỉ" id="txtlocation-fr">
                                <span class="info-location_contact"></span>
                            </div>
                            <div class="contact-right-item">
                                <label for="txtdesc-fr">Nội dung:</label>
                                <textarea id="txtdesc-fr" cols="30" class="desc_contact" placeholder="Nội dung" rows="10"></textarea>
                                <span class="info-desc_contact"></span>
                            </div>
                            <!-- <input type="button" class="btnSubmit" id="btn_contact" value="Gửi"> -->
                            <button id="btn_contact" class="btn btn-primary btn-lg btn-block" type="button">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="home-bottom">
            <div class="container">
                <div class="home-bottom-share">
                    <a href="mailto:caycanhstore@gmail.com"><h6>Chia sẻ <i class="bi bi-envelope-fill"></i></h6></a>
                </div>
                <div class="home-bottom-content">
                    <div class="row">
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="Public/frontend/img/ic1.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Chất lượng hàng đầu</h6>                                       
                                <p>Cam kết tất cả sản phẩm chính hãng 100%</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="Public/frontend/img/ic2.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Giao hàng siêu nhanh</h6>                                       
                                <p>Chúng tôi cam kết giao hàng nhanh nhất đến khách hàng</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="Public/frontend/img/ic3.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Mua hàng tiết kiệm</h6>                                       
                                <p>Giảm giá & khuyến mại với ưu đãi cực lớn</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="Public/frontend/img/ic4.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Hỗ trợ online 24/7</h6>                                       
                                <p>Gọi ngay 0946.312.559 để được tư vấn</p>                                       
                            </div>
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

<!-- Contact JS (AJAX) -->
<script src="Public/frontend/js/contact.js"></script>
