<?php
    class OrderModel extends BaseModel
    {
        const TABLE = 'tbl_order';
        const TABLE_DETAIL = 'tbl_order_detail';

        public function getAll($select = ['*']) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` ORDER BY id DESC";
            return $this -> allSql($sql);
        }

        public function countStatus0()
        {
            $sql = "SELECT count(*) as status FROM `tbl_order` WHERE status = '0' ";
            return $this -> allSql($sql);
        }

        public function countStatus1()
        {
            $sql = "SELECT count(*) as status FROM `tbl_order` WHERE status = '1' ";
            return $this -> allSql($sql);
        }

        public function findOrder_id($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' ";
            return $this -> find($sql);
        }

        public function findOrder_status0($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND status = '0'";
            return $this -> find($sql);
        }

        public function findOrder_status1($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND status = '1'";
            return $this -> find($sql);
        }

        public function updateStatus($id, $data)
        {
            $dataSets = [];
            foreach ($data as $key => $value) {
                array_push($dataSets, "$key = '".$value."'");
            }

            $dataSetStrings = implode(',', $dataSets);

            $sql = "update `".self::TABLE."` set $dataSetStrings where id = '$id'";
            $this -> updateSQL($sql);
        }

        public function count() 
        {
            $sql = "SELECT count(*) as sum from `".self::TABLE."`  where status = '2'";
            return $this -> allSql($sql);
        }

        public function statistical()
        {
            $sql = "SELECT COUNT(id) as Tongdonhang, SUM(order_price) as Doanhthu, month(order_date) AS Month
                    FROM `".self::TABLE."`
                    WHERE year(order_date) = year(curdate())
                    AND status = 2
                    GROUP BY month(order_date)
                    ORDER BY Month ";
            return $this -> allSql($sql);
        }

        public function statistical_year()
        {
            $sql = "SELECT COUNT(id) as Tongdonhang, SUM(order_price) as Doanhthu, year(order_date) AS Year
                    FROM `".self::TABLE."`
                    WHERE status = 2
                    GROUP BY year(order_date)
                    ORDER BY Year; ";
            return $this -> allSql($sql);
        }

        // Order_detail
        public function findOrder($id)
        {
            $sql = "SELECT * FROM `".self::TABLE_DETAIL."` WHERE id_order = '$id' ";
            return $this -> find($sql);
        }

        public function getOrder_detail($id)
        {
            $sql = "SELECT * FROM `".self::TABLE_DETAIL."` WHERE id_order = '$id'";
            return $this -> allSql($sql);
        }
        
    }