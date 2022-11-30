<?php
    class PaymentModel extends BaseModel
    {
        // const TABLE = 'tbl_policy';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function getAllSql() 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0'";
            return $this -> allSql($sql);
        }

        public function findById($id) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        /* Thêm */
        public function store($data)
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