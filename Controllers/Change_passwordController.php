<?php 
    session_start();
?>
<?php
    class Change_passwordController extends BaseController
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

            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.change_password.show',
                                [
                                    'category'   => $category,
                                    'getproduct' => $getproduct,
                                    'similar_product' => $similar_product,
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                ]);
        }

        public function update()
        {
            $id_user = $_COOKIE['id_user'];
            $pass_old = $_POST["pass_old"];
            $pass = $_POST["pass"];
            $repass = $_POST["repass"];

            $findPass = $this -> loginModel -> findPass($id_user, md5($pass_old));
            if ($findPass == 0) {
                echo "Mật khẩu cũ không chính xác";
            } else {
                $regex_password = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[.!@#$%^&*()])[A-Za-z\d.!@#$%^&*()]{6,30}$/"; 
                $result_password = preg_match($regex_password,$pass) ;
                if(!$result_password) { 
                    echo "Mật khẩu gồm: Chữ, số và các ký tự !@#$%^&*(), không chứa dấu cách";
                } else {
                    $data = [
                        "password" => md5($pass),
                    ];
                    $update = $this -> loginModel -> updateData($id_user, $data);
                    echo "Thành công";
                }
            }

        }
        
    }