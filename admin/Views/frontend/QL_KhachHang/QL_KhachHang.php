

<style>
.qlkh {
    background: #c6defd;
    text-decoration: none;
    color: rgb(22 22 72);
    box-shadow: none;
    border: 1px solid rgb(22 22 72);
}
</style>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href=""><b>Danh sách khách hàng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        
                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                            <thead>
                                <tr>
                                <th width="30">STT</th>
                                <th width="80">Họ và tên</th>
                                <th width="30">SĐT</th>
                                <th width="80">Email</th>
                                <th width="300">Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach ($user as $user) {
                                        $address = strstr ($user['address'],"-, ", true);

                                        $address_1 = strchr($user['address'],"-, ");
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
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i++ ?></td>
                                        <td style="text-align: center;"><?php echo ucwords($user["name_user"]) ?></td>
                                        <td style="text-align: center;"><?php echo $user["number_phone"] ?></td>
                                        <td style="text-align: center;"><?php echo $user["email"] ?></td>
                                        <td style="text-align: center;"><?php echo $address.', '.$ward_txt.', '.$district_txt.', '.$city_txt ?></td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="Public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="Public/frontend/js/popper.min.js"></script>
    <script src="Public/frontend/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="Public/frontend/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="Public/frontend/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="Public/frontend/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="Public/frontend/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
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
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
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