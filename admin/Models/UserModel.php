<?php
    class UserModel extends BaseModel
    {
        const TABLE = 'tbl_user';

        public function getAll($select = ['*']) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` ORDER BY id_user DESC";
            return $this -> allSql($sql);
        }

        public function count() 
        {
            $sql = "SELECT count(*) as sum from `".self::TABLE."`";
            return $this -> allSql($sql);
        }
    }