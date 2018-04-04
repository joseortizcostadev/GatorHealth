<?php
include_once dirname(__FILE__) . '/DBConn.php';

$conn = new DBConn();


$is_connected = $conn->isUsrConnectedToDB();
    
echo $is_connected;

?>