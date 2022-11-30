<?php
    class NewsModel extends BaseModel
    {
        const TABLE = 'tbl_news';

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

        public function findExist($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id'";
            return $this -> find($sql);
        }
    }