
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
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
	
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
      
}
        /*End of Type Ahead*/
body {margin:0;
    background:#ABAAD4;
    Font-family: “Lato”, sans-serif;    }
.w3-btn {width:150px;}
.navbar {
  overflow: hidden;
  background-color: #2b0080;  
  position: static;
  width: 100%;
Font-family: “Lato”, sans-serif;    
}
        
        

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 8px 40px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}
.navbar a.active {
  background-color: #1e0059;
  color: white;
}

.navbar .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .navbar a:not(:first-child) {display: none;}
  .navbar a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .navbar.responsive .icon {
    position: absolute;
    right: 0;
    bottom:0;
  }
  .navbar.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}

br {
  margin:2.5em 0;/* FF for instance */
  line-height:5em;/* chrome for instance */
}
.button{
    display: inline-block;
  border-radius: 4px;
  background-color: goldenrod;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.img-fluid{ 
max-width: 8%; }
    .gatorpic{
        width: 8%;
        height: 8%;
    }

    .marginal-screen{
margin-right: 10%;
    margin-left: 10%;  
        text-align: center;
        border-width:5px;
border-style:solid;
border-color:goldenrod;
background: white;
        padding: 10px;
    
    }
            .undernav{
            padding-bottom: 200px;
        }

        .space{
    margin: 50px;
        
}

    #main{background-image: url('gatorRon.png');
            background-position: left;
            background-size: contain;
            background-repeat: no-repeat;
    font-size: 20px;}
   
    #wrapper {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
    }
    .dry{
        border-color: #2b0080;
        background-color: #2b0080;
        color: white;
    }

.center-block {  
  display: block;  
  margin-right: auto;
margin-left: 10%;
}
.truecenter-block { 
    display: block;
    margin: auto;
    width: 85%;
    height: 150px;
    border: 10px solid gold;
    padding: 10px;
    text-align: center
}   
    .center{
        margin: auto;
    }
    .icons{ bottom: 10;}
    
    .panicindisco{
        width:400px;
        height:300px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        z-index: 1;
    }
        /*Type Ahead*/
	.typeahead { border: 2px solid #000;border-radius: 4px;padding: 8px 12px;background: color: #000;}
	.tt-menu { width:100%; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#000 1px solid;color:#000;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {width: 100%; max-height:340px;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {color: #FFF;color:#000;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		
		outline: 0;
	}
                td {
    padding-right: 50px;
}
        /*End of Type Ahead*/

   
</style>
</head>
<div id="navbox">
<div class="navbar" id="myNavbar">
      <a href="GatorHome.php"  id="main"> GatorHealth </a>
          
  <a href="GatorMap.php">Map</a>
  <a href="GatorPharmacy.html">Pharmacy</a>
  <a href="GatorResources.html" >Resources</a>
  <a href="GatorSearch.php">Search</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div>


<body class="undernav">
<br>
<div class="marginal-screen">

<center><h2>Welcome to Gator Health!</h2></center>
    <center><h3>Please fill out the required fields to register your organization</h3><h5>After successfully submitted, you will be redirected back to the home page.</h5></center>




  <form action="Submissionform.php" method="post">
      
	<div class="bgcolor">
       
           
                <b class="demo-label">Student Organization</b>
        <br><input type="text" name="org_name" id="txtCountry" class="typeahead"/>
	</div>

      <label for="subject">Organization Description</label>
    <textarea id="subject" name="org_description" placeholder="250 words limit" style="height:100px"></textarea>
 <h4>Please check all that apply to your organization</h4>
      <input  name="check_list[]" id="check_list" type="checkbox" value="Mental Health"><label for="lname">Mental Health</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Primary Care"><label for="lname">Primary Care</label>
      <input  name="check_list[]" id="check_list" type="checkbox" value="Food Resources"><label for="lname">Food Resources</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Vaccinations"><label for="lname">Vaccinations</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Holistic Health"><label for="lname">Holistic Health</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Free"><label for="lname">Free</label>
      <input    name="check_list[]" id="check_list"type="checkbox" value="On campus"><label for="lname">On campus</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Off campus"><label for="lname">Off campus</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="New organization"><label for="lname">New organization</label>
      <input   name="check_list[]" id="check_list" type="checkbox" value="Other"><label for="lname">Other</label>

      <div>

            <label for="Place">Organization Location</label>

            <select id="Place" name="or_location">

            <option value="Hensill Hall (HH)">Hensill Hall (HH)</option>
            <option value="Thornton Hall(TH)">Thornton Hall(TH)</option>
            <option value="Humanities">Humanities</option>
            <option value="Fine Arts">Fine Arts</option>
            <option value="Trailers">Trailers</option>
            <option value="Cesar Chavez">Cesar Chavez</option>
            <option value="Burk Hall">Burk Hall</option>
            <option value="Ethnic Studies">Ethnic Studies</option>
            </select>
                
                <label for="fname">Room</label>
        
                <input type="text" id="fname" name="r_number" placeholder="Enter">
 
                <label for="lname">Open Hours</label>
                
                
                
                <input type="text" id="lname" name="o_hours" placeholder="Enter">

 
                <label for="lname">Please include your email</label>
                <input type="text"  name="s_byName" placeholder="Enter">

            <input type="submit" name="submit" value="Submit">
         
      
           
             
    </div>
            
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
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
    </body>
</html>
