<link rel="shortcut icon" href="logo.ico">
<?php
// Initialize the session
session_start();
error_reporting(E_ERROR | E_PARSE);
$usr = $_SESSION['username'];
$id = $_SESSION['id'];


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo  '<button class="w3-button  w3-silver w3-right"><image src="https://www.w3schools.com/images/mypagelogo32x32.png" class="w3-round-xxlarge" onclick="showProfile()"></image>' . $usr . '</button>' ;

}
else{
    echo '<script>window.location.href="login.php"</script>';
    
}

// Include config file
require_once "config.php";
?>
<h1 class="heading"> Gautam Community </h1>
<hr/>
<script>
function showProfile(){
 window.location.href="profile.php";
}
</script>
<!DOCTYPE html>
<html lang="en">
<title>Profile || Gautam Community</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" href="//localhost/AI Assistant/logo.ico">
<style>
h1{
text-align:center;
animation-name: welcome;
animation-duration: 2s;
color:green;
}

@keyframes welcome {
  from {color: green;}
  to {color: blue;}
}
body{
background-color: #38444d;
color: white;
}
</style>
<body>
<button class="w3-button  w3-teal w3-round-xxlarge" onclick="window.location.href='search.php'"><i class="fa-brands fa-searchengin"></i>Search</button>
<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
<div class="w3-container" id="main">
  <h2>Profile</h2>

  <div class="w3-card-4" style="width:70%">
    <header class="w3-container w3-light-grey">
      <?php echo '<h3>' . $usr . '</h3>' ;?>
    </header>
    <div class="w3-container">
      
      <hr>
      <img src="https://www.w3schools.com/w3css/img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      User ID:<?php echo $id;?> is a member and a registered user of Gautam Community , who is allowed to explore all the pages with his/her choice. We thank him for using our web service.</p><br>
     <button class="w3-button  w3-blue w3-round-xxlarge" onclick="window.location.href='user_list.php'"><i class="fa-solid fa-users-line"></i> explore community...</button>
<br/><br/></div>
    <button class="w3-button w3-block w3-green" onclick="window.location.href='logout.php'"><i class="w3-center w3-button fa-solid fa-arrow-right-from-bracket">Log Out </i></button>
  </div>
</div>

</body>
</html>
