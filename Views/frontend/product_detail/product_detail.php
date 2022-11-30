
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<!-- css -->
<link rel="stylesheet" href="Public/frontend/css/swiper.css">
<!-- Body -->
<div id="productDetail">
    <div class="productDetail">
        <!-- productDetail -->
        <div class="productDetail-content">
            <div class="container">
                <div class="row">
                    <!-- Product detail left -->
                    <div class="col col-xl-9 productDetail-left">
                        <div class="row">
                            <div class="col col-xl-5 productDetail-left-img">
                                <!-- <img src="admin/Public/uploads/cay-hanh-phuc.jpg" alt=""> -->
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <?php 
                                            foreach ($getproduct as $get_image) {
                                        ?>
                                                <div class="swiper-slide">
                                                    <img src="admin/Public/uploads/<?php echo $get_image['image_product'] ?>"/>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!-- <div class="swiper-slide">
                                            <img src="admin/Public/uploads/cay-kim-tien.jpg"/>
                                        </div> -->
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php 
                                            foreach ($getproduct as $get_image1) {
                                        ?>
                                                <div class="swiper-slide">
                                                    <img src="admin/Public/uploads/<?php echo $get_image1['image_product'] ?>"/>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                        <!-- <div class="swiper-slide">
                                            <img src="admin/Public/uploads/cay-kim-tien.jpg"/>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col col-xl-7 productDetail-left-desc">
                                <?php 
                                    foreach ($getproduct as $getproduct) {
                                ?>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php?controller=home">Trang chủ</a></li>
                                                <li class="breadcrumb-item"><a href="index.php?controller=product">Sản phẩm</a></li>
                                                <li class="breadcrumb-item" aria-current="page"><?php echo $getproduct['name_product'] ?></li>
                                            </ol>
                                        </nav>
                                            
                                        <h4 class="h4"><?php echo $getproduct['name_product'] ?></h4>
                                        <div class="productDetail-left-desc-describe">
                                            <h6>Mô tả ngắn: 
                                                <p><?php echo $getproduct['short_description'] ?></p>
                                            </h6>
                                        </div>
                                        <div class="productDetail-left-desc-price">
                                            <?php 
                                                if ($getproduct['discount_product'] == '0') {
                                            ?>
                                                    <p class="price-new"><?php echo number_format($getproduct['price_product']) ?>₫</p>
                                            <?php
                                                } else {
                                            ?> 
                                                    <p class="price-old"><?php echo number_format($getproduct['price_product']) ?>₫</p>
                                                    <p class="price-new"><?php echo number_format($getproduct['discount_product']) ?>₫</p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="productDetail-left-desc-quantity">
                                            <?php 
                                                if ($getproduct['amount_product'] >= 1) {
                                            ?>
                                                    <p>Còn lại: <?php echo $getproduct['amount_product'] ?> cây</p>
                                                    <button class="minus is-form" type="button">-</button>
                                                    <input type="number" aria-label="quantity" class="input_quantity product_quantity" name="product_quantity" readonly max="<?php echo $getproduct['amount_product'] - 1; ?>"  min="1" value="1">
                                                    <button class="plus is-form" type="button">+</button>
                                            <?php
                                                } else {
                                            ?>
                                                    <p>Đã hết hàng</p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- <input type="submit" value="Thêm vào giỏ hàng" name="addcart"> -->
                                        <input type="hidden" id="product_text" value="<?php echo $getproduct['id']; ?>">
                                        <?php 
                                            if ($getproduct['amount_product'] >= 1) {
                                        ?>
                                                <button type="button" class="btn_addcart" id="btn_addcart">Thêm vào giỏ hàng</button>
                                        <?php
                                            }
                                        ?>
                                        
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <!--  -->
                        <div class="productDetail-bottom">
                            <div class="productDetail-bottom-tab_button">
                                <label for="tab-checkbox_desc" class=" tablink tab-select" onclick="openTab(event,'tab_describe')">Mô tả</label>
                                <label for="tab-checkbox_comment" class=" tablink" onclick="openTab(event,'tab_comment')">Bình luận</label>
                            </div>
                            <!-- Tab describe -->
                            <div id="tab_describe" class="tab-container tab_describe tab_seemore">
                                <!-- <h2>London</h2>
                                <p>London is the capital city of England.</p>
                                <p></p> -->
                                <?php echo $getproduct["description"] ?>
                            </div>
                            <!-- Tab comment -->
                            <div id="tab_comment" class="tab-container tab_comment tab_seemore" style="display:none">
                                    <?php 
                                        if (isset($_COOKIE["phone"])) {
                                    ?>
                                            <form action="index.php?controller=product_detail&action=comment&product=<?php echo $getproduct['id'] ?>" method="POST">
                                                <div class="tab_comment-form">
                                                    <h5 class="h5">Viết bình luận ...<i class="bi bi-pencil-fill"></i></h5>
                                                    <div class="row">
                                                        <div class="col col-xl-1 tab_comment-form-img">
                                                            <img src="admin/Public/uploads/none.png" alt="">
                                                        </div>
                                                        <div class="col col-xl-11 tab_comment-form-text">
                                                            <textarea name="comment" id="" cols="30" rows="10" placeholder="Viết bình luận ...."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="tab_comment-form-submit">
                                                        <input type="submit" value="Gửi bình luận">
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="tab_comment-bottom">
                                                <?php if ($exist_comment == 0) { ?>
                                                    <div class="tab_comment-bottom-item">
                                                        <h4>Không có bình luận nào</h4>
                                                    </div>
                                                <?php } else {?>
                                                    <hr>
                                                    <?php foreach ($getComment as $getComment) { ?>
                                                        <div class="tab_comment-bottom-item">
                                                            <div class="tab_comment-bottom-item-img">
                                                                <img src="admin/Public/uploads/none.png" alt="">
                                                            </div>
                                                            <div class="tab_comment-bottom-item-content">
                                                                <h5><?php echo ucwords($getComment['name_user']) ?></h5>
                                                                <span><?php echo date_format(date_create($getComment["created_at"]), "d-m-Y H:i:s") ?></span>
                                                                <p><?php echo $getComment['comment'] ?></p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                    
                                    <?php
                                        } else {
                                    ?>
                                            <div class="tab_comment-bottom-login">
                                                <a href="index.php?controller=login">Đăng nhập</a>
                                            </div>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- Product detail right -->
                    <div class="col col-xl-3 productDetail-right">
                        <div>
                            <div class="productDetail-right-heading">
                                <h4 class="h3">Danh mục sản phẩm</h4>
                            </div>
                            <div class="productDetail-right-category">
                                <ul>
                                    <a href="index.php?controller=product"><li>Tất cả</li></a>
                                    <?php 
                                        foreach ($category as $category) {
                                    ?>
                                            <a href="index.php?controller=product&action=select&category=<?php echo $category['id'] ?>"><li><?php echo $category['name_category'] ?></li></a>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="productDetail-right-heading">
                                <h4 class="h3">Sản phẩm bán chạy</h4>
                            </div>
                            <?php 
                                foreach ($productSelling as $productSelling) {
                            ?> 
                                    <div class="row productDetail-right-item">
                                        <div class="col col-xl-4 productDetail-right-item-left">
                                            <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><img src="admin/Public/uploads/<?php echo $productSelling["image_product"] ?>" alt=""></a>
                                        </div>
                                        <div class="col col-xl-8 productDetail-right-item-right">
                                            <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><h4><?php echo $productSelling["name_product"] ?></h4></a>
                                            <div class="productDetail-right-item-price">
                                                <?php 
                                                    if ($productSelling["discount_product"] == 0) {
                                                ?> 
                                                        <p class="price-new"><?php echo number_format($productSelling["price_product"]) ?>₫</p>
                                                <?php
                                                    } else {
                                                ?> 
                                                        <p class="price-old"><?php echo number_format($productSelling["price_product"] ) ?>₫</p>
                                                        <p class="price-new"><?php echo number_format($productSelling["discount_product"])  ?>₫</p>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>" class="btn btn-success btn-detail">Chi tiết</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Similar Product -->
                <div class="productDetail-similar">
                    <div class="productDetail-similar-title">
                        <h4 class="h4">Sản phẩm tương tự</h4>
                    </div>
                    <!--  -->
                    <div class="row productDetail-similar-row">
                        <?php 
                            foreach ($similar_product as $similar_product) {
                        ?>
                                <div class="row col col-xl-4 productDetail-similar-item">
                                    <div class="col col-xl-6 productDetail-similar-item-img">
                                        <a href="index.php?controller=product_detail&category=<?php echo $similar_product['category_id'] ?>&product=<?php echo $similar_product['id'] ?>"><img src="admin/Public/uploads/<?php echo $similar_product['image_product'] ?>" alt=""></a>
                                    </div>
                                    <div class="col col-xl-6 productDetail-similar-item-content">
                                        <a href="index.php?controller=product_detail&category=<?php echo $similar_product['category_id'] ?>&product=<?php echo $similar_product['id'] ?>"><h6><?php echo $similar_product['name_product'] ?></h6></a>
                                        <div class="productDetail-similar-item-content-price">
                                            <?php 
                                                if ($similar_product['discount_product'] == '0') {
                                            ?>
                                                    <p class="price-new"><?php echo number_format($similar_product['price_product']) ?>₫</p>
                                            <?php
                                                } else {
                                            ?>
                                                    <p class="price-old"><?php echo number_format($similar_product['price_product']) ?>₫</p>
                                                    <p class="price-new"><?php echo number_format($similar_product['discount_product']) ?>₫</p>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <a href="#" class="btn btn-success btn-detail">Chi tiết</a>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
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

<!-- JS -->
<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Quantity -->
<script>
    $('.input_quantity').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'));
        var val = Number($('.input_quantity').val());
        if (val > 0) {
            var d = val;
        }
        $(qty).click(function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                // var x = Number($this.val()) + 1
                if (d <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    });
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="Public/frontend/js/swiper.js"></script>
<!-- Tab -->
<script src="Public/frontend/js/tab.js"></script>
<!-- Product_detail (Ajax) -->
<script src="Public/frontend/js/product_detail.js"></script>