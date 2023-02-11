<?php
// Initialize the session
// session_start();

// // Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo ($_SESSION["username"]);
    
    exit;
}
else{
   header("login.php");
}

// // Include config file
// require_once "config.php";
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "<h1>Chotu</h1>";
fwrite($myfile, $txt);
echo readfile("newfile.txt");

?>