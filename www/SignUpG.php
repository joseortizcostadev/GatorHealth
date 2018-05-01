<!DOCTYPE html>
<?php
/* Uncomment the next three lines to check errors only */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// include the database connection and the database data classes
include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData
?>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Autocomplete with Dynamic Data Load using PHP Ajax</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	
    <style>
	

body {font-family: Times, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 10px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #9542f4;
    color: white;
    padding: 6px 26px;
    border: none;
    border-radius:8px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #9542f4;
}

.container {
    border-radius: 5px;
    background-color:  #989898;
    padding: 20px;
}
#back{
        float: right;
        background-color:gold;
        color: white;

    }
</style>

</head>
<body>
<form action="GatorHPW.html">
    <input type="submit" id="back" value="Go Back" />
</form>

<center><h2>Welcome to Gator Health!</h2></center>
    <center><h3>Please fill out the required fields to registrate your organization</h3></center>




  <form action="Submissionform.php" method="post">
      
	<div class="bgcolor">
		<label for="fname" class="demo-label">Organization Name</label><br/> <input type="text" name="org_name" id="txtOrg" class="typeahead"/>
	</div>
       <label for="subject">Organization's Discription:</label>
    <textarea id="subject" name="org_description" placeholder="250 words limit" style="height:150px"></textarea>
 <h4>Please check all that apply to your organization</h4>
      <input  name="check_list[]" id="check_list" type="checkbox" value="Mental Health"><label for="lname">Mental Health</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Primary Care"><label for="lname">Primary Care</label><br/>
      <input  name="check_list[]" id="check_list" type="checkbox" value="Food Resouces"><label for="lname">Food Resouces</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Vaccinations"><label for="lname">Vaccinations</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Holitic Health"><label for="lname">Holitic Health</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Free"><label for="lname">Free</label><br/>
      <input    name="check_list[]" id="check_list"type="checkbox" value="On campus"><label for="lname">On campus</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Off campus"><label for="lname">Off campus</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="New organization"><label for="lname">New organization</label><br/>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Other"><label for="lname">Other</label>

      
      
            <label for="Place">Organizations Location</label>
            <select id="Place" name="or_location">
            <option value="Hensal Hall (HH)">Hensal Hall (HH)</option>
            <option value="Thortan Hall(TH)">Thortan Hall(TH)</option>
            <option value="Hummanities">Hummanities</option>
            <option value="Fine Arts">Fine Arts</option>
            <option value="Trailers">Trailers</option>
            <option value="Cesar Chaves">Cesar Chaves</option>
            <option value="Burk Hall">Burk Hall</option>
            <option value="Ethnic Studies">Ethnic Studies</option>
            </select>
      
     
        <div>
                
                <label for="fname">Room</label>
        
                <input type="text" id="fname" name="r_number" placeholder="Enter">
      
                <label for="lname">Open Hours</label>
                
                
                
                <input type="text" id="lname" name="o_hours" placeholder="Enter">

        
                <label for="lname">Submitted By</label>
                <input type="text"  name="s_byName" placeholder="Enter">
   
            <input type="submit" name="submit" value="Submit">
            
            <imput type="button" value="Reset">
            <input type="button" value="cancel"> 
             
             
            
<script>
    $(document).ready(function () {
        $('#txtOrg').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });

