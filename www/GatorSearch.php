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
}

?>
<!DOCTYPE html>
<html>
<head>
<!--<meta charset="utf-16">
<meta charset="utf-8">-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="jQuery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .rock {
      align-self: center;
            margin: auto;
                display: block;
  }
      .trending {
            border-radius: 10px;
            padding: 15px;
          width: 300px;
          text-align: center;
        border-width:5px;
border-style:solid;
border-color:goldenrod;
background: white;
          
        }

        .trending .trends {
            color: #000;
            padding-left: 10px;
            margin-top: 10px;
        }
        .results {
            border-radius: 10px;
            padding: 15px;
        width: 600px;
        border-radius: 10px;
            padding: 15px;
          text-align: center;
        border-width:5px;
border-style:solid;
border-color:goldenrod;
background: white;
          margin: auto;}

      .end {
            color: #000;
            border-radius: 10px;
            padding: 15px;
        width: 600px;
        border-radius: 10px;
            padding: 15px;
          text-align: center;
        border-width:5px;

          margin: auto;
        }
        .searchbox{position: relative;
  top: 50%;
  left: 40%;
            display: flex;
    width: 75%;}
        input[type=text] {

                width: 250px;
            margin-bottom: 50px;
            margin-top: 10px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.jpg');
            background-position: left;
            background-size: contain;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 300px;
        }


body {margin:0;
    background:#ABAAD4;
    
    font-family: "Lato", sans-serif;
    box-sizing: border-box}
.w3-btn {width:150px;}
.navbar {
  overflow: hidden;
  background-color: #2b0080;  
  position: relative;
  width: 100%;
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
    float: left;
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
    margin-right: 25%;
    margin-left: 25%;  
        text-align: center;
        border-width:5px;
border-style:solid;
border-color:goldenrod;
background: white;
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
        td {
    padding-right: 50px;
}


#category {
    flex-grow: 2;
}   
       

</style>
     <div id="navbox">
<div class="navbar" id="myNavbar">
      <a href="GatorHome.php" id="main"> GatorHealth </a>
          
 <a href="GatorMap.php"><i class="fa fa-compass"></i> Map</a>
  <a href="GatorPharmacy.html" class="active"><i class="fa fa-medkit"></i> Pharmacy</a>
  <a href="GatorResources.html" ><i class="fa fa-book"></i> Resources</a>
  <a href="GatorSearch.php"><i class="fa fa-search"></i> Search</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div> 
</head>
         
<body>
<div class="searchbox">
    <form method="post">
  
    <input type="text"  id="category" name="query" value='<?php echo $search_val; ?>' placeholder="  Search..">
     <button type="submit" >Search</button>  
  

  
</form>
    </div>
    <table class="center">
  <tr>
    <td>
    
    <div id="results"  >
        <div class="results" >
         <?php if (empty($_POST['query'])) { ?>
            <script>
                document.getElementById('results').style.display = 'none';
               // document.getElementById('rs').style.display = 'none';
            </script>
        <?php } else { ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
             $(document).ready(function(){
    $("button").click(function(){
        document.getElementById('results').show(1000);
    });
});

            </script>
              <?php } ?>

        <?php
        /**
         * This PHP script is in charge of populating the results div when a string in the search bar matches a text
         * in the database.
         */
        if (isset($_POST['query']) && $_POST['query'] != null and $_POST['query'] != "") {
            // $_POST request was successful
            $search_var = mysqli_real_escape_string($data->get_connection(), $_POST['query']); // scape quotes from str in search
            $query = "SELECT * FROM results WHERE CONCAT(category, '', text, '') LIKE '%$search_var%'";
            $fields = $data->select($query);
            if ($fields)
            {
                while ($attribute = $fields->fetch_assoc())
                {
                    // show results in trending div
                    
                    echo '<h1>Results</h1>';

                    $category = $attribute['category'];
                    $true_category = mysqli_real_escape_string($data->get_connection(), $category);
                    $text = $attribute['text'];
                    echo $category . '<br>'; // show category field data
                    echo $text . '<br>'; // show text field data
                    echo '<br>';
                    echo '<p>Disclaimer: Our searchbar is populated with data from our database. The information reflected is currently accurate but subject to change. Thanks for testing!</p>';
                    
                    $table = "hot";
                    $field = "count";
                    $where_field = "category";
                    // if the category searched exist in the hot table, update counter (old_value + 1). Otherwise,
                    // insert the category and add 1 to the counter
                    if (!$data->update_increment($table, $field, $where_field, $true_category)) {
                        $data->insert("hot", ['category', 'count'], [$true_category, 1]);
                    }


                }
            }
 else{
    echo '<h1>No Results</h1>'; 
      echo '<p>Disclaimer: Our searchbar is populated with data from our database. Please try again. Thanks for testing!</p>';
 }
        }
        
        ?>
        </div>
        <style>     table.center {
    margin-left:auto; 
    margin-right:auto;
  }</style>
    </div>
      <td></td>
    <td><div class="trending">
    <font size="5" style="color: #000;">Trending</font>
    <div class="trends">

        <?$trends = "SELECT category FROM hot ORDER BY count DESC LIMIT 9";
    $results = $data->select($trends);
        if ($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                echo $row["category"]."<br>";
            }
        }?>

    </div>
</div>   
</td>
  </tr>
</table>
 

<script>
    function myFunction() {
        var x = document.getElementById("myNavbar");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }





</script>
    
</body>


</html>