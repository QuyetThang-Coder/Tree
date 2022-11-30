
<!-- style -->
<style>
    .active_news {
        color: var(--black) !important;
        background-color: var(--white);
    }
</style>
<!-- Body -->
<div id="news">
    <div class="news">
        <!-- news -->
        <div class="news-content">
            <div class="container">
                <h2 class="h2">Tin tức</h2>
                <!-- <div class="news-item">
                    <div class="row">
                        <div class="col col-xl-5 news-item-left">
                            <a href="index.php?controller=news_detail"><img src="admin/Public/uploads/cay-canh-trong-van-phong1.jpg" alt=""></a>
                        </div>
                        <div class="col col-xl-7 news-item-right">
                            <a href="index.php?controller=news_detail"><h4>Cây cảnh văn phòng và những lưu ý khi mua cây cảnh văn phòng</h4></a>
                            <p>Cây cảnh trong văn phòng là một trong những tiêu chí quan trọng để đánh giá tính chuyên nghiệp và sang trọng của một văn phòng làm việc. Sự có mặt của các loại cây xanh đã trở thành một xu thế tất yếu trong thiết kế nội thất của văn phòng hiện đại. Không ai có thể phủ nhận những tác dụng tuyệt vời mà cây xanh mang lại cho chúng ta nói chung và môi trường công sở nói riêng. Hiện nay, nhu cầu tìm mua cây cảnh văn phòng là rất lớn. Tuy vậy, để cây cảnh văn phòng thực sự phát huy được tối đa vai trò và năng lực của nó. Thì bạn cũng cần “note” lại một vài lưu ý khi tìm mua nhé. </p>
                            <a href="index.php?controller=news_detail" class="btnReadMore">Đọc thêm</a>
                        </div>
                    </div>
                </div> -->
                <?php 
                    foreach ($news as $news) {
                ?>
                        <div class="news-item">
                            <div class="row">
                                <div class="col col-xl-5 news-item-left">
                                    <a href="index.php?controller=news_detail&news=<?php echo $news['id'] ?>"><img src="admin/Public/uploads/<?php echo $news['image_news'] ?>" alt=""></a>
                                </div>
                                <div class="col col-xl-7 news-item-right">
                                    <a href="index.php?controller=news_detail&news=<?php echo $news['id'] ?>"><h4><?php echo $news['title_news'] ?></h4></a>
                                    <p><?php echo $news['description_news'] ?></p>
                                    <a href="index.php?controller=news_detail&news=<?php echo $news['id'] ?>" class="btnReadMore">Đọc thêm</a>
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