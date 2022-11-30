<?php 
    session_start();
?>

<?php
    class Order_viewController extends BaseController
    {
        private $order_viewModel;
        /* Khởi tạo */
        public function __construct()
        {

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;

            $this -> loadModel('PaymentModel');
            $this -> paymentModel = new PaymentModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('OrderModel');
            $this -> orderModel = new OrderModel;
        }

        public function show() 
        {
            $id_user = $_COOKIE['id_user'] ?? NULL;
            $id_order = $_GET["order"];

            $findExist = $this -> orderModel -> findExist($id_order, $id_user);
            if ($findExist == 0) {
                header("Location: index.php?controller=order");
            } else {
                $user_order = $this -> orderModel -> findOrder_user($id_order);
                $order_detail = $this -> orderModel -> findOrder_detail($id_order);

                unset($_SESSION["error"]);
                unset($_SESSION["sale_price"]);
                return $this -> view('frontend.order_view.show',
                                    [
                                        'user_order'   => $user_order,
                                        'order_detail'   => $order_detail,
                                    ]);
            }
        }
        
    }