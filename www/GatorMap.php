<?php
/* Uncomment the next three lines to check errors only */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


//include 'mapinfo.php';


//move all this to php file
// include the database connection and the database data classes
include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData
$query = "SELECT r_name, location, hyperlink FROM GatorMap";
$results = $data->select($query);

$a = array();
$b = array();
$c = array();
$d = array();
$e = array();
$f = array();
$g = array();
$h = array();
$i = array();
$j = array();
$k = array();
$l = array();
$m = array();
$n = array();
$o = array();

$deku1 = 0;
$deku2 = 0;
$deku3 = 0;
$deku4 = 0;
$deku5 = 0;
$deku6 = 0;
$deku7 = 0;
$deku8 = 0;
$deku9 = 0;
$deku10 = 0;
$deku11 = 0;
$deku12 = 0;
$deku13 = 0;
$deku14 = 0;
$deku15 = 0;

while($field = $results->fetch_assoc())
{ 

      // end here for copying
    if ($field['location'] =="Psychology Building"){
        $a[$deku1] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku1++;
    }
    else if ($field['location'] == "Thorton Hall"){
        $b[$deku2] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku2++;
}
    else if ($field['location'] == "Hensil Hall"){
       $c[$deku3] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku3++;
}
    else if ($field['location'] == "Science Building"){
        $d[$deku4] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku4++;
}
   else if ($field['location'] == "Business Building"){
        $e[$deku5] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku5++;
}
    else if ($field['location'] == "HSS Building"){
        $f[$deku6] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku6++;
}
    else if ($field['location'] == "Admission Building"){
       $g[$deku7] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku7++;
}
    else if ($field['location'] == "Cesar Chavez Student Center"){
       $h[$deku8] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku8++;
}
    else if ($field['location'] == "J. Paul Leonard Library"){
       $i[$deku9] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku9++;
}
    else if ($field['location'] == "Burk Hall"){
        $j[$deku10] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku10++;
}
   else if ($field['location'] == "Student Services Building"){
       $k[$deku11] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku11++;
}
    else if ($field['location'] == "Student Health Center"){
        $l[$deku12] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku12++;
}
    else if ($field['location'] == "Fine Arts Building"){
       $m[$deku13] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku13++;
}
    else if ($field['location'] == "Creative Arts Building"){
        $n[$deku14] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku14++;
}
    else if ($field['location'] == "Humanities Building"){
        $o[$deku15] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
            $deku15++;
}
}


?>



<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
 
<style>
    #map {
        height: 94%;
        resize: vertical;
        width: 100%;
      position:absolute;
      text-align:center;
       }
body {margin:0;}
.w3-btn {width:150px;}
.navbar {
  overflow: hidden;
  background-color: #2b0080;  
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 5px 40px;
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
<<<<<<< HEAD
.img-fluid{ 
max-width: 8%; }
    .gatorpic{
        width: 8%;
        height: 8%;
    }
=======
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
            padding-top: 200px;
            padding-bottom: 200px;
        }
>>>>>>> e26bea3abc824ae8da33c36209e43a4cefd3b367
</style>
</head>
<body onload = "locate()" class="undernav">

 <div id="map"></div>


