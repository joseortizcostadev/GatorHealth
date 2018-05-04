<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
        margin-left: auto;
    margin-right: auto;
    }
/* Style the tab */
div.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #2b0080;
    width: 20%;
    height: 100%;
    margin-bottom: 300px;}

/* Style the buttons inside the tab */
div.tab button {
    display: block;
    background-color: inherit;
    color: white;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
div.tab button.active {
    background-color: #1e0059;
}

/* Style the tab content */


* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 80%;
   /* border-left: none;*/
    height: 100%;
    padding-bottom: 20px;
    }
.img-fluid {
    width: 100%;
    height: 90px;
}
    #wrapper {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
    }
    
    th
    {
        text-align: left
    }
body {margin:0;
    background:#ABAAD4;}
.w3-btn {width:150px;}
.navbar {
  overflow: hidden;
  background-color: #2b0080;  
  position: fixed;
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
    font-family: "Lato", sans-serif;
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


    .icons{ bottom: 10;}
    
    .panicindisco{
        width:400px;
        height:300px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        z-index: 1;
    }
    
   
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
<br>

<body class="undernav">
<br>
<div class="marginal-screen">
<div id="wrapper" class="btn-group" role="group" aria-label="Basic example">

    </div>
    <br>
    <div class="container">
  <div class="row">
    <div class="col-sm-4 user one center-block" rotate="90">
    </div>

        </div>
    </div>

    <div class="textarea" >Welcome! Today is <p id="date"></p>
        <p>GatorHealth promotes the information of many health and wellness resources that are offered by San Francisco State University.</p> 
        <br>
       
        <h4>Understanding Social Determinants of Health</h4>
        <div style="padding: 10px;">
        <i>"Social determinants of health are conditions in the environments in which people are born, live, learn, work, play, worship, and age that affect a wide range of health, functioning, and quality-of-life outcomes and risks....Resources that enhance quality of life can have a significant influence on population health outcomes. Examples of these resources include safe and affordable housing, access to education, public safety, availability of healthy foods, local emergency/health services, and environments free of life-threatening toxins."</i>  
        </div>
        <p>Click <a href="https://www.healthypeople.gov/2020/topics-objectives/topic/social-determinants-of-health">here</a> to go to find out more about SDOH.</p>
    </div>
    <div>
    <img class="img-responsive" src="home/SDOH.png"alt="sdoh">
        </div>
        <div id="poll" >
<h3>Do you have access to enough resources on San Francisco State University to support your health and wellbeing?</h3>
<form id="poll">
Yes:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>No:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>


    <div style="padding-top: 100px;">
  
    <a href="https://www.facebook.com/sanfranciscostate/" target="_blank">
        <img class = "icons" src="icons/facebook.png"alt="facebook" style="width:50px;height:50px; top: 100 px;"></a>
    <a href="https://www.instagram.com/sanfranciscostate/?hl=en" target="_blank"> 
        <img class = "icons" src="icons/insta.png"alt="instagram" style="width:50px;height:50px; top: 100 px;"></a>
    <a href="https://twitter.com/SFSU?ref_src=twsrc%5Eappleosx%7Ctwcamp%5Esafari%7Ctwgr%5Eprofile" target="_blank"><img class = "icons" src="icons/twitter.png"alt="twitter" style="width:50px;height:50px; top: 100 px;"></a>
    <a href="https://www.youtube.com/user/sanfranciscostate" target="_blank">
        <img class = "icons" src="icons/youtube.png"alt="youtube"style="width:50px;height:50px; top: 100 px;"></a>

    </div>
    




<script>
    src="js/bootstrap.min.js"
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}
document.getElementById("date").innerHTML = Date();

function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","GatorPoll.php?vote="+int,true);
  xmlhttp.send();
}

</script>
    </div>
</body>
</html>
