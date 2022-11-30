<?php
    class ContactModel extends BaseModel
    {
        const TABLE = 'tbl_contact';

        public function getAll() 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE deleted = '0' ORDER BY id DESC";
            return $this -> allSql($sql);
        }
    }