<?php
    class RegisterModel extends BaseModel
    {
        const TABLE = 'tbl_user';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function findById($id) 
        {
            return $this -> find(self::TABLE,$id);
        }

        public function findByPhone($phone) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone'";
            return $this -> find($sql);
        }

        public function findByEmail($email) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE email = '$email'";
            return $this -> find($sql);
        }

        public function findByPhone_Email($phone, $email) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone' AND email = '$email'";
            return $this -> find($sql);
        }

        public function change_password($phone, $email, $password) 
        {
            $sql = "UPDATE `".self::TABLE."` SET password = '$password' WHERE number_phone = '$phone' AND email = '$email'";
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