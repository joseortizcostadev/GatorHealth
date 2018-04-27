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
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #000;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#000 1px solid;color:#000;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#000;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
	

body {font-family: Arial, Helvetica, sans-serif;}

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
</style>
</head>
<body>

<center><h2>Welcome to Gator Health!</h2></center>
    <center><h3>Please fill out the required fields to registrate your organization</h3></center>


  <form action="Submissionform.php">

  <form action="Submissionform.php" method="post">
      
	<div class="bgcolor">
		<label for="fname" class="demo-label">Organization Name</label><br/> <input type="text" name="txtOrg" id="txtOrg" class="typeahead"/>
	</div>
       <label for="subject">Organization's Discription:</label>
    <textarea id="subject" name="subject" placeholder="250 words limit" style="height:150px"></textarea>
 <h4>Please check all that apply to your organization</h4>
      <input id="checkBox" type="checkbox"><label for="lname">Mental Health</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Primary Care</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Food Resouces</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Vaccinations</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Holitic Health</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Free</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">On campus</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Off campus</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">New organization</label><br/>
      <input id="checkBox" type="checkbox"><label for="lname">Other
      
      
            <label for="Place">Organizations Location</label>
            <select id="Place" name="Organizations Location">
            <option value="HH">Hensal Hall (HH)</option>
            <option value="TH">Thortan Hall(TH)</option>
            <option value="TH">Hummanities</option>
            <option value="TH">Fine Arts</option>
            <option value="TH">Trailers</option>
            <option value="TH">Cesar Chaves</option>
            <option value="TH">Burk Hall</option>
            <option value="TH">Ethnic Studies</option>
      
     
        <div>
                
                <label for="fname">Room</label>
        
                <input type="text" id="fname" name="firstname" placeholder="Enter">
      
                <label for="lname">Open Hours</label>
                
                
                
                <input type="text" id="lname" name="lastname" placeholder="Enter">

        
                <label for="lname">Submitted By</label>
                <input type="text" id="lname" name="email" placeholder="Enter">
    
           

    <input type="submit" value="Submit">
    <input type="submit" name="submit" value="Submit">
    
    </form>
    </body>
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
</script>
</html>