<div class="navbar" id="myNavbar">
      <a href="GatorHome.php"> <img src="gatorRon.png"  alt="Responsive image" class="gatorpic">GatorHealth </a>
          
  <a href="GatorMap.php" class="active">Map</a>
  <a href="GatorPharmacy.html">Pharmacy</a>
  <a href="GatorResources.html" >Resources</a>
  <a href="GatorSearch.php">Search</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
            var glblmap = null;
            var glblmarker = null;
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
    var im = 'http://www.robotwoods.com/dev/misc/bluecircle.png';
    
    function locate(){
        navigator.geolocation.getCurrentPosition(initialize,fail);
    }

    function initialize(position) {
        var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
        map.setCenter(pos);
        
        
        var userMarker = new google.maps.Marker({
            position: pos,
            map: map,
            icon: im
        });
      }

     function fail(){
         alert('navigator.geolocation failed, may not be supported');
     }
    
    
    var map, infoWindow;
    
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 37.7223889, lng: -122.4791221},
          zoom: 18
        });
          infoWindow = new google.maps.InfoWindow;
          
          
          
          if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        }
    

      
      var markers = [

        {
          coords:{lat: 37.72355, lng: -122.47924},
          content:'<img src="ethnic_psych.jpg"> <h1>Psychology Building</h1><?php
            if (!empty($a)){
                $tempo1= 0;
            while ($tempo1 < count($a) ){
                
                echo '<a href="' . $a[$tempo1]["hyper"] . '">' . $a[$tempo1]["name"] . '</a></br>';
                $tempo1++;
            }
            }
            ?>'
            // add new variable that sets location remove below php
            //var loci = 1;   
        },
        {
          coords:{lat:37.72385, lng: -122.47692},
          content:'<img src="thorton.JPG"> <h1>Thorton Hall</h1><?php
            if (!empty($b)){
                $tempo2= 0;
            while ($tempo2 < count($b) ){
                
                echo '<a href="' . $b[$tempo2]["hyper"] . '">' . $b[$tempo2]["name"] . '</a></br>';
                $tempo2++;
            }
            }
            ?>'
           // var loci = 2;
        },
        {
          coords:{lat: 37.72355, lng: -122.47611},
            content:'<img src="hensil.JPG"> <h1>Hensil Hall</h1><?php
            if (!empty($c)){
                $tempo3= 0;
            while ($tempo3 < count($c) ){
                
                echo '<a href="' . $c[$tempo3]["hyper"] . '">' . $c[$tempo3]["name"] . '</a></br>';
                $tempo3++;
            }
            }
            ?>'
           // var loci = 3;
        },
          {
             coords:{lat: 37.72296, lng: -122.47616},
          content:'<img src="science building.jpg"> <h1>Science Building</h1><?php
            if (!empty($d)){
                $tempo4= 0;
            while ($tempo4 < count($d) ){
                
                echo '<a href="' . $d[$tempo4]["hyper"] . '">' . $d[$tempo4]["name"] . '</a></br>';
                $tempo4++;
            }
            }
            ?>'
             // var loci = 4; 
          },
          {
             coords:{lat: 37.72207, lng: -122.47672},
          content:'<img src="business.jpg"> <h1>Business Building</h1><?php
            if (!empty($e)){
                $tempo5= 0;
            while ($tempo5 < count($e) ){
                
                echo '<a href="' . $e[$tempo5]["hyper"] . '">' . $e[$tempo5]["name"] . '</a></br>';
                $tempo5++;
            }
            }
            ?>'
              //var loci = 5;
          },
          {
             coords:{lat: 37.72202, lng: -122.47602},
          content:'<img src="hss.jpeg"> <h1>HSS Building</h1><?php
            if (!empty($f)){
                $tempo6= 0;
            while ($tempo6 < count($f) ){
                
                echo '<a href="' . $f[$tempo6]["hyper"] . '">' . $f[$tempo6]["name"] . '</a></br>';
                $tempo6++;
            }
            }
            ?>'
             //var loci = 6;
          },
          {
             coords:{lat: 37.72127, lng: -122.47666},
          content:'<img src="admission.jpg"> <h1>Admission Building</h1><?php
            if (!empty($g)){
                $tempo7= 0;
            while ($tempo7 < count($g) ){
                
                echo '<a href="' . $g[$tempo7]["hyper"] . '">' . $g[$tempo7]["name"] . '</a></br>';
                $tempo7++;
            }
            }
            ?>'
              //var loci = 7;
          },
          {
             coords:{lat: 37.72232, lng: -122.47861},
          content:'<img src="Cesar Chavez.jpg"> <h1>Cesar Chavez Student Center</h1><?php
            if (!empty($h)){
                $tempo8= 0;
            while ($tempo8 < count($h) ){
                
                echo '<a href="' . $h[$tempo8]["hyper"] . '">' . $h[$tempo8]["name"] . '</a></br>';
                $tempo8++;
            }
            }
            ?>'
              //var loci = 8;
          },
          {
             coords:{lat: 37.72134, lng: -122.47816},
          content:'<img src="library.jpg"> <h1>J. Paul Leonard Library</h1><?php
            if (!empty($i)){
                $tempo9= 0;
            while ($tempo9 < count($i) ){
                
                echo '<a href="' . $i[$tempo9]["hyper"] . '">' . $i[$tempo9]["name"] . '</a></br>';
                $tempo9++;
            }
            }
            ?>'
              //var loci = 9;
          },
          {
             coords:{lat: 37.72303, lng: -122.47948},
          content:'<img src="burk.jpg"> <h1>Burk Hall</h1><?php
            if (!empty($j)){
                $tempo10= 0;
            while ($tempo10 < count($j) ){
                
                echo '<a href="' . $j[$tempo10]["hyper"] . '">' . $j[$tempo10]["name"] . '</a></br>';
                $tempo10++;
            }
            }
            ?>'
              //var loci = 10; 
          },
          {
             coords:{lat: 37.7234, lng: -122.48074},
          content:'<img src="student services.jpg"> <h1>Student Services Building</h1><?php
            if (!empty($k)){
                $tempo11= 0;
            while ($tempo11 < count($k) ){
                
                echo '<a href="' . $k[$tempo11]["hyper"] . '">' . $k[$tempo11]["name"] . '</a></br>';
                $tempo11++;
            }
            }
            ?>'
              //var loci = 11;                     
     
          },
          {
             coords:{lat: 37.72334, lng: -122.47989},
          content:'<img src="student health center.jpeg"> <h1>Student Health Center</h1><?php
            if (!empty($l)){
                $tempo12= 0;
            while ($tempo12 < count($l) ){
                
                echo '<a href="' . $l[$tempo12]["hyper"] . '">' . $l[$tempo12]["name"] . '</a></br>';
                $tempo12++;
            }
            }
            ?>'
              //var loci = 12;
          },
          {
             coords:{lat: 37.72223, lng: -122.47983},
          content:'<img src="fine arts.jpg"> <h1>Fine Arts Building</h1><?php
            if (!empty($m)){
                $tempo13= 0;
            while ($tempo13 < count($m) ){
                
                echo '<a href="' . $m[$tempo13]["hyper"] . '">' . $m[$tempo13]["name"] . '</a></br>';
                $tempo13++;
            }
            }
            ?>'
              //var loci = 13;
          },
          {
             coords:{lat: 37.72148, lng: -122.47985},
          content:'<img src="creative arts.jpg"> <h1>Creative Arts Building</h1><?php
            if (!empty($n)){
                $tempo14= 0;
            while ($tempo14 < count($n) ){
                
                echo '<a href="' . $n[$tempo14]["hyper"] . '">' . $n[$tempo14]["name"] . '</a></br>';
                $tempo14++;
            }
            }
            ?>'
              //var loci = 14;
          },
          {
             coords:{lat: 37.72243, lng: -122.48097},
          content:'<img src="humanities.jpg"> <h1>Humanities Building</h1><?php
            if (!empty($o)){
                $tempo15= 0;
            while ($tempo15 < count($o) ){
                
                echo '<a href="' . $o[$tempo15]["hyper"] . '">' . $o[$tempo15]["name"] . '</a></br>';
                $tempo15++;
            }
            }
            ?>'
              //var loci = 15;

          }
      ];

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          icon: 'max.png',
        });

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });
            
          
          marker.addListener('click', function(){

              // add ajax code call that uses location variable
            //infoWindow.close(glblmap,glblmarker);
            infoWindow.open(map, marker);
            //glblmarker = marker;
            //glblmap = map;
            
          });
            
        }
      }
      }
         
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEfA42MpPal1HprfTZzkAsqTJEiOnck2Y&callback=initMap">
    </script>
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

