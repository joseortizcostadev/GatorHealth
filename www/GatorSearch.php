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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jQuery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <style>

        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }

        body {
            margin: 0;
        }

        .navbar {
            overflow: hidden;
            background-color: #2b0080;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
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
            .navbar a:not(:first-child) {
                display: none;
            }

            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                bottom: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }

        }

        .trending {
            background: #f2f2f2;
            border-radius: 10px;
            padding: 15px;
        }

        .trending .trends {
            color: #000;
            padding-left: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<p>Animated search form:</p>


<form method="post">
    <input type="text" name="query" value='<?php echo $search_val; ?>' placeholder="Search.."/>
    <input type="submit" value="Search"/>
</form>
<div class="trending">
    <font size="5" style="color: #000;">Trending</font>
    <div class="trends">

        <?php
        /**
         * This PHP script is in charge of populating the trend div when a string in the search bar matches a text
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
                    echo $attribute['category'] . '<br>'; // show category field data
                    echo $attribute['text'] . '<br>'; // show text field data
                    echo '<br>';
                }
            }
        }

        ?>

    </div>
</div>

<div class="navbar" id="myNavbar">
    <a href="GatorHome.php">Home</a>
    <a href="GatorMap.php">Map</a>
    <a href="GatorPharmacy.html">Pharmacy</a>
    <a href="GatorResources.html">Resources</a>
    <a href="GatorSearch.php" class="active">Search</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


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
