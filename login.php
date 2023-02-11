<link rel="shortcut icon" href="http://localhost/Aptitude/main/Aptitude.ico"><title> login</title>
<?php
session_start();
$client ="Demo School : EGPEHS";
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === "true"){
    echo '<script type="text/javascript"> alert('.$username.')</script>';
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@import url("login.css");
</style>
</head>
<body>
<div class="apt-header-base">
 </div>
 <div class="apt-header">
	<div id="img1" class="apt-header"><img src="http://localhost/Aptitude/main/Aptitude.ico" /></div>

        <p></p></div><br/><br/><br/><br/><br/><br/><div class="animate adbanner  thulo center private green" style="background-image:url('lgn_sld_1.jfif');background-repeat:no-repeat;size:cover;border-left: green;">  Aptitude has brought a new and swift way of managing school database without paying much .</div>
        <div class="down-slide adbanner private thulo center aqua"> Our motto : Cheap price service high.</div>
        <div class="right-slide adbanner thulo center private yellow"> Aptitude School DBMS encompasses various kits that assists front office to  manage brisk records of students,employees and events. </div>
        <div class="right-slide adbanner thulo center private blue">The Aptitude School Database Management System is  secure, reliable software for database Management, which gives a multi times more security than manually stored data.</div>
        <div class="right-slide adbanner thulo center private"><span class="blue">#</span><span class="aqua">Let'sTryAptitudeToday</span>
        </div><div class="card"><div class="container">
<h2>Welcome back to Aptitude !</h2>
<h3> This page is for <?php echo $client; ?></h3>

<p><button onclick="document.getElementById('id01').style.display='block'"  id="ok" class="left">Continue >></button></p>
</div></div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required autocomplete="true">

      <label for="psw"><b>Password</b></label>
      <input type="text" placeholder="Enter Password" name="psw" required autocomplete="true">
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var advertisementSerial = 0;
slide();

function slide() {
  var i;
  var x = document.getElementsByClassName("adbanner");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  advertisementSerial++;
  if (advertisementSerial > x.length) {advertisementSerial= 1} 
  x[advertisementSerial-1].style.display = "block"; 
  setTimeout(slide, 6000); 
}

</script>

</body>
</html>
