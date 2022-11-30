


<!-- style -->
<style>
    .active_home {
        color: var(--black) !important;
        background-color: var(--white);
    }
</style>
<!-- Body -->
<div id="home">
    <div class="home">
        <!-- Home banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner home-banner">
                <?php
                    foreach ($banner as $banner) {
                ?>
                        <div class="carousel-item">
                            <img src="admin/Public/uploads/<?php echo $banner['image_banner'] ?>" class="d-block w-100" alt="...">
                        </div>
                <?php
                    } 
                ?>
                <div class="carousel-item active">
                    <img src="admin/Public/uploads/<?php echo $banner['image_banner'] ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--  -->
        <div class="container">
            <div class="home-product">
                <div class="home-product-title">
                    <h4 class="h4">Sản phẩm bán chạy</h4>
                </div>
                <!--  -->
                <div class="row home-product-detail">
                    <?php 
                        foreach ($productSelling as $productSelling) {
                    ?>
                            <div class="row col col-xl-4 home-product-item">
                                <div class="col col-xl-6 home-product-item-img">
                                    <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><img src="admin/Public/uploads/<?php echo $productSelling["image_product"] ?>" alt=""></a>
                                </div>
                                <div class="col col-xl-6 home-product-item-content">
                                    <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><h6><?php echo $productSelling["name_product"] ?></h6></a>
                                    <div class="home-product-item-content-price">
                                        <?php 
                                            if ($productSelling['discount_product'] == '0') {
                                        ?>
                                                <p class="price-new"><?php echo number_format($productSelling['price_product']) ?>₫</p>
                                        <?php
                                            } else {
                                        ?>
                                                <p class="price-old"><?php echo number_format($productSelling['price_product']) ?>₫</p>
                                                <p class="price-new"><?php echo number_format($productSelling['price_product']) ?>₫</p>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if ($productSelling['amount_product'] >= 1) {
                                    ?>
                                            <p class="quantity_product">Số lượng: <?php echo $productSelling['amount_product'] ?> cây</p>
                                    <?php
                                        } else {
                                    ?>
                                            <p class="quantity_product quantity_product_end">Hết hàng</p>
                                    <?php
                                        }
                                    ?>
                                    <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>" class="btn btn-success btn-detail">Chi tiết</a>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <!--  -->
            <div class="home-product">
                <div class="home-product-title">
                    <h4 class="h4">Sản phẩm mới</h4>
                </div>
                <!--  -->
                <div class="row home-product-detail">
                    <?php 
                        foreach ($newproduct as $newproduct) {
                    ?>
                            <div class="row col col-xl-4 home-product-item">
                                <div class="col col-xl-6 home-product-item-img">
                                    <a href="index.php?controller=product_detail&category=<?php echo $newproduct["category_id"] ?>&product=<?php echo $newproduct["id"] ?>"><img src="admin/Public/uploads/<?php echo $newproduct['image_product'] ?>" alt=""></a>
                                </div>
                                <div class="col col-xl-6 home-product-item-content">
                                    <a href="index.php?controller=product_detail&category=<?php echo $newproduct["category_id"] ?>&product=<?php echo $newproduct["id"] ?>"><h6><?php echo $newproduct['name_product'] ?></h6></a>
                                    <div class="home-product-item-content-price">
                                        <?php 
                                            if ($newproduct['discount_product'] == '0') {
                                        ?>
                                                <p class="price-new"><?php echo number_format($newproduct['price_product']) ?>₫</p>
                                        <?php
                                            } else {
                                        ?>
                                                <p class="price-old"><?php echo number_format($newproduct['price_product']) ?>₫</p>
                                                <p class="price-new"><?php echo number_format($newproduct['price_product']) ?>₫</p>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <?php 
                                        if ($newproduct['amount_product'] >= 1) {
                                    ?>
                                            <p class="quantity_product">Số lượng: <?php echo $newproduct['amount_product'] ?> cây</p>
                                    <?php
                                        } else {
                                    ?>
                                            <p class="quantity_product quantity_product_end">Hết hàng</p>
                                    <?php
                                        }
                                    ?>
                                    <a href="index.php?controller=product_detail&category=<?php echo $newproduct["category_id"] ?>&product=<?php echo $newproduct["id"] ?>" class="btn btn-success btn-detail">Chi tiết</a>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                    
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
