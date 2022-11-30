<?php
    class LoginModel extends BaseModel
    {
        const TABLE = 'tbl_staff';

        public function findByPhone_Password($phone) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE phone_staff = '$phone' AND position_staff = '2'";
            return $this -> find($sql);
        }

        public function getUser($phone)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone'";
            return $this -> find($sql);
        }

        public function getUserById($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_user = '$id'";
            return $this -> find($sql);
        }
    }