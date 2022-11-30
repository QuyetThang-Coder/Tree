<?php 
    session_start();
?>
<?php
    class QL_NhanVienController extends BaseController
    {
        private $staffModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $staff = $this -> staffModel -> getStaff();
            return $this -> view('frontend.QL_NhanVien.show', 
                                [
                                    'staff' => $staff,
                                    "getStaff" => $getStaff,
                                ]);
        }

        // Add staff

        public function view_add_nhanvien() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $getPosition = $this -> staffModel -> getAllPosition();
            $countPosition = $this -> staffModel -> countPosition();


            return $this -> view('frontend.QL_NhanVien_add.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getPosition" => $getPosition,
                                    "countPosition" => $countPosition,
                                ]);
        }
        
        // Check
        public function validate_phone() 
        {
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ \r\n";
            } else {
                $find_phone = $this ->  staffModel -> findByPhone($phone);
                if ($find_phone == 0) {
                    return true;
                } else {
                    echo "Số điện thoại đã được đăng ký \r\n";
                }
            }
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
                echo "Ký tự đầu tiên của email phải là một ký tự ascii (a-z) hoặc một số (0-9).\r\n";
            } else {
                if (!$result_arrlast) {
                    echo "Ký tự cuối cùng của email phải là một ký tự ascii (a-z) hoặc một số (0-9).\r\n";
                } 
                else {
                    if (!$result_arr0) {
                        echo "Email phải có từ 6 ký tự trở lên và phải có ít nhất một chữ cái (a-z)\r\n";
                    }
                    else {
                        if(!$result_arr01) {
                            echo "Email chỉ được phép sử dụng các chữ cái (a-z), số (0-9), và dấu chấm (.)\r\n";
                        }
                        else {
                            if (!$result_arr1) {
                                echo "Email không hợp lệ \r\n";
                            } else {
                                $find_email = $this ->  staffModel -> findByEmail($email);
                                if ($find_email == 0) {
                                    return true;
                                } else {
                                    echo "Email đã được đăng ký \r\n";
                                }
                            }
                        }
                    }
                }
            } 
        }

        public function add()
        {
            if (isset($_COOKIE["id_admin"])) {
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $sex = $_POST["sex"];
                $position = $_POST["position"];
                $address = $_POST["address"];

                $validate_phone = $this -> validate_phone();
                $validate_email = $this -> validate_email();
                if ($validate_phone && $validate_email) {
                    $data = [
                        "name_staff" => $name,
                        "phone_staff" => $phone,
                        "email_staff" => $email,
                        "sex_staff" => $sex,
                        "address_staff" => $address,
                        "position_staff" => $position,
                    ];
    
                    $insert_staff = $this -> staffModel -> insertData($data);
                    echo "Đăng ký thành công";
                }
            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Delete staff 
        public function delete()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_staff = $_GET["id"];

                $staff = $this -> staffModel -> findStaff($id_staff);
                if ($staff == 0) {
                    header("Location: index.php?controller=QL_NhanVien");
                } else {
                    $delete = $this -> staffModel -> deleteStaff($id_staff);
                    header("Location: index.php?controller=QL_NhanVien");
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Update staff

        public function validate_phone_update() 
        {
            $id_staff = $_POST["id"];
            $phone = $_POST['phone'];
            $regex_phone = "/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/"; 
            $result_phone = preg_match($regex_phone,$phone) ;
            if(!$result_phone) { 
                echo "Số điện thoại không hợp lệ \r\n";
            } else {
                $find_phone = $this ->  staffModel -> findPhone($id_staff,$phone);
                if ($find_phone == 0) {
                    return true;
                } else {
                    echo "Số điện thoại đã được đăng ký \r\n";
                }
            }
        }

        public function validate_email_update() 
        {
            $id_staff = $_POST["id"];
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
                echo "Ký tự đầu tiên của email phải là một ký tự ascii (a-z) hoặc một số (0-9).\r\n";
            } else {
                if (!$result_arrlast) {
                    echo "Ký tự cuối cùng của email phải là một ký tự ascii (a-z) hoặc một số (0-9).\r\n";
                } 
                else {
                    if (!$result_arr0) {
                        echo "Email phải có từ 6 ký tự trở lên và phải có ít nhất một chữ cái (a-z)\r\n";
                    }
                    else {
                        if(!$result_arr01) {
                            echo "Email chỉ được phép sử dụng các chữ cái (a-z), số (0-9), và dấu chấm (.)\r\n";
                        }
                        else {
                            if (!$result_arr1) {
                                echo "Email không hợp lệ \r\n";
                            } else {
                                $find_email = $this ->  staffModel -> findEmail($id_staff,$email);
                                if ($find_email == 0) {
                                    return true;
                                } else {
                                    echo "Email đã được đăng ký \r\n";
                                }
                            }
                        }
                    }
                }
            } 
        }
        public function view_update_nhanvien()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_staff = $_GET["id"];

                $staff = $this -> staffModel -> findStaff($id_staff);
                if ($staff == 0) {
                    header("Location: index.php?controller=QL_NhanVien");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);
                    $getPosition = $this -> staffModel -> getAllPosition();
                    $countPosition = $this -> staffModel -> countPosition();

                    return $this -> view('frontend.QL_NhanVien_update.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getPosition" => $getPosition,
                                    "countPosition" => $countPosition,
                                    "staff" => $staff,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_staff = $_POST["id"];
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $sex = $_POST["sex"];
                $position = $_POST["position"];
                $address = $_POST["address"];

                $data = [
                    "name_staff" => $name,
                    "phone_staff" => $phone,
                    "email_staff" => $email,
                    "sex_staff" => $sex,
                    "address_staff" => $address,
                    "position_staff" => $position,
                ];

                $validate_phone = $this -> validate_phone_update();
                $validate_email = $this -> validate_email_update();

                if ($validate_phone && $validate_email) {
                    $findPhone = $this -> staffModel -> findPhone($id_staff,$phone);

                    if ($findPhone == 0) {
                        $findEmail = $this -> staffModel -> findEmail($id_staff,$email);
                        if ($findEmail == 0) {
                            $update = $this -> staffModel -> updateData($id_staff, $data);
                            echo "Thành công";
                        } else {
                            echo "Email đã được sử dụng";
                        }
                    } else {
                        echo "Số điện thoại đã được đăng ký";
                    }
                }
            } else {
                header("Location: index.php?controller=login");
            }
            

        }

        // Position
        public function add_position()
        {
            if (isset($_COOKIE["id_admin"])) {
                $position = $_POST["position"];
                $getPosition = $this -> staffModel -> findPosition($position);
                if ($getPosition == 0) {
                    $data = [
                        "name_position" => $position,
                    ];
    
                    $insert_position = $this -> staffModel -> insertPosition($data);
                    echo "Thêm thành công";
                } else {
                    echo "Chức vụ đâ tồn tại";
                }
            } else {
                header("Location: index.php?controller=login");
            }
            
        }

        public function delete_position()
        {
            if (isset($_COOKIE["id_admin"])) {
                $position = $_GET["id"];
                $findPosition = $this -> staffModel -> findPositionId($position);
                if ($findPosition == 0) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {
                    $delete = $this -> staffModel -> deletePosition($position);
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            } else {
                header("Location: index.php?controller=login");
            }
            
        }

    }