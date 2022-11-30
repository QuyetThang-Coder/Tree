<?php
    class BaseModel extends Database
    {
        protected $connect;

        public function __construct()
        {
            $this -> connect = $this -> connect();
        }

        /* Lấy ra tất cả dữ liệu trong bảng */
        public function all($table, $select = ['*'])
        {
            $columns = implode(',',$select);

            $sql = "select $columns from $table";
            // die($sql);
            $query = $this -> _query($sql);

            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }

            return $data;

        }

        public function allSql($sql)
        {
            $query = $this -> _query($sql);

            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                array_push($data, $row);
            }

            return $data;

        }

        

        /* Lấy ra 1 bản ghi trong bảng */
        public function find($sql)
        {
            $query = $this -> _query($sql);
            $data = [];
            if (mysqli_num_rows($query) < 1) {
                $data = 0;
                return $data;
            }
            else {
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($data, $row);
                };   
                return $data;
            }
            
        }

        /* Thêm dữ liệu vào bảng */
        public function create($table, $data = [])
        {
            $columns = implode(',', array_keys($data));
            $newValues = [];
            foreach($data as $values) {
                array_push($newValues,"'".$values."'");
            }
            // print_r($newValues);

            $newValues = implode(',', $newValues);
            $sql = "insert into $table ($columns) values ($newValues)";
            // die($sql);
            $this -> _query($sql);
        }

        /* Thêm dữ liệu vào bảng lấy ra id vừa thêm*/
        public function createLastId($table, $data = [])
        {
            $columns = implode(',', array_keys($data));
            $newValues = [];
            foreach($data as $values) {
                array_push($newValues,"'".$values."'");
            }
            $newValues = implode(',', $newValues);
            $sql = "insert into $table ($columns) values ($newValues)";
            // die($sql);
            $this -> _query($sql);
            return mysqli_fetch_assoc($this -> _query("SELECT LAST_INSERT_ID();"));
        }

        /* Update dữ liệu vào bảng */
        public function update($table, $id, $data)
        {
            $dataSets = [];
            foreach ($data as $key => $value) {
                array_push($dataSets, "$key = '".$value."'");
            }

            $dataSetStrings = implode(',', $dataSets);

            $sql = "update $table set $dataSetStrings where id = '$id'";
            // die($sql);
            $this -> _query($sql);
        }

        public function updateSQL($sql)
        {
            $this -> _query($sql);
        }

        /* Delete dữ liệu của bảng */
        public function delete($table, $id)
        {
            $sql = "delete from $table where id = $id";
            $this -> _query($sql);
        }

        public function deleteSql($sql)
        {
            $this -> _query($sql);
        }

        private function _query($sql)
        {
            return mysqli_query($this -> connect, $sql);
        }
    }