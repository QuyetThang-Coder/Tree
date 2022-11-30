<?php 
    session_start();
?>
<?php
    class IntroduceController extends BaseController
    {
        private $introduceModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('IntroduceModel');
            $this -> introduceModel = new IntroduceModel;

            $this -> loadModel('CategoryModel');
            $this -> categoryModel = new CategoryModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;
        }

        public function show() 
        {
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $introduce = $this -> introduceModel -> getAll();
            $category = $this -> categoryModel -> getAllSql();
            $user = $this -> loginModel -> getUser($phone);
            $sum_cart = $this -> cartModel -> sum_cart($id_user);
            $allCart = $this -> cartModel -> allCart($id_user);

            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.introduce.show',
                                [
                                    'introduce' => $introduce, 
                                    'category' => $category, 
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                ]);
        }
        
    }