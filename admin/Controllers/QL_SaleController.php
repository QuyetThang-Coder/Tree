<?php 
    session_start();
?>
<?php
    class QL_SaleController extends BaseController
    {
        private $ql_saleModel;
        /* Khởi tạo */
        public function __construct()
        {
            $this -> loadModel('StaffModel');
            $this -> staffModel = new StaffModel;

            $this -> loadModel('SaleModel');
            $this -> saleModel = new SaleModel;
        }

        public function show() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $getSale = $this -> saleModel -> getAll();

            return $this -> view('frontend.QL_Sale.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "getSale" => $getSale,
                                ]);
        }

        public function view_add_sale() 
        {
            $id_staff = $_COOKIE["id_admin"];

            $getStaff = $this -> staffModel -> findById($id_staff);
            $getSale = $this -> saleModel -> getAll();
            return $this -> view('frontend.QL_Sale_add.show', 
                                [
                                    "getStaff" => $getStaff,
                                ]);
        }

        public function add()
        {
            if (isset($_COOKIE["id_admin"])) {
                $name = $_POST["name"];
                $price = $_POST["price"];
                $rule = $_POST["rule"];
                $quantity = $_POST["quantity"];
                $start = $_POST["start"];
                $end = $_POST["end"];

                $find_sale = $this -> saleModel -> findSale($name);
                if ($find_sale == 0) {
                    if ($start >= $end) {
                        echo "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                    } else if ($start < $end) {
                        $data = [
                            "sale_name" => $name,
                            "sale_price" => $price,
                            "sale_rule" => $rule,
                            "sale_quantity" => $quantity,
                            "sale_remain" => $quantity,
                            "start_day" => $start,
                            "end_day" => $end,
                        ];
                        $insertsale = $this -> saleModel -> insertData($data);
                        echo "Thêm thành công";
                    }
                } else {
                    echo "Mã giảm giá đang được sử dụng";
                }
                
            } else {
                header("Location: index.php?controller=login");
            }
        }

        // Update
        public function view_update_sale()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_sale = $_GET["id"];

                $sale = $this -> saleModel -> findSale_Id($id_sale);
                if ($sale == 0) {
                    header("Location: index.php?controller=QL_Sale");
                } else {
                    $id_staff = $_COOKIE["id_admin"];

                    $getStaff = $this -> staffModel -> findById($id_staff);

                    return $this -> view('frontend.QL_Sale_update.show', 
                                [
                                    "getStaff" => $getStaff,
                                    "sale" => $sale,
                                ]);
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function update()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_sale = $_POST["id"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                $rule = $_POST["rule"];
                $quantity = $_POST["quantity"];
                $start = $_POST["start"];
                $end = $_POST["end"];

                $find_sale = $this -> saleModel -> findSale_NotId($id_sale, $name);
                if ($find_sale == 0) {
                    if ($start >= $end) {
                        echo "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                    } else if ($start < $end) {
                        $data = [
                            "sale_name" => $name,
                            "sale_price" => $price,
                            "sale_rule" => $rule,
                            "sale_quantity" => $quantity,
                            "sale_remain" => $quantity,
                            "start_day" => $start,
                            "end_day" => $end,
                        ];
                        $updatesale = $this -> saleModel -> updateData($id_sale, $data);
                        echo "Thêm thành công";
                    }
                } else {
                    echo "Mã giảm giá đang được sử dụng";
                }
                
            } else {
                header("Location: index.php?controller=login");
            }
        }

        public function delete_sale()
        {
            if (isset($_COOKIE["id_admin"])) {
                $id_sale = $_GET["id"];

                $sale = $this -> saleModel -> findSale_Id($id_sale);
                if ($sale == 0) {
                    header("Location: index.php?controller=QL_Sale");
                } else {
                    $delete = $this -> saleModel -> deleteSale($id_sale);
                    header("Location: index.php?controller=QL_Sale");
                }

            } else {
                header("Location: index.php?controller=login");
            }
        }
        
    }