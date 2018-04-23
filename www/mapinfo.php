<?php

include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData
$query = "SELECT r_name, location, hyperlink FROM GatorMap";
$results = $data->select($query); 

$h = array();

if (isset($_POST['location']) and $_POST['location'] != null)
{
    location = $_POST['location']);
}

while($field = $results->fetch_assoc())
{ 

      if ($field['location'] == location)
      {
          $h[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']); 
          
      }
}
?>