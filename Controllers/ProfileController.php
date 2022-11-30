<?php 
    session_start();
?>
<?php
    class ProfileController extends BaseController
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

            $this -> loadModel('RegisterModel');
            $this -> registerModel = new RegisterModel;


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

            return $this -> view('frontend.profile.show',
                                [
                                    'category'   => $category,
                                    'getproduct' => $getproduct,
                                    'similar_product' => $similar_product,
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                ]);
        }

        public function validate_address() {
            $address = $_POST['address'];
            $regex_address = "/^(?=.*[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)(?=.*[\s])(?=.*[0-9]){1,}|(?=.*[\/]+)$/"; 
            $result_address = preg_match($regex_address,$address) ;
            if(!$result_address) { 
                echo "Địa chỉ không hợp lệ";
            } else {
                return true;
            }
        }

        public function validate_phone() 
        {
            $id_user = $_COOKIE["id_user"];
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ";
            } else {
                $find_phone = $this ->  loginModel -> findPhone($id_user, $phone);
                if ($find_phone == 0) {
                    return true;
                } else {
                    echo "Số điện thoại đã được đăng ký";
                }
            }
        }

        public function validate_email() 
        {
            $id_user = $_COOKIE["id_user"];
            $email = $_POST['email'];
            // Tiền tố gmail
            $arr0 = $_POST['arr0'];
            // $regex_arr0 = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,30}|(?=.*[.])[A-Za-z\d.]{1,30}$/"; 
            $regex_arr0 = "/^(?=.*[A-Za-z])[A-Za-z\d\W]{6,30}$/"; 
            $result_arr0 = preg_match($regex_arr0,$arr0);
            // Các ký tự của tiền tố
            $arr01 = $_POST['arr0'];
            $regex_arr01 = "/^(?=.*[A-Za-z])(?!.*\W)[A-Za-z\d]{6,30}|(?=.*[.])[A-Za-z\d.]{1,30}$/"; 
            $result_arr01 = preg_match($regex_arr01,$arr01);
            // Ký tự đầu tiên [a-z]
            $arr_start = substr($arr0, 0, 1);
            $regex_arrStart = "/^[a-zA-Z-0-9]$/"; 
            $result_arrStart = preg_match($regex_arrStart,$arr_start);    
            // Ký tự cuối cùng [a-z]
            $arr_last = substr($arr0, -1);
            $regex_arrlast = "/^[a-zA-Z-0-9]$/"; 
            $result_arrlast = preg_match($regex_arrlast,$arr_last);    
            // Hậu tố gmail
            $arr1 = '@';
            if(isset($_POST['arr1'])) {
                $arr1 = $arr1.$_POST['arr1'];
            }
            $regex_arr1 = "/^@([a-zA-Z0-9]{2,12}).([a-zA-Z]{2,12})+$/"; 
            $result_arr1 = preg_match($regex_arr1,$arr1);

            if(!$result_arrStart) { 
                echo "Ký tự đầu tiên của email phải là một ký tự ascii (a-z) hoặc một số (0-9).";
            } else {
                if (!$result_arrlast) {
                    echo "Ký tự cuối cùng của email phải là một ký tự ascii (a-z) hoặc một số (0-9).";
                } 
                else {
                    if (!$result_arr0) {
                        echo "Email phải có từ 6 ký tự trở lên và phải có ít nhất một chữ cái (a-z)";
                    }
                    else {
                        if(!$result_arr01) {
                            echo "Email chỉ được phép sử dụng các chữ cái (a-z), số (0-9), và dấu chấm (.)";
                        }
                        else {
                            if (!$result_arr1) {
                                echo "Email không hợp lệ";
                            } else {
                                $find_email = $this ->  loginModel -> findEmail($id_user, $email);
                                if ($find_email == 0) {
                                    return true;
                                } else {
                                    echo "Email đã được đăng ký";
                                }
                            }
                        }
                    }
                }
            } 
        }

        public function update()
        {
            $id_user = $_COOKIE["id_user"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $txt_city = $_POST["txt_city"];
            $district = $_POST["district"];
            $txt_district = $_POST["txt_district"];
            $ward = $_POST["ward"];
            $txt_ward = $_POST["txt_ward"];

            $data = [
                "name_user" => $name,
                "number_phone" => $phone,
                "email" => $email,
                "address" => $address.'-, '.$txt_ward.'.'.$ward.'-, '.$txt_district.'.'.$district.'-, '.$txt_city.'.'.$city,
            ];

            $validate_phone = $this -> validate_phone();
            $validate_address = $this -> validate_address();
            $validate_email = $this -> validate_email();

            if ($validate_phone && $validate_address && $validate_email) {
                $findPhone = $this -> loginModel -> findPhone($id_user,$phone);

                if ($findPhone == 0) {
                    $findEmail = $this -> loginModel -> findEmail($id_user,$email);
                    if ($findEmail == 0) {
                        $update = $this -> loginModel -> updateData($id_user, $data);
                        echo "Thành công";
                    } else {
                        echo "Email đã được sử dụng";
                    }
                } else {
                    echo "Số điện thoại đã được đăng ký";
                }
            }
            // $update = $this -> loginModel -> updateData($id_user, $data);
            // echo "Thành công";

        }
        
    }