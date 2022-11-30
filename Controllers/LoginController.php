<?php 
    session_start();
?>
<?php
    class LoginController extends BaseController
    {
        private $loginModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('RegisterModel');
            $this -> registerModel = new RegisterModel;

            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;
        }

        public function show() 
        {
            return $this -> view('frontend.login.show');
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
                                $find_email = $this ->  registerModel -> findByEmail($email);
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

        public function validate_phone_login() 
        {
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ";
            } else {
                $find_phone = $this ->  registerModel -> findByPhone($phone);
                if ($find_phone == 0) {

                } else {
                    return true;
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
                $find_phone = $this ->  registerModel -> findByPhone($phone);
                if ($find_phone == 0) {
                    return true;
                } else {
                    echo "Số điện thoại đã được đăng ký";
                }
            }
        }

        public function validate_password() {
            $password = $_POST['password'];
            $regex_password = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[.!@#$%^&*()])[A-Za-z\d.!@#$%^&*()]{6,30}$/"; 
            $result_password = preg_match($regex_password,$password) ;
            if(!$result_password) { 
                echo "Mật khẩu gồm: Chữ, số và các ký tự !@#$%^&*(), không chứa dấu cách";
            } else {
                return true;
            }
        }

        public function validate_name() {
            $name = $_POST['name'];
            $regex_name = "/^([a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/"; 
            $result_name = preg_match($regex_name,$name) ;
            if(!$result_name) { 
                echo "Họ tên không hợp lệ";
            } else {
                return true;
            }
        }

        public function validate_location() {
            $location = $_POST['location'];
            $regex_location = "/^(?=.*[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)(?=.*[\s])(?=.*[0-9]){1,}|(?=.*[\/]+)$/"; 
            $result_location = preg_match($regex_location,$location) ;
            if(!$result_location) { 
                echo "Địa chỉ không hợp lệ";
            } else {
                return true;
            }
        }


        public function validate_email_modal() 
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
                                $find_email = $this ->  registerModel -> findByEmail($email);
                                if ($find_email == 0) {
                                    echo "Email chưa được đăng ký";
                                } else {
                                    return true;
                                }
                            }
                        }
                    }
                }
            } 
        }

        public function validate_phone_modal() 
        {
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ";
            } else {
                $find_phone = $this ->  registerModel -> findByPhone($phone);
                if ($find_phone == 0) {
                    echo "Số điện thoại chưa được đăng ký";
                } else {
                    return true;
                }
            }
        }

        public function login() 
        {
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            // die($phone);
            $validate_phone = $this -> validate_phone_login();
            $validate_password = $this -> validate_password();

            if ($validate_phone && $validate_password) {
                $login = $this -> loginModel -> findByPhone_Password($phone,md5($password));

                if ($login == 0) {
                    echo "Số điện thoại hoặc mật khẩu không đúng";
                }
                else {
                    // $_SESSION["phone"] = $phone;
                    setcookie("phone", $phone, time() + (86400 * 7));
                    foreach ($login as $login) {
                        // $_SESSION["id_user"] = $login["id_user"];
                        setcookie("id_user", $login["id_user"], time() + (86400 * 7));
                    }
                    echo "0";
                }
            } else {
                // echo "Vui lòng xem lại các trường";
            }
        }

        public function logout () {
            session_destroy();
            setcookie("phone", "", time()-3600);
            setcookie("id_user", "", time()-3600);
            header("Location: index.php?controller=login");
        }

        public function insert() 
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['location'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $ward = $_POST['ward'];
            $city_text = $_POST['city_text'];
            $district_text = $_POST['district_text'];
            $ward_text = $_POST['ward_text'];
            $password = $_POST['password'];

            
            $validate_name = $this -> validate_name();
            $validate_phone = $this -> validate_phone();
            $validate_address = $this -> validate_location();
            $validate_password = $this -> validate_password();
            $validate_email = $this -> validate_email();

            if ($validate_name && $validate_phone && $validate_email && $validate_address && $validate_password) {
                $data = [
                    "name_user" => $name,
                    "email" => $email,
                    "number_phone" => $phone,
                    "address" => $address.'-, '.$ward_text.'.'.$ward.'-, '.$district_text.'.'.$district.'-, '.$city_text.'.'.$city,
                    "password" => md5($password),
                ];

                $register = $this -> registerModel -> insertData($data);
                echo "Đăng ký thành công";
            } else {
                // echo "Vui lòng xem lại các trường";
            }
        }

        public function check() 
        {
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $validate_phone = $this -> validate_phone_modal();
            $validate_email = $this -> validate_email_modal();

            if ($validate_phone && $validate_email ) {
                $check = $this -> registerModel -> findByPhone_Email($phone,$email);
                if ($check == 0) {
                    echo "Số điện thoại hoặc email chưa được đăng ký";
                } else {
                    echo "0";
                }
            } else {
                // echo "Vui lòng xem lại các trường";
            }
        }

        public function change_password() 
        {
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            $validate_password = $this -> validate_password();

            if ($validate_password) {
                $check = $this -> registerModel -> change_password($phone, $email, md5($password));
                if (!$check) {
                    echo "Đổi mật khẩu thành công";
                } else {
                    echo "Đổi mật khẩu thất bại. Vui lòng thử lại";
                }
            } else {
                // echo "Vui lòng xem lại các trường";
            }
        }
        
    }