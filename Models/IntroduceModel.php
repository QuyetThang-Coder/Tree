<?php
    class IntroduceModel extends BaseModel
    {
        const TABLE = 'tbl_introduce';

        public function getAll($select = ['*']) 
        {
            return $this -> all(self::TABLE, $select);
        }

        public function findById($id) 
        {
            return $this -> find(self::TABLE,$id);
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