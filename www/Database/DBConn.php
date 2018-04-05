<?php
/**
 * File: DBConn.php
 * Author: GatorHealth team
 * Description: This class contains useful methods to create a connection to a MySQL database
 */

/* Uncomment the next three lines of code only for error checking */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// include auth parameters file for database
include_once dirname(__FILE__) . '/DBConfig.php';

Class DBConn
{

    private $server = DB_HOST; // default is localhost
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DATABASE;
    private $conn; // connection instance

    /**
     * DBConn constructor.
     */
    public function __construct()
    {
        // Creates the mysql connection
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);

    }

    /**
     * @return bool: True if the connection to the database was successful. Otherwise, returns false.
     */
    public function isUsrConnectedToDB()
    {
        if (!$this->conn) {
            return false;
        }
        return true;
    }

    /**
     * @return bool|mysqli the connection to the database
     */
    public function getConnection()
    {
        if ($this->isUsrConnectedToDB()) {
            return $this->conn;
        }
        return false;
    }

    /**
     * @return bool: True if the connection to the database was correctly closed. Otherwise, returns false.
     */
    public function closeConnection()
    {
        return $this->conn->close();
    }

}// end class


?>