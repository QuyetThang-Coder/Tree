<?php 
    session_start();
?>
<?php
    class QL_TinTucController extends BaseController
    {
        private $ql_tintucModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('NewsModel');
            $this -> newsModel = new NewsModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $news = $this -> newsModel -> getAllSql();

            return $this -> view('frontend.QL_TinTuc.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "news" => $news,
                                ]);
        }

        public function delete()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_news = $_GET["id"];

                $news = $this -> newsModel -> findNews($id_news);
                if ($news == 0) {
                    header("Location: index.php?controller=QL_TinTuc");
                } else {
                    $delete = $this -> newsModel -> deleteNews($id_news);
                    header("Location: index.php?controller=QL_TinTuc");
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Add news
        public function view_add_tintuc() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);

            return $this -> view('frontend.QL_TinTuc_add.show',
                                [
                                    "getStaff" => $getStaff,
                                ]);
        }
        
        public function add()
        {
            if (isset($_COOKIE["id_admin"])) {
                $title_news = $_POST["title_news"];
                $desc_news = $_POST["desc_news"];
                $content_news = $_POST["content_news"];

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
                        "title_news" => $title_news,
                        "image_news" => $unique_image,
                        "description_news" => $desc_news,
                        "content_news" => $content_news,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $insert_news = $this -> newsModel -> insertData($data);
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
        public function view_update_news()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_news = $_GET["id"];

                $news = $this -> newsModel -> findNews($id_news);
                if ($news == 0) {
                    header("Location: index.php?controller=QL_TinTuc");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);

                    return $this -> view('frontend.QL_TinTuc_update.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "news" => $news,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update()
        {
            if (isset($_COOKIE["id_admin"])) {

                $id_news = $_POST["id_news"];
                $title_news = $_POST["title_news"];
                $desc_news = $_POST["desc_news"];
                $content_news = $_POST["content_news"];

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
                        "title_news" => $title_news,
                        "description_news" => $desc_news,
                        "content_news" => $content_news,
                    ];
                    $update = $this -> newsModel -> updateData($id_news, $data);
                    $_SESSION["success"] = "Thành công";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else if ($file_name != "") {
                    $data = [
                        "title_news" => $title_news,
                        "image_news" => $unique_image,
                        "description_news" => $desc_news,
                        "content_news" => $content_news,
                    ];
                    if (move_uploaded_file($file_temp,$uploaded_image)) {
                        $update = $this -> newsModel -> updateData($id_news, $data);
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