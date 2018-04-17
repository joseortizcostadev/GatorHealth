<?php
   /* Uncomment the next three lines to check errors only */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// include the database connection and the database data classes
include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData
$search_val = "";
// puts back in search bar the value previosly searched.
if (isset($_POST['query']) && $_POST['query'] != null && $_POST['query'] != "")
{
    $search_val = $_POST['query'];
    
    //get matched data from skills table
    $query = $db->query("SELECT category FROM hot WHERE category LIKE '%".$search_val."%' ORDER BY category ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['category'];
    }
    
    //return json data
    echo json_encode($data);
?>
