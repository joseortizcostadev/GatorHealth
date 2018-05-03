<?php

// THIS IS A CONFIGURATION FILE. PLEASE, DON'T PUSH THIS FILE IF YOU NEED TO PUT A REAL PASSWORD IN CONSTANT DB_PASSWORD. ALWAYS KEEP A LOCAL VERSION OF THIS FILE


define("DB_HOST", "us-cdbr-iron-east-05.cleardb.net");

define("DB_USERNAME", "bf48fc0eb2a147");
define("DB_PASSWORD", "e70aefba");
define("DATABASE", "heroku_52f0756112bfcf9");


//mysqli_connect(DB_HOST , DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE) or die("Connection error to database:  ".mysqli_error());
// mysqli_connect("localhost", "root", "YES") or die("Connection error to database:  ".mysqli_error());

//mysqli_select_db("searchResults") or die(mysqli_error());

//$con = mysqli_connect("127.0.0.1","root","pass","your_database");
/* solution for fatal error from https://stackoverflow.com/questions/10615436/fatal-error-call-to-undefined-function-mysql-connect */
?>