<?php 
$user= $_POST['uname'];
$password=$_POST['psw'];
$ipAddress = gethostbyname('localhost');
?>
<?php
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
if ($query && $query['status'] == 'success') {
$country=$query['country'] ;
$city= $query['city'] ;
$info2=$city.",".$country;
foreach ($query as $data) {
    $info= $data;
}
}
?>
<?php
if($user == "admin_gautam" && $password =="gautamnetwork" || $user == "smartu" && $password =="chhushchhush"){
 // Set session variables
session_start();
$_SESSION["user"] = $user;
$_SESSION["loggedin"] = "true";
$conn = mysqli_connect("localhost", "root", "", "aptitude");
$sql = "INSERT INTO logins (admins,ip,Location) VALUES ('$user', '$info', '$info2')";
$query= mysqli_query($conn,$sql);

echo "Session variables are set.";
    header("location:index.php");

}
else{
    echo "<script>location.replace('login.php')</script>";
}
?>
<script>
    var platform = navigator.userAgent;
</script>