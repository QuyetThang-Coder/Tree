<?php
    class BannerModel extends BaseModel
    {
        const TABLE = 'tbl_banner';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function findById($id) 
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id = '$id'";
            return $this -> find($sql);
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