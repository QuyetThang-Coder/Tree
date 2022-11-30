<?php
    class SaleModel extends BaseModel
    {
        const TABLE = 'tbl_sale';


        public function CountSale()
        {
            $sql = "SELECT COUNT(id_sale) as sum_sale from `".self::TABLE."` where current_timestamp() < end_day and sale_remain > 0;";
            return $this -> allSql($sql);
        }

        public function getAll()
        {
            $sql = "SELECT * from `".self::TABLE."` where current_timestamp() < end_day and sale_remain > 0;";
            return $this -> allSql($sql);
        }

        public function findSale($name_sale)
        {
            $sql = "SELECT * from `".self::TABLE."` WHERE sale_name = '$name_sale' AND start_day < current_timestamp() AND current_timestamp() < end_day;";
            return $this -> find($sql);
        }
        
        public function updateData($id, $data) 
        {
            $dataSets = [];
            foreach ($data as $key => $value) {
                array_push($dataSets, "$key = '".$value."'");
            }

            $dataSetStrings = implode(',', $dataSets);

            $sql = "update `".self::TABLE."` set $dataSetStrings where id_sale = '$id'";
            $this -> updateSQL($sql);
        }
    }