<?php
   /* Uncomment the next three lines to check errors only */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include the database connection and the database data classes
include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData


if (isset($_GET['term'])){
    $return_arr = array();

    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
    $stmt =  $conn->stmt_init();
    $term = '%'.$_GET['term'].'%';
    $stmt = $conn->prepare("SELECT category FROM hot WHERE category like ?");
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $stmt->bind_result($name);
    while ($stmt->fetch()) {
    $return_arr[] = $name;
}
    echo json_encode($return_arr);
}  
?>


