<?php
    class ProductModel extends BaseModel
    {
        const TABLE = 'tbl_product';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function getNewProduct()
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0' ORDER BY id DESC LIMIT 3";
            return $this -> allSql($sql);
        }

        public function getAllSql() 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0' ORDER BY id DESC";
            return $this -> allSql($sql);
        }

        public function findByIdCategory($id) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE category_id = '$id' AND deleted = '0'";
            return $this -> allSql($sql);
        }

        public function findByIdProduct($id) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function similar_product($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE category_id = '$id' AND deleted = '0' ORDER BY id DESC LIMIT 3";
            return $this -> find($sql);
        }

        public function productSelling()
        {
            $sql = "SELECT tbl_product.*, SUM(tbl_order_detail.quantity_product) AS Tongsoluong
                    FROM tbl_order_detail
                    INNER JOIN tbl_product ON tbl_product.id = tbl_order_detail.id_product
                    WHERE tbl_product.deleted = '0'
                    GROUP BY tbl_order_detail.id_product
                    ORDER BY Tongsoluong DESC LIMIT 6;";
            return $this -> allSql($sql);
        }

        public function productSelling4()
        {
            $sql = "SELECT tbl_product.*, SUM(tbl_order_detail.quantity_product) AS Tongsoluong
                    FROM tbl_order_detail
                    INNER JOIN tbl_product ON tbl_product.id = tbl_order_detail.id_product
                    WHERE tbl_product.deleted = '0'
                    GROUP BY tbl_order_detail.id_product
                    ORDER BY Tongsoluong DESC LIMIT 4;";
            return $this -> allSql($sql);
        }

        public function findExist($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND deleted = '0' ";
            return $this -> find($sql);
        }

        public function updateData($id, $data) 
        {
            $this -> update(self::TABLE, $id, $data);
        }
        
    }