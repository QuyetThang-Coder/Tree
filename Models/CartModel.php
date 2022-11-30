<?php
    class CartModel extends BaseModel
    {
        const TABLE = 'tbl_cart';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function findProductbyId($id_product,$id_user) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_product = '$id_product' AND user = '$id_user'";
            return $this -> find($sql);
        }

        public function sum_cart($id_user) 
        {
            $sql = "SELECT count(*) as sum from `".self::TABLE."`
                    INNER JOIN tbl_product ON `".self::TABLE."`.id_product = tbl_product.id 
                    where user = '$id_user' and tbl_product.deleted = '0';";
                    // die($sql);
            return $this -> allSql($sql);
        }

        public function allCart($id_user)
        {
            $sql = "SELECT * from `".self::TABLE."`
                    INNER JOIN tbl_product ON `".self::TABLE."`.id_product = tbl_product.id 
                    where user = '$id_user' and tbl_product.deleted = '0';";
            // die($sql);
            return $this -> allSql($sql);
        }

        public function deleteCart($id_product, $id_user)
        {
            $sql = "DELETE FROM `".self::TABLE."` WHERE id_product = '$id_product' AND user = '$id_user'";
            return $this -> deleteSql($sql);
        }

        public function updateCart($id_product, $id_user, $quantity)
        {
            $sql = "UPDATE `".self::TABLE."` SET quantity = '$quantity' WHERE id_product = '$id_product' AND user = '$id_user'";
            // die($sql);
            return $this -> updateSQL($sql);
        }

        /* Thêm */
        public function insertData($data)
        {
            $this -> create(self::TABLE,$data);
        }

        /* Sửa */
        public function updateData($id, $data) 
        {
            $this -> update(self::TABLE, $id, $data);
        }

        /* Xóa */
        public function deleteData($id) 
        {
            $this -> delete(self::TABLE,$id);
        }
    }