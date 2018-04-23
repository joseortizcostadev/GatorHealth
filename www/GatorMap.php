<?php
/* Uncomment the next three lines to check errors only */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// include the database connection and the database data classes
include_once dirname(__FILE__) . '/Database/DBData.php';
$data = new DBData(); // creates an object of class DBData
$query = "SELECT r_name, location, hyperlink FROM GatorMap";
$results = $data->select($query); 

$h = array();


while($field = $results->fetch_assoc())
{   
    switch ($field['location']) {
            
    case "Psychology Building":
        $a[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Thorton Hall":
        $b[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Hensil Hall":
       $c[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Science Building":
        $d[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Business Building":
        $e[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "HSS Building":
        $f[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Admission Building":
       $g[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Cesar Chavez Student Center":
       $h[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);  
    case "J. Paul Leonard Library":
       $i[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Burk Hall":
        $j[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Student Services Building":
       $k[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Student Health Center":
        $l[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Fine Arts Building":
       $m[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Creative Arts Building":
        $n[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
    case "Humanities Building":
        $o[] =  array('hyper' => $field['hyperlink'],'name' => $field['r_name']);
}
    
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
          <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<style>
body {
    margin:0;
    min-height: 100%;
    background: grey;
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
  .navbar a:not(:first-child) {display: none;}
  .navbar a.icon {
    float: right;
    display: block;
  }
}
    .img-fluid{
    width: 100%;
    height: 90px;
    position:absolute;
    
}
    #wrapper {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
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
    #map {
        height: 94%;
        resize: vertical;
        width: 100%;
      position:absolute;
      text-align:center;
       }
</style>
</head>
<body onload = "locate()">

 <div id="map"></div>


<div class="navbar" id="myNavbar">
  <a href="GatorHome.php">Home</a>
  <a href="GatorMap.php">Map</a>
  <a href="GatorPharmacy.html">Pharmacy</a>
  <a href="GatorResources.html">Resources</a>
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
          content:'<img src="ethnic_psych.jpg"> <h1>Psychology Building</h1>
            <?php                       
            foreach($a as $item)                      
            {                                                  
                echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';            
            }                
            ?>'
        },
        {
          coords:{lat:37.72385, lng: -122.47692},
          content:'<img src="thorton.jpg"> <h1>Thorton Hall</h1>
            <?php                       
            foreach($b as $item)                      
            {                                                  
                echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';            
            }                
            ?>'
        },
        {
          coords:{lat: 37.72355, lng: -122.47611},
            content:'<img src="hensil.jpg"> <h1>Hensil Hall</h1>
            <?php                       
            foreach($c as $item)                      
            {                                                  
                echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';            
            }                
            ?>'
        },
          {
             coords:{lat: 37.72296, lng: -122.47616},
          content:'<img src="science building.jpg"> <h1>Science Building</h1>
              <?php                       
              foreach($d as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72207, lng: -122.47672},
          content:'<img src="business.jpg"> <h1>Business Building</h1>
              <?php                       
              foreach($e as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72202, lng: -122.47602},
          content:'<img src="hss.jpeg"> <h1>HSS Building</h1>
              <?php                       
              foreach($f as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72127, lng: -122.47666},
          content:'<img src="admission.jpg"> <h1>Admission Building</h1>
              <?php                       
                  foreach($g as $item)                      
                  {                                                  
                      echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
                  }                
                  ?>'  
          },
          {
             coords:{lat: 37.72232, lng: -122.47861},
          content:'<img src="Cesar Chavez.jpg"> <h1>Cesar Chavez Student Center</h1>
              <?php 
                     foreach($h as $item)
                     {
                       
                         echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';
                     }
               ?>'
          },
          {
             coords:{lat: 37.72134, lng: -122.47816},
          content:'<img src="library.jpg"> <h1>J. Paul Leonard Library</h1>
              <?php                       
              foreach($i as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72303, lng: -122.47948},
          content:'<img src="burk.jpg"> <h1>Burk Hall</h1>
              <?php                       
              foreach($j as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.7234, lng: -122.48074},
          content:'<img src="student services.jpg"> <h1>Student Services Building</h1>
              <?php                       
              foreach($k as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72334, lng: -122.47989},
          content:'<img src="student health center.jpeg"> <h1>Student Health Center</h1>
              <?php                       
              foreach($l as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72223, lng: -122.47983},
          content:'<img src="fine arts.jpg"> <h1>Fine Arts Building</h1>
              <?php                       
              foreach($m as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72148, lng: -122.47985},
          content:'<img src="creative arts.jpg"> <h1>Creative Arts Building</h1>
              <?php                       
              foreach($n as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
          },
          {
             coords:{lat: 37.72243, lng: -122.48097},
          content:'<img src="humanities.jpg"> <h1>Humanities Building</h1>
              <?php                       
              foreach($o as $item)                      
              {                                                  
                  echo '<a href="' . $item["hyper"] . '">' . $item["name"] . '</a></br>';          
              }                
              ?>' 
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
