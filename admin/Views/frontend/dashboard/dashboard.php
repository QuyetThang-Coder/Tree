<style>
  .dashboard {
    background: #c6defd;
    text-decoration: none;
    color: rgb(22 22 72);
    box-shadow: none;
    border: 1px solid rgb(22 22 72);
  }
</style>
  <main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="app-title">
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
                </ul>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <div class="row">
      <!--Left-->
        <div class="col-md-12 col-6">
            <div class="row">
                <!-- col-6 -->
                <div class="col-md-3">
                    <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                        <div class="info">
                            <h4>Tổng khách hàng</h4>
                            <p><b>
                                <?php 
                                    foreach ($user as $user) {
                                        echo $user["sum"];
                                    } 
                                ?> 
                                khách hàng
                            </b></p>
                            <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-3">
                    <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                        <div class="info">
                            <h4>Tổng sản phẩm</h4>
                            <p><b>
                                <?php 
                                    foreach ($product as $product) {
                                        echo $product["sum"];
                                    } 
                                ?> 
                                sản phẩm
                            </b></p>
                            <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-3">
                    <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                        <div class="info">
                            <h4>Tổng đơn hàng</h4>
                            <p><b>
                                <?php 
                                    foreach ($order as $order) {
                                        echo $order["sum"];
                                    } 
                                ?> 
                                đơn hàng
                            </b></p>
                            <p class="info-tong">Tổng số đơn hàng đã hoàn thành.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-3">
                    <div class="widget-small danger coloured-icon"><i class='icon bx bx-money'></i>
                        <div class="info">
                            <h4>Tổng mã giảm giá</h4>
                            <p><b>
                                <?php 
                                    foreach ($sale as $sale) {
                                        echo $sale["sum"];
                                    } 
                                ?> 
                                mã giảm giá
                            </b></p>
                            <p class="info-tong">Tổng số mã giảm giá còn hiệu lực.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!--END left-->
      <!--Right-->
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Thống kê doanh thu theo 12 tháng</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Tổng đơn hàng thành công theo 12 tháng</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Thống kê doanh thu theo năm</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo_year"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Tổng đơn hàng thành công theo năm</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="barChartDemo_year"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      <!--END right-->
    </div>

    
    </main>
    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!--===============================================================================================-->
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="Public/frontend/js/main.js"></script>
    <!--===============================================================================================-->
    <script src="Public/frontend/js/plugins/pace.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="Public/frontend/js/plugins/chart.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript">

    var turnover = {
        labels: [
            <?php 
                foreach ($statistical as $month_order) {
                    echo "'Tháng ".$month_order["Month"]."', ";
                }    
            ?>
        ],
        datasets: [{
            label: "Thống kê doanh thu theo 12 tháng",
            fillColor: "rgba(9, 109, 239, 0.651)  ",
            pointColor: "rgb(9, 109, 239)",
            strokeColor: "rgb(9, 109, 239)",
            pointStrokeColor: "rgb(9, 109, 239)",
            pointHighlightFill: "rgb(9, 109, 239)",
            pointHighlightStroke: "rgb(9, 109, 239)",
            data: [
                <?php 
                    foreach ($statistical as $month_turnover) {
                        echo $month_turnover["Doanhthu"].", ";
                    }    
                ?>
            ]
        }]
    };

    var order = {
        labels: [
            <?php 
                foreach ($statistical as $statistical_month) {
                    echo "'Tháng ".$statistical_month["Month"]."', ";
                }    
            ?>
        ],
        datasets: [{
            label: "Tổng đơn hàng theo 12 tháng",
            fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
            strokeColor: "rgb(255, 212, 59)",
            pointColor: "rgb(255, 212, 59)",
            pointStrokeColor: "rgb(255, 212, 59)",
            pointHighlightFill: "rgb(255, 212, 59)",
            pointHighlightStroke: "rgb(255, 212, 59)",
            data: [
                <?php 
                    foreach ($statistical as $statistical_order) {
                        echo $statistical_order["Tongdonhang"].", ";
                    }    
                ?>
            ]
        }]
    };


    // 

    var turnover_year = {
        labels: [
            <?php 
                foreach ($statistical_year as $order_year) {
                    echo "'Năm ".$order_year["Year"]."', ";
                }    
            ?> 
        ],
        datasets: [{
            label: "Thống kê doanh thu theo năm",
            fillColor: "rgba(9, 109, 239, 0.651)  ",
            pointColor: "rgb(9, 109, 239)",
            strokeColor: "rgb(9, 109, 239)",
            pointStrokeColor: "rgb(9, 109, 239)",
            pointHighlightFill: "rgb(9, 109, 239)",
            pointHighlightStroke: "rgb(9, 109, 239)",
            data: [
                <?php 
                    foreach ($statistical_year as $turnover_year) {
                        echo $turnover_year["Doanhthu"].", ";
                    }    
                ?> 
            ]
        }]
    };

    var order_year = {
        labels: [
            <?php 
                foreach ($statistical_year as $statistical_year) {
                    echo "'Năm ".$statistical_year["Year"]."', ";
                }    
            ?> 
        ],
        datasets: [{
            label: "Tổng đơn hàng theo năm",
            fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
            strokeColor: "rgb(255, 212, 59)",
            pointColor: "rgb(255, 212, 59)",
            pointStrokeColor: "rgb(255, 212, 59)",
            pointHighlightFill: "rgb(255, 212, 59)",
            pointHighlightStroke: "rgb(255, 212, 59)",
            data: [
                <?php 
                    foreach ($statistical as $statistical_year_order) {
                        echo $statistical_year_order["Tongdonhang"].", ";
                    }    
                ?>
            ]
        }]
    };



        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(turnover);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(order);

        var ctxl_year = $("#lineChartDemo_year").get(0).getContext("2d");
        var lineChart_year = new Chart(ctxl_year).Line(turnover_year);

        var ctxb_year = $("#barChartDemo_year").get(0).getContext("2d");
        var barChart_year = new Chart(ctxb_year).Bar(order_year);
    </script>


    <script type="text/javascript">
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime + '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");
            function checkTime(i) {
                if (i < 10) {
                i = "0" + i;
                }
                return i;
            }
        }
    </script>
</body>

</html>