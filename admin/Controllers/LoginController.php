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
            $this -> loadModel('LoginModel');
            $this -> loginModel = new LoginModel;
        }

        public function show() 
        {
            return $this -> view('frontend.login.show');
        }
        

        public function login() 
        {
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            if (md5($password) == md5("adminadmin.")) {
                $login = $this -> loginModel -> findByPhone_Password($phone);

                if ($login == 0) {
                    echo "Bạn không có quyền truy cập";
                }
                else {
                    // $_SESSION["phone"] = $phone;
                    setcookie("phone_admin", $phone, time() + 86400);
                    foreach ($login as $login) {
                        // $_SESSION["id_user"] = $login["id_user"];
                        setcookie("id_admin", $login["id_staff"], time() + 86400);
                    }
                    echo "0";
                }
            } else {
                echo "Bạn không có quyền truy cập";
            }
            
        }

        public function logout () {
            setcookie("phone_admin", "", time()-3600);
            setcookie("id_admin", "", time()-3600);
            header("Location: index.php?controller=login");
        }
    }