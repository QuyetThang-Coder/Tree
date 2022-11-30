<?php 
    session_start();
?>
<?php
    class QL_SanPhamController extends BaseController
    {
        private $ql_sanphamModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('ProductModel');
            $this -> productModel = new ProductModel;
        }

        public function show() 
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_staff = $_COOKIE["id_admin"];

                $getStaff = $this -> staffModel -> findById($id_staff);
                $getProduct = $this -> productModel -> getProduct();

                return $this -> view('frontend.QL_SanPham.show', 
                                    [
                                        "getProduct" => $getProduct,
                                        "getStaff" => $getStaff,
                                    ]);
            } else {
                header("Location: index.php?controller=login");
            }
        }

        // add
        public function view_add_product() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $getCategory = $this -> productModel -> getAllCategory();
            $countCategory = $this -> productModel -> countCategory();

            return $this -> view('frontend.QL_SanPham_add.show',
                                [
                                    "getStaff" => $getStaff,
                                    "getCategory" => $getCategory,
                                    "countCategory" => $countCategory,
                                ]);
        }

        public function add()
        {
            if (isset($_COOKIE["id_admin"])) {
                $name = $_POST["product_name"];
                $category = $_POST["category"];
                $price = $_POST["product_price"];
                $discount = $_POST["product_discount"];
                $amount = $_POST["product_amount"];
                $shortdesc = $_POST["product_shortdesc"];
                $description = $_POST["product_description"];

                // Kiểm tra ảnh và tải lên upload
                $permited = array('jpg','png','jpeg', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "Public/uploads/".$unique_image;

                    $data = [
                        "category_id" => $category,
                        "name_product" => $name,
                        "image_product" => $unique_image,
                        "price_product" => $price,
                        "discount_product" => $discount,
                        "amount_product" => $amount,
                        "short_description" => $shortdesc,
                        "description" => $description,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $insert_staff = $this -> productModel -> insertData($data);
                        $_SESSION["success"] = "Thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        // echo "Thêm thành công";
                        // header("Location: index.php?controller=login");
                    } else {
                        $_SESSION["error"] = "Không thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                        
                
            } else {
                header("Location: index.php?controller=login");
            }

        }

        // Delete product 
        public function delete()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_product = $_GET["id"];

                $product = $this -> productModel -> findProduct($id_product);
                if ($product == 0) {
                    header("Location: index.php?controller=QL_SanPham");
                    // echo "1";
                } else {
                    $delete = $this -> productModel -> deleteProduct($id_product);
                    header("Location: index.php?controller=QL_SanPham");
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Update
        public function view_update_sanpham()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_product = $_GET["id"];

                $product = $this -> productModel -> findProduct($id_product);
                if ($product == 0) {
                    header("Location: index.php?controller=QL_SanPham");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);
                    $getCategory = $this -> productModel -> getAllCategory();
                    $countCategory = $this -> productModel -> countCategory();

                    return $this -> view('frontend.QL_SanPham_update.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getCategory" => $getCategory,
                                    "countCategory" => $countCategory,
                                    "product" => $product,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_product = $_POST["id_product"];
                $name = $_POST["product_name"];
                $category = $_POST["category"];
                $price = $_POST["product_price"];
                $discount = $_POST["product_discount"];
                $amount = $_POST["product_amount"];
                $shortdesc = $_POST["product_shortdesc"];
                $description = $_POST["product_description"];

                // Kiểm tra ảnh và tải lên upload
                $permited = array('jpg','png','jpeg', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "Public/uploads/".$unique_image;

                if ($file_name == "") {
                    $data = [
                        "category_id" => $category,
                        "name_product" => $name,
                        "price_product" => $price,
                        "discount_product" => $discount,
                        "amount_product" => $amount,
                        "short_description" => $shortdesc,
                        "description" => $description,
                    ];
                    $update = $this -> productModel -> updateData($id_product, $data);
                    $_SESSION["success"] = "Thành công";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else if ($file_name != "") {
                    $data = [
                        "category_id" => $category,
                        "name_product" => $name,
                        "image_product" => $unique_image,
                        "price_product" => $price,
                        "discount_product" => $discount,
                        "amount_product" => $amount,
                        "short_description" => $shortdesc,
                        "description" => $description,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $update = $this -> productModel -> updateData($id_product, $data);
                        $_SESSION["success"] = "Thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        // echo "Thêm thành công";
                        // header("Location: index.php?controller=login");
                    } else {
                        $_SESSION["error"] = "Không thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }
                        
                
            } else {
                header("Location: index.php?controller=login");
            }

        }

        public function add_category()
        {
            if (isset($_COOKIE["id_admin"])) {
                $category = $_POST["category"];
                $getcategory = $this -> productModel -> findCategory($category);
                if ($getcategory == 0) {
                    $data = [
                        "name_category" => $category,
                    ];
    
                    $insert_category = $this -> productModel -> insertCategory($data);
                    echo "Thêm thành công";
                } else {
                    echo "Danh mục đâ tồn tại";
                }
            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function delete_category()
        {
            if (isset($_COOKIE["id_admin"])) {
                $category = $_GET["id"];
                $findcategory = $this -> productModel -> findCategoryId($category);
                if ($findcategory == 0) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    $delete = $this -> productModel -> deleteCategory($category);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            } else {
                header("Location: index.php?controller=login");
            }
            
        }
        
    }