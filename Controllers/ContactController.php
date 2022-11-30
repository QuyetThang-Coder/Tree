<?php 
    session_start();
?>
<?php
    class ContactController extends BaseController
    {
        private $contactModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('ContactModel');
            $this -> contactModel = new ContactModel;

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

            $user = $this -> loginModel -> getUser($phone);
            $sum_cart = $this -> cartModel -> sum_cart($id_user);
            $allCart = $this -> cartModel -> allCart($id_user);
            $category = $this -> categoryModel -> getAllSql();
            
            unset($_SESSION["error"]);
            unset($_SESSION["sale_price"]);
            return $this -> view('frontend.contact.show',
                                [
                                    'category' => $category,
                                    'user' => $user,
                                    'sum_cart'   => $sum_cart,
                                    'allCart'   => $allCart,
                                ]);
        }

        public function validate_email() 
        {
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
                                return true;
                            }
                        }
                    }
                }
            } 
        }

        public function validate_phone() 
        {
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ";
            } else {
                return true;
            }
        }

        public function insert() 
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['location'];
            $desc = $_POST['desc'];

            $validate_phone = $this -> validate_phone();
            $validate_email = $this -> validate_email();

            if ($validate_phone && $validate_email ) {
                $data = [
                    "name" => $name,
                    "email" => $email,
                    "number_phone" => $phone,
                    "address" => $address,
                    "desc_contact" => $desc,
                ];

                $contact = $this -> contactModel -> insertData($data);
                echo "Gửi thành công";
            } else {
                echo "Thất bại";
            }
        }
        
    }