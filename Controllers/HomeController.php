<?php 
    session_start();
?>
<?php
    class HomeController extends BaseController
    {
        private $homeModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('CategoryModel');
            $this -> categoryModel = new CategoryModel;

            $this -> loadModel('BannerModel');
            $this -> bannerModel = new BannerModel;

            $this -> loadModel('ProductModel');
            $this -> productModel = new ProductModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;
        }

        public function show() 
        {
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $category = $this -> categoryModel -> getAllSql();
            $newproduct = $this -> productModel -> getNewProduct();
            $user = $this -> loginModel -> getUser($phone);
            $sum_cart = $this -> cartModel -> sum_cart($id_user);
            $allCart = $this -> cartModel -> allCart($id_user);
            $banner = $this -> bannerModel -> getAll();
            $productSelling = $this -> productModel -> productSelling();
            
            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.home.show',
                                [
                                    'category'   => $category,
                                    'banner'     => $banner,
                                    'newproduct' => $newproduct,
                                    'user'       => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                    'productSelling'   => $productSelling,
                                ]);
        }
        
    }