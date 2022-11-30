<?php 
    session_start();
?>
<?php
    class DashboardController extends BaseController
    {
        private $dashboardModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('UserModel');
            $this -> userModel = new UserModel;

            $this -> loadModel('ProductModel');
            $this -> productModel = new ProductModel;

            $this -> loadModel('OrderModel');
            $this -> orderModel = new OrderModel;

            $this -> loadModel('SaleModel');
            $this -> saleModel = new SaleModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $user = $this -> userModel -> count();
            $product = $this -> productModel -> count();
            $order = $this -> orderModel -> count();
            $sale = $this -> saleModel -> count();

            $statistical = $this -> orderModel -> statistical();
            $statistical_year = $this -> orderModel -> statistical_year();


            return $this -> view('frontend.dashboard.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "user" => $user,
                                    "product" => $product,
                                    "order" => $order,
                                    "sale" => $sale,
                                    "statistical" => $statistical,
                                    "statistical_year" => $statistical_year,
                                ]);
        }
        
    }