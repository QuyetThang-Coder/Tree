<?php
    class StaffModel extends BaseModel
    {
        const TABLE = 'tbl_staff';
        const TABLE_POSITION = 'tbl_position';

        public function getStaff()
        {
            $sql = "SELECT * FROM `".self::TABLE."`
                    INNER JOIN tbl_position ON tbl_staff.position_staff = tbl_position.id_position
                    WHERE `".self::TABLE."`.deleted = '0' ORDER BY id_staff DESC";
            return $this -> allSql($sql);
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` INNER JOIN tbl_position ON tbl_staff.position_staff = tbl_position.id_position
                    WHERE id_staff = '$id'";
            return $this -> find($sql);
        }

        public function findByPhone($phone)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE phone_staff = '$phone' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findByEmail($email)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE email_staff = '$email' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findStaff($id)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE id_staff = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findPhone($id, $phone)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE phone_staff = '$phone' AND id_staff NOT IN ('$id')";
            return $this -> find($sql);
        }

        public function findEmail($id, $email)
        {
            $sql = "SELECT * FROM `".self::TABLE."` WHERE email_staff = '$email' AND id_staff NOT IN ('$id')";
            return $this -> find($sql);
        }

        public function updateData ($id, $data) {
            $dataSets = [];
            foreach ($data as $key => $value) {
                array_push($dataSets, "$key = '".$value."'");
            }

            $dataSetStrings = implode(',', $dataSets);

            $sql = "update `".self::TABLE."` set $dataSetStrings where id_staff = '$id'";
            $this -> updateSQL($sql);
        }

        public function deleteStaff($id)
        {
            $sql = "update `".self::TABLE."` set deleted = '1' where id_staff = $id";
            $this -> updateSQL($sql);
        }

        public function insertData($data)
        {
            $this -> create(self::TABLE, $data);
        }
        // Position
        public function getAllPosition()
        {
            $sql = "SELECT * FROM `".self::TABLE_POSITION."` WHERE deleted = '0'";
            return $this -> allSql($sql);
        }

        public function countPosition()
        {
            $sql = "SELECT count(*) AS position FROM `".self::TABLE_POSITION."` WHERE deleted = '0'";
            return $this -> allSql($sql);
        }

        public function findPosition($name)
        {
            $sql = "SELECT * FROM `".self::TABLE_POSITION."` WHERE name_position = '$name' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function findPositionId($id)
        {
            $sql = "SELECT * FROM `".self::TABLE_POSITION."` WHERE id_position = '$id' AND deleted = '0'";
            return $this -> find($sql);
        }

        public function insertPosition($data)
        {
            $this -> create(self::TABLE_POSITION, $data);
        }

        public function deletePosition($id)
        {
            $sql = "update `".self::TABLE_POSITION."` set deleted = '1' where id_position = $id";
            $this -> updateSQL($sql);
        }
    }