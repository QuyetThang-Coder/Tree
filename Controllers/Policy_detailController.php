<?php 
    session_start();
?>

<?php
    class Policy_detailController extends BaseController
    {
        private $policyModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('CategoryModel');
            $this -> categoryModel = new CategoryModel;

            $this -> loadModel('PolicyModel');
            $this -> policyModel = new PolicyModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;
        }

        public function show() 
        {
            $id_policy = $_GET['policy'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $findExist = $this -> policyModel -> findExist($id_policy);
            if ($findExist == 0) {
                header("Location: index.php?controller=policy");
            } else {
                $category = $this -> categoryModel -> getAllSql();
                $policy = $this -> policyModel -> getAllSql();
                $policy_detail = $this -> policyModel -> findById($id_policy);
                $user = $this -> loginModel -> getUser($phone);
                $sum_cart = $this -> cartModel -> sum_cart($id_user);
                $allCart = $this -> cartModel -> allCart($id_user);

                unset($_SESSION["error"]);
                unset($_SESSION["sale_price"]);
                return $this -> view('frontend.policy_detail.show',
                                    [
                                        'category'      => $category,
                                        'policy_detail' => $policy_detail,
                                        'policy'        => $policy,
                                        'user'          => $user,
                                        'sum_cart'   => $sum_cart,
                                        'allCart'   => $allCart,
                                    ]);
            }
        }
        
    }