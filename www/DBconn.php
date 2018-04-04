<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    // include auth parameters for database
include_once dirname(__FILE__) . '/appConfig.php';

        Class DBConn
        {
                private $server = DB_HOST;
                private $username = DB_USERNAME;
                private $password = DB_PASSWORD;
                private $database = DATABASE;
            private $conn;


                public function __construct ()
                {

            $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);

        }
                public function isUsrConnectedToDB ()
                {
                        if (!$this->conn)
            {
                return false;
            }
            return true;
                }

                public function getConnection ()
                {
                        if ($this->isUsrConnectedToDB())
                        {
                                return $this->conn;
                        }
                    return false;
                }

}// end class






?>