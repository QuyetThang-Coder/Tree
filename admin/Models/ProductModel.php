<?php
    class ProductModel extends BaseModel
    {
        const TABLE = 'tbl_product';
        const TABLE_CATEGORY = 'tbl_category';

        public function getProduct()
        {
            $sql = "SELECT `".self::TABLE."`.*, `".self::TABLE_CATEGORY."`.name_category FROM `".self::TABLE."`
                    INNER JOIN `".self::TABLE_CATEGORY."` ON `".self::TABLE_CATEGORY."`.id = `".self::TABLE."`.category_id
                    WHERE `".self::TABLE."`.deleted = '0' ORDER BY `".self::TABLE."`.id DESC";
            return $this -> allSql($sql);
        }

        public function findProduct($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function deleteProduct($id)
        {
            $sql = "update `".self::TABLE."` set deleted = '1' where id = $id";
            $this -> updateSQL($sql);
        }

        public function insertData($data)
        {
            $this -> create(self::TABLE, $data);
        }

        public function updateData ($id, $data) {
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
            $sql = "SELECT count(*) as sum from `".self::TABLE."` where deleted = '0'";
            return $this -> allSql($sql);
        }

        // Category
        public function getAllCategory()
        {
            $sql = "SELECT * FROM `".self::TABLE_CATEGORY."` WHERE deleted = '0'";
            return $this -> allSql($sql);
        }

        public function countCategory()
        {
            $sql = "SELECT count(*) AS category FROM `".self::TABLE_CATEGORY."` WHERE deleted = '0'";
            return $this -> allSql($sql);
        }

        public function findCategory($name)
        {
            $sql = "SELECT * FROM `".self::TABLE_CATEGORY."` WHERE name_category = '$name' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findCategoryId($id)
        {
            $sql = "SELECT * FROM `".self::TABLE_CATEGORY."` WHERE id = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function insertCategory($data)
        {
            $this -> create(self::TABLE_CATEGORY, $data);
        }

        public function deleteCategory($id)
        {
            $sql = "update `".self::TABLE_CATEGORY."` set deleted = '1' where id = $id";
            $this -> updateSQL($sql);
        }
    }