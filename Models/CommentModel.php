<?php
    class CommentModel extends BaseModel
    {
        const TABLE = 'tbl_comment';

        public function findExist($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_product = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function getComment($id_product)
        {
            $sql = "SELECT `".self::TABLE."`.*, tbl_user.name_user FROM `".self::TABLE."`
                    INNER JOIN tbl_user ON tbl_user.id_user = `".self::TABLE."`.id_user
                    WHERE id_product = '$id_product'
                    AND `".self::TABLE."`.deleted = '0'";
            return $this -> allSql($sql);
        }

        public function inserComment($data)
        {
            $this -> create(self::TABLE,$data);
        }
    }