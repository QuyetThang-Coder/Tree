<?php 
    session_start();
?>
<?php
    class QL_DonHangController extends BaseController
    {
        private $ql_donhangModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('OrderModel');
            $this -> orderModel = new OrderModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $getOrder = $this -> orderModel -> getAll();
            $countStatus0 = $this -> orderModel -> countStatus0();
            $countStatus1 = $this -> orderModel -> countStatus1();

            return $this -> view('frontend.QL_DonHang.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getOrder" => $getOrder,
                                    "countStatus0" => $countStatus0,
                                    "countStatus1" => $countStatus1,
                                ]);
        }

        public function view_donhang()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_order = $_GET["id"];

                $find_order = $this -> orderModel -> findOrder($id_order);
                if ($find_order == 0) {
                    header("Location: index.php?controller=QL_DonHang");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);
                    $order = $this -> orderModel -> findOrder_id($id_order);
                    $getOrder_detail = $this -> orderModel -> getOrder_detail($id_order);

                    return $this -> view('frontend.QL_DonHang_view.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getOrder_detail" => $getOrder_detail,
                                    "order" => $order,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update_status1()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_order = $_GET["id"];

                $find_order = $this -> orderModel -> findOrder_status0($id_order);
                if ($find_order == 0) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    $data = [
                        "status" => "1",
                    ];
                    $update = $this -> orderModel -> updateStatus($id_order, $data);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update_status2()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_order = $_GET["id"];

                $find_order = $this -> orderModel -> findOrder_status1($id_order);
                if ($find_order == 0) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    $data = [
                        "status" => "2",
                    ];
                    $update = $this -> orderModel -> updateStatus($id_order, $data);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }
        
    }