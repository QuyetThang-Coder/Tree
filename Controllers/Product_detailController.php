<?php 
    session_start();
?>
<?php
    class Product_detailController extends BaseController
    {
        private $product_detailModel;
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

            $this -> loadModel('CommentModel');
            $this -> commentModel = new CommentModel;


        }

        public function show() 
        {
            $id_product = $_GET['product'] ?? NULL;
            $id_category = $_GET['category'] ?? NULL;
            $phone = $_COOKIE['phone'] ?? NULL;
            $id_user = $_COOKIE['id_user'] ?? NULL;

            $findExist = $this -> productModel -> findExist($id_product);
            if ($findExist == 0) {
                header("Location: index.php?controller=product");
            } else {
                $category = $this -> categoryModel -> getAllSql();
                $getproduct = $this -> productModel -> findByIdProduct($id_product);
                $similar_product = $this -> productModel -> similar_product($id_category);
                $user = $this -> loginModel -> getUser($phone);
                $sum_cart = $this -> cartModel -> sum_cart($id_user);
                $allCart = $this -> cartModel -> allCart($id_user);
                $productSelling = $this -> productModel -> productSelling4();
                $exist_comment = $this -> commentModel -> findExist($id_product);
                $getComment = $this -> commentModel -> getComment($id_product);

                unset($_SESSION["error"]);
                unset($_SESSION["sale_price"]);
                return $this -> view('frontend.product_detail.show',
                                    [
                                        'category'   => $category,
                                        'getproduct' => $getproduct,
                                        'similar_product' => $similar_product,
                                        'user' => $user,
                                        'sum_cart'   => $sum_cart,
                                        'allCart'   => $allCart,
                                        'productSelling' => $productSelling,
                                        'exist_comment' => $exist_comment,
                                        'getComment' => $getComment,
                                    ]);
            }
        }

        public function add_cart()
        {
            $quantity = $_POST["quantity"];
            if(isset($_COOKIE["phone"])) {
                $check = $this -> cartModel -> findProductbyId($_GET['product'],$_COOKIE['id_user']);
                if ($check == 0) {
                    $data = [
                        "id_product" => $_GET['product'],
                        "quantity" => $quantity,
                        "user" => $_COOKIE['id_user'],
                    ];
    
                    $cart = $this -> cartModel -> insertData($data);
                    if (!$cart) {
                        echo "Thành công";
                    } else {
                        echo "Thất bại";
                    }
                } else {
                    echo "Đã tồn tại";
                }
                
            } else {
                echo false;
            }
        }

        public function comment()
        {
            $comment = $_POST["comment"];
            $id_product = $_GET['product'];
            if ($comment == '') {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                $data = [
                    "id_product" => $id_product,
                    "id_user"    => $_COOKIE['id_user'],
                    "comment"    => $comment,
                ];
                $comment_add = $this -> commentModel -> inserComment($data);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        
    }