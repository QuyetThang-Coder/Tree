<?php 
    session_start();
?>
<?php
    class QL_ChinhSachController extends BaseController
    {
        private $ql_chinhsachModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('PolicyModel');
            $this -> policyModel = new PolicyModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $policy = $this -> policyModel -> getAllSql();

            return $this -> view('frontend.QL_ChinhSach.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "policy" => $policy,
                                ]);
        }

        public function delete()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_policy = $_GET["id"];

                $policy = $this -> policyModel -> findpolicy($id_policy);
                if ($policy == 0) {
                    header("Location: index.php?controller=QL_ChinhSach");
                } else {
                    $delete = $this -> policyModel -> deletepolicy($id_policy);
                    header("Location: index.php?controller=QL_ChinhSach");
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Add policy
        public function view_add_ChinhSach() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);

            return $this -> view('frontend.QL_ChinhSach_add.show',
                                [
                                    "getStaff" => $getStaff,
                                ]);
        }
        
        public function add()
        {
            if (isset($_COOKIE["id_admin"])) {
                $title_policy = $_POST["title_policy"];
                $desc_policy = $_POST["desc_policy"];
                $content_policy = $_POST["content_policy"];

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
                        "title_policy" => $title_policy,
                        "image_policy" => $unique_image,
                        "description_policy" => $desc_policy,
                        "content_policy" => $content_policy,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $insert_policy = $this -> policyModel -> insertData($data);
                        $_SESSION["success"] = "Thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    } else {
                        $_SESSION["error"] = "Không thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                        
                
            } else {
                header("Location: index.php?controller=login");
            }

        }

        // Update
        public function view_update_policy()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_policy = $_GET["id"];

                $policy = $this -> policyModel -> findpolicy($id_policy);
                if ($policy == 0) {
                    header("Location: index.php?controller=QL_ChinhSach");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);

                    return $this -> view('frontend.QL_ChinhSach_update.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "policy" => $policy,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update()
        {
            if (isset($_COOKIE["id_admin"])) {

                $id_policy = $_POST["id_policy"];
                $title_policy = $_POST["title_policy"];
                $desc_policy = $_POST["desc_policy"];
                $content_policy = $_POST["content_policy"];

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
                        "title_policy" => $title_policy,
                        "description_policy" => $desc_policy,
                        "content_policy" => $content_policy,
                    ];
                    $update = $this -> policyModel -> updateData($id_policy, $data);
                    $_SESSION["success"] = "Thành công";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else if ($file_name != "") {
                    $data = [
                        "title_policy" => $title_policy,
                        "image_policy" => $unique_image,
                        "description_policy" => $desc_policy,
                        "content_policy" => $content_policy,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $update = $this -> policyModel -> updateData($id_policy, $data);
                        $_SESSION["success"] = "Thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        
                    } else {
                        $_SESSION["error"] = "Không thành công";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }
                        
                
            } else {
                header("Location: index.php?controller=login");
            }

        }
        
    }