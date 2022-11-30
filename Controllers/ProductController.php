<?php 
    session_start();
?>
<?php
    class ProductController extends BaseController
    {
        private $productModel;
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
            $id_category = $_GET['category'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $category = $this -> categoryModel -> getAllSql();
            $getcategory = $this -> categoryModel -> findById($id_category);
            $product = $this -> productModel -> getAllSql();
            $user = $this -> loginModel -> getUser($phone);
            $sum_cart = $this -> cartModel -> sum_cart($id_user);
            $allCart = $this -> cartModel -> allCart($id_user);
            $productSelling = $this -> productModel -> productSelling4();

            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.product.show',
                                [
                                    'category' => $category,
                                    'getcategory' => $getcategory,
                                    'product'  => $product,
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                    'productSelling' => $productSelling,
                                ]);
        }

        public function select()
        {
            $id_category = $_GET['category'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $findExist = $this -> categoryModel -> findExist($id_category);
            if ($findExist == 0) {
                header("Location: index.php?controller=product");
            } else {
                $category = $this -> categoryModel -> getAll();
                $getcategory = $this -> categoryModel -> findById($id_category);
                $product = $this -> productModel -> findByIdCategory($id_category);
                $user = $this -> loginModel -> getUser($phone);
                $sum_cart = $this -> cartModel -> sum_cart($id_user);
                $allCart = $this -> cartModel -> allCart($id_user);
                $productSelling = $this -> productModel -> productSelling4();
                
                return $this -> view('frontend.product.show',
                                    [
                                        'category' => $category,
                                        'getcategory' => $getcategory,
                                        'product'  => $product,
                                        'user' => $user,
                                        'sum_cart'   => $sum_cart,
                                        'allCart'   => $allCart,
                                        'productSelling' => $productSelling,
                                    ]);
            }
        }
        
    }