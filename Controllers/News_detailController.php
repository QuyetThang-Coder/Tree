<?php 
    session_start();
?>
<?php
    class News_detailController extends BaseController
    {
        private $homeModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('CategoryModel');
            $this -> categoryModel = new CategoryModel;

            $this -> loadModel('NewsModel');
            $this -> newsModel = new NewsModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;

            $this -> loadModel('CartModel');
            $this -> cartModel = new CartModel;
        }

        public function show() 
        {
            $id_news = $_GET['news'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $findExist = $this -> newsModel -> findExist($id_news);
            if ($findExist == 0) {
                header("Location: index.php?controller=news");
            } else {
                $category = $this -> categoryModel -> getAllSql();
                $news_detail = $this -> newsModel -> findById($id_news);
                $user = $this -> loginModel -> getUser($phone);
                $sum_cart = $this -> cartModel -> sum_cart($id_user);
                $allCart = $this -> cartModel -> allCart($id_user);

                unset($_SESSION["error"]);
                unset($_SESSION["sale_price"]);
                return $this -> view('frontend.news_detail.show',
                                    [
                                        'category'    => $category,
                                        'news_detail' => $news_detail,
                                        'user'        => $user,
                                        'sum_cart'   => $sum_cart,
                                        'allCart'   => $allCart,
                                    ]);
            }
        }
        
    }