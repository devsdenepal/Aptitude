<?php
// including the database connection file
$conn = mysqli_connect("localhost", "root", "", "aptitude");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$fname=$_POST['FirstName'];
$SlNo=$_POST['Slno'];
$Age=$_POST['age'];
$lname=$_POST['LastName'];
$query="UPDATE teachers SET Slno = '$SlNo' , FirstName = '$fname', Age = '$Age',LastName='$lname' where Slno= '$SlNo'";
$data= mysqli_query($conn,$query);
if($data){
echo "<script>window.location.href='teachers.php'</script>";
}
}
else{
echo '<script>alert("unable to update")</script>';
}
?>