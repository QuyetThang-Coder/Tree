<?php
    class OrderModel extends BaseModel
    {
        const TABLE = 'tbl_order';
        const TABLE_DETAIL = 'tbl_order_detail';

        /* Thêm */
        public function insertData($data)
        {
            return $this -> createLastId(self::TABLE,$data);

        }

        public function inserOrderDetail($data)
        {
            $this -> create(self::TABLE_DETAIL,$data);
        }

        public function getAll($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_user = '$id' ORDER BY id DESC";
            return $this -> allSql($sql);
        }

        public function cancelOrder($id, $data)
        {
            $this -> update(self::TABLE, $id, $data); 
        }

        public function findOrder($id, $id_user)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND id_user = '$id_user'";
            return $this -> allSql($sql);
        }

        public function findExist($id, $id_user)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND id_user = '$id_user'";
            return $this -> find($sql);
        }

        // Order view
        public function findOrder_detail($id)
        {
            $sql = "SELECT * FROM `".self::TABLE_DETAIL."` WHERE id_order = '$id'";
            return $this -> allSql($sql);
        }

        public function findOrder_user($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id'";
            return $this -> find($sql);
        }
    }