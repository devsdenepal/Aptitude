<!-- Created by GautamKumar -->
<?php
session_start();
if($_SESSION["loggedin"] = "true"){
  $user= $_SESSION["user"];
  echo"<h2>". $user . "</h2><p> <script>document.write(platform)</script></p><p id='Details'></p>";
  $conn = mysqli_connect("localhost", "root", "", "aptitude");
  $result = mysqli_query($conn,"SELECT * FROM `logins`;");
}
?>
<title> DBMS || EGPEHS</title>
<link rel="shortcut icon" href="http://localhost/EGPEHS/logo.ico"><link rel="stylesheet" href="index.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Radio+Canada&family=Source+Sans+Pro:wght@400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Radio+Canada&display=swap');
  body {
    font-family: Helvetica, sans-serif;
   
  }
  button {
  background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    
    
    width: 280px;
  }
  button[type=submit]{
    background-color: green;
  
  }
  button[type=reset]{
    background-color: blue;
  }
  button:hover{
    opacity:1;
  }
  
  .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:  white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    overflow-x: hidden;
    padding-top: 20px;
  }
  
  .sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    font-family: 'Source Sans Pro', sans-serif;
  }
  
  .sidenav a:hover {
    
    background-color: grey;
  }
  .sidenav #hovered {
    
    background-color: grey;
  }
  
  #popup {
    display: none; /* Hidden by default */
    position: absolute; /* Stay in place */
    z-index: 1; /* Sit on top */
    
    padding-top: 100px; /* Location of the box */
    left:auto;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  /* Modal Content */
  .popup-content {
    background-color: #fefefe;
    margin: center;
    padding: 20px;
    border: 1px solid #888;
    height: 70%;
    font-family: Helvetica, sans-serif;
  }
  .close {
    color: #aaaaaa;
    float: center;
    font-size: 28px;
    font-weight: bold;
  }
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  
  iframe {
    position: relative;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    /* height: 100%; */
    border: none;
    border: none;
  }
  .iframe {
    position: relative;
    top: 0;
    left: 10%;
    bottom: 0;
    right: 0;
    width: 100%;
    height: auto;
    border: none;
    font-family: 'Radio Canada', sans-serif;
  }
  .reveal{
  display : block;
  }
  .main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
  /*
    width: 100%;
    height:100%
  */
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  
  .material-symbols-outlined {
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 48
  }
  
  p{
  font-size: 15px;
  color:green;
  }
  h1,h2,p{
    text-align:center;align-items:center";
  }
  a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  font-family: 'Source Sans Pro', sans-serif;
}
table {
  border-collapse: collapse;
  width: 50%;
  position:relative;
  left: 20%;
  
}
body {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
h1,h2,h3,h4,h5,h6 {
  font-family: inherit;
  font-weight: 500;
  line-height: 1.1;
  color: inherit;
}
tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
button{
border-radius:12px;
border:none;
}
input {
  line-height: normal;
}
input[type="checkbox"],
input[type="radio"] {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 0;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}
input[type="search"] {
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
  -webkit-appearance: textfield;
}
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}
table {
  border-spacing: 0;
  border-collapse: collapse;
}
td,
th {
  padding: 0;
}
  </style>
 
<table>
	<tr>
  <td>Who</td>
	<td>When</td>
  <td>IP used</td>
  <td>Net Location</td>
	</tr>
    <?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <br />
    <td><?php echo $row["admins"]; ?></td>
        <td><?php echo $row["on"]; ?></td>
        <td><?php echo $row["ip"]; ?></td>
        <td><?php echo $row["Location"]; ?></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
<!-- <script>

const x = document.getElementById("Details");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML += "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML += "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
getLocation();
</script> -->
<script>
   let platform = navigator.userAgent;
</script><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div
id="Login_Chart" style="width:60%; max-width:500px; height:500px;cursor:pointer">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Country', 'Mhl'],
  ['Left Logins',<?php echo 100-$i?>],
  ['Total Logins',<?php echo $i ?>],

  
]);

var options = {
  title:'Login Quota',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('Login_Chart'));
  chart.draw(data, options);
}
</script>
<footer class="card round iframe">Powered by <span class="aqua">Aptitude</span></footer>