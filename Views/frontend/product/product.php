
<!-- style -->
<style>
    .active_product {
        color: var(--black) !important;
        background-color: var(--white);
    }
    <?php foreach ($category as $category_css) { ?>
    .select_<?php echo $category_css['id'] ?> {
        color: #1e7100 !important;
    }
    .product-left-category ul .select_<?php echo $category_css['id'] ?> li {
        padding: 10px 0 10px 20px;
        list-style-type: disclosure-closed;
        list-style-position: inside;
    }
    <?php } ?>
</style>
<!-- Body -->
<div id="product">
    <div class="product">
        <!-- product -->
        <div class="product-content">
            <div class="container">
                <div class="row">
                    <div class="col col-xl-3 product-left">
                        <div>
                            <div class="product-left-heading">
                                <h4 class="h3">Danh mục sản phẩm</h4>
                            </div>
                            <div class="product-left-category">
                                <ul>
                                    <?php 
                                        if(isset($_GET['category'])) {
                                    ?>
                                            <a href="index.php?controller=product"><li>Tất cả</li></a>  
                                    <?php
                                        } else {
                                    ?> 
                                            <a href="index.php?controller=product" class="select"><li>Tất cả</li></a>
                                    <?php
                                        }
                                    ?>
                                    <?php 
                                        foreach ($category as $category) {
                                            if(isset($_GET['category'])) {
                                                if ($_GET['category'] == $category['id']){
                                    ?>
                                                    <a href="index.php?controller=product&action=select&category=<?php echo $category['id'] ?>" class="select_<?php echo $category['id'] ?>">
                                                        <li><?php echo $category['name_category'] ?></li>
                                                    </a>
                                    <?php
                                                } 
                                                else {
                                    ?>
                                                    <a href="index.php?controller=product&action=select&category=<?php echo $category['id'] ?>">
                                                        <li><?php echo $category['name_category'] ?></li>
                                                    </a>
                                    <?php
                                                }
                                            } else {
                                    ?>
                                                <a href="index.php?controller=product&action=select&category=<?php echo $category['id'] ?>">
                                                    <li><?php echo $category['name_category'] ?></li>
                                                </a>
                                    <?php
                                        } }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="product-left-heading">
                                <h4 class="h3">Sản phẩm bán chạy</h4>
                            </div>
                            <?php 
                                foreach ($productSelling as $productSelling) {
                            ?>
                                    <div class="row product-left-item">
                                        <div class="col col-xl-4 product-left-item-left">
                                            <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><img src="admin/Public/uploads/<?php echo $productSelling["image_product"] ?>" alt=""></a>
                                        </div>
                                        <div class="col col-xl-8 product-left-item-right">
                                            <a href="index.php?controller=product_detail&category=<?php echo $productSelling["category_id"] ?>&product=<?php echo $productSelling["id"] ?>"><h4><?php echo $productSelling["name_product"] ?></h4></a>
                                            <div class="product-left-item-price">
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
                    <!-- Product right -->
                    <div class="col col-xl-9 product-right">
                        <div class="product-right-title">
                            <!-- <h4 class="h4">Tất cả</h4> -->
                            <?php 
                                if(isset($_GET['category']) && $_GET['category'] != NULL) {
                                    foreach ($getcategory as $getcategory) {
                                        if(isset($_GET['category'])) {
                                            if ($_GET['category'] == $getcategory['id']){
                            ?>
                                                <h4 class="h4"><?php echo $getcategory['name_category'] ?></h4>
                            <?php
                                            } 
                                        }
                                    }
                                } else {
                            ?>
                                    <h4 class="h4">Tất cả</h4>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="row product-right-detail">
                            <?php 
                                foreach ($product as $product) {
                            ?>
                                    <div class="row col col-xl-4 product-right-item">
                                        <div class="col col-xl-6 product-right-item-img">
                                            <a href="index.php?controller=product_detail&category=<?php echo $product['category_id'] ?>&product=<?php echo $product['id'] ?>"><img src="admin/Public/uploads/<?php echo $product['image_product'] ?>" alt=""></a>
                                        </div>
                                        <div class="col col-xl-6 product-right-item-content">
                                            <a href="index.php?controller=product_detail&category=<?php echo $product['category_id'] ?>&product=<?php echo $product['id'] ?>"><h6><?php echo $product['name_product'] ?></h6></a>
                                            <div class="product-right-item-content-price">
                                                <?php 
                                                    if ($product['discount_product'] == '0') {
                                                ?>
                                                        <p class="price-new"><?php echo number_format($product['price_product']) ?>₫</p>
                                                <?php
                                                    } else {
                                                ?>
                                                        <p class="price-old"><?php echo number_format($product['price_product']) ?>₫</p>
                                                        <p class="price-new"><?php echo number_format($product['price_product']) ?>₫</p>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <?php 
                                                if ($product['amount_product'] >= 1) {
                                            ?>
                                                    <p class="quantity_product">Số lượng: <?php echo $product['amount_product'] ?> cây</p>
                                            <?php
                                                } else {
                                            ?>
                                                    <p class="quantity_product quantity_product_end">Hết hàng</p>
                                            <?php
                                                }
                                            ?>
                                            <a href="index.php?controller=product_detail&category=<?php echo $product['category_id'] ?>&product=<?php echo $product['id'] ?>" class="btn btn-success btn-detail">Chi tiết</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
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
