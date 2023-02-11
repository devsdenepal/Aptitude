<?php
// including the database connection file
$conn = mysqli_connect("localhost", "root", "", "aptitude");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$fname=$_POST['FirstName'];
// $SlNo=$_POST['Slno'];
$Age=$_POST['age'];
$lname=$_POST['LastName'];
$Class=$_POST['Class'];
$query="UPDATE students FirstName = '$fname', Age = '$Age',LastName='$lname',Class='$Class' where Slno= '$SlNo'";
$data= mysqli_query($conn,$query);
if($data){
header("location: students_list.php");
}
}
else{
echo '<script>alert("unable to update")</script>';
}
?>