<?php 
    session_start();
?>
<?php
    class QL_KhachHangController extends BaseController
    {
        private $ql_khachhangModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('UserModel');
            $this -> userModel = new UserModel;
        }

        public function show() 
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_staff = $_COOKIE["id_admin"];
                $getStaff = $this -> staffModel -> findById($id_staff);
                $user = $this -> userModel -> getAll();

                return $this -> view('frontend.QL_KhachHang.show', 
                                    [
                                        "getStaff" => $getStaff,
                                        "user" => $user,
                                    ]);
            } else {
                header("Location: index.php?controller=login");
            }
        }
        
    }