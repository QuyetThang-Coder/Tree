<?php
    class LoginModel extends BaseModel
    {
        const TABLE = 'tbl_user';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function findByPhone_Password($phone, $password) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone' AND password = '$password'";
            return $this -> find($sql);
        }

        public function getUser($phone)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone'";
            // die($sql);
            return $this -> find($sql);
        }

        public function getUserById($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_user = '$id'";
            return $this -> find($sql);
        }

        public function updateData ($id, $data) {
            $dataSets = [];
            foreach ($data as $key => $value) {
                array_push($dataSets, "$key = '".$value."'");
            }

            $dataSetStrings = implode(',', $dataSets);

            $sql = "update `".self::TABLE."` set $dataSetStrings where id_user = '$id'";
            $this -> updateSQL($sql);
        }

        public function findPhone($id, $phone)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE number_phone = '$phone' AND id_user NOT IN ('$id')";
            return $this -> find($sql);
        }

        public function findEmail($id, $email)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE email = '$email' AND id_user NOT IN ('$id')";
            return $this -> find($sql);
        }

        public function findPass($id, $pass)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_user = '$id' AND password = '$pass'";
            return $this -> find($sql);
        }
    }