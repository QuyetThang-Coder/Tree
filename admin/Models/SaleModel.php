<?php
    class SaleModel extends BaseModel
    {
        const TABLE = 'tbl_sale';

        public function getAll()
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0' ORDER BY id_sale DESC";
            return $this -> allSql($sql);
        }

        public function findSale($name)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE sale_name = '$name' AND current_timestamp() < end_day AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findSale_NotId($id, $name)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE sale_name = '$name' AND current_timestamp() < end_day AND deleted = '0' AND id_sale NOT IN ($id)";
            return $this -> find($sql);
        }
        public function findSale_Id($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_sale = '$id' AND deleted = '0'";
            return $this -> find($sql);
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

            $sql = "update `".self::TABLE."` set $dataSetStrings where id_sale = '$id'";
            $this -> updateSQL($sql);
        }

        public function deleteSale($id)
        {
            $sql = "update `".self::TABLE."` set deleted = '1' where id_sale = $id";
            $this -> updateSQL($sql);
        }

        public function count() 
        {
            $sql = "SELECT COUNT(id_sale) as sum from `".self::TABLE."` where curdate() < end_day and sale_remain > 0 and deleted = '0'";
            return $this -> allSql($sql);
        }
    }