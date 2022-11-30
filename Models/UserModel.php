<?php
    class UserModel extends BaseModel
    {
        const TABLE = 'tbl_user';


        public function getAll()
        {
            $sql = "SELECT * FROM `".self::TABLE."`";
            die($sql);
            return $this -> allSql($sql);
        }
        
    }