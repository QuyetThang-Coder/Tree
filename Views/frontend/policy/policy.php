
<!-- style -->
<style>
    .active_policy {
        color: var(--black) !important;
        background-color: var(--white);
    }
</style>
<!-- Body -->
<div id="policy">
    <div class="policy">
        <!-- policy -->
        <div class="policy-content">
            <div class="container">
                <h2 class="h2">Chính sách & quy định chung</h2>
                <?php
                    foreach ($policy as $policy) {
                ?>
                        <div class="policy-item">
                            <div class="row">
                                <div class="col col-xl-5 policy-item-left">
                                    <a href="index.php?controller=policy_detail&policy=<?php echo $policy['id'] ?>"><img src="admin/Public/uploads/<?php echo $policy['image_policy'] ?>" alt=""></a>
                                </div>
                                <div class="col col-xl-7 policy-item-right">
                                    <a href="index.php?controller=policy_detail&policy=<?php echo $policy['id'] ?>"><h4><?php echo $policy['title_policy'] ?></h4></a>
                                    <p><?php echo $policy['description_policy'] ?></p>
                                    <a href="index.php?controller=policy_detail&policy=<?php echo $policy['id'] ?>" class="btnReadMore">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
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
                                <img src="admin/Public/uploads/ic1.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Chất lượng hàng đầu</h6>                                       
                                <p>Cam kết tất cả sản phẩm chính hãng 100%</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="admin/Public/uploads/ic2.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Giao hàng siêu nhanh</h6>                                       
                                <p>Chúng tôi cam kết giao hàng nhanh nhất đến khách hàng</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="admin/Public/uploads/ic3.jpg" alt="">
                            </div>
                            <div class="home-bottom-content-item-right">
                                <h6>Mua hàng tiết kiệm</h6>                                       
                                <p>Giảm giá & khuyến mại với ưu đãi cực lớn</p>                                       
                            </div>
                        </div>
                        <div class="col col-xl-3 home-bottom-content-item">
                            <div class="home-bottom-content-item-left">
                                <img src="admin/Public/uploads/ic4.jpg" alt="">
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