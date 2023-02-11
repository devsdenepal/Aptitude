<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] != "true"){
header("location:login.php");
}			?>
<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
   
    $sql = "INSERT INTO `aptitude`.`teachers` (`LastName`, `FirstName`, `Age`) VALUES ('$lastname', '$name', '$age')";
    if($con->query($sql) == true){
        echo "Successfully inserted";}
        $con->close();
    }
else{
    echo '<script>alert("failed")</script>';
}
?>