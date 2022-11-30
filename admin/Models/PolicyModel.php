<?php
    class PolicyModel extends BaseModel
    {
        const TABLE = 'tbl_policy';

        public function getAllSql() 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0' ORDER BY id DESC";
            return $this -> allSql($sql);
        }

        public function findPolicy($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function deletePolicy($id)
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

    }