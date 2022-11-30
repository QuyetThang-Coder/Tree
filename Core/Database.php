<?php
    class Database
    {
        const HOST = 'localhost';
        const USENAME = 'root';
        const PASSWORD = '28012000';
        const DB_NAME = 'db_tree';

        public function connect()
        {
            $connect = mysqli_connect(self::HOST, self::USENAME, self::PASSWORD, self::DB_NAME);

            mysqli_set_charset($connect, "utf8");

            if (mysqli_connect_errno() === 0)
            {
                return $connect;
            }

            return false;
        }
    }