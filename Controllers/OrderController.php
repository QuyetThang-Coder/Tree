<?php 
    session_start();
?>
<?php
    class OrderController extends BaseController
    {
        private $profile;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('CategoryModel');
            $this -> categoryModel = new CategoryModel;

            $this -> loadModel('ProductModel');
            $this -> productModel = new ProductModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;

            $this -> loadModel('OrderModel');
            $this -> orderModel = new OrderModel;

        }

        public function show() 
        {
            $id_product = $_GET['product'] ?? NULL;
            $id_category = $_GET['category'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $category = $this -> categoryModel -> getAllSql();
            $getproduct = $this -> productModel -> findByIdProduct($id_product);
            $similar_product = $this -> productModel -> similar_product($id_category);
            $user = $this -> loginModel -> getUser($phone);
            $sum_cart = $this -> cartModel -> sum_cart($id_user);
            $allCart = $this -> cartModel -> allCart($id_user);
            $getOrder = $this -> orderModel -> getAll($id_user);

            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.order.show',
                                [
                                    'category'   => $category,
                                    'getproduct' => $getproduct,
                                    'similar_product' => $similar_product,
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                    'getOrder'   => $getOrder,
                                ]);
        }

        public function cancel()
        {
            $id_user = $_COOKIE['id_user'] ?? NULL;
            $id = $_GET["id"];

            $data = [
                "status" => "3",
            ];
            $findOrder = $this -> orderModel -> findOrder($id, $id_user);
            foreach ($findOrder as $findOrder) {
                if ($findOrder["status"] == "0") {
                    $cancel = $this -> orderModel -> cancelOrder($id, $data);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    header('Location: index.php?controller=order');
                }
            }
        }
        
    }