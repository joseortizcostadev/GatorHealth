<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'searchResults';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_POST['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT category FROM hot WHERE category LIKE '%".$searchTerm."%' ORDER BY category ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['category'];
    }
    
    //return json data
    echo json_encode($data);
?>
