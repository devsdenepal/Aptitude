<?php
$mysqli = mysqli_connect("localhost", "root", "", "aptitude");
if(isset($_POST['update']))
{	

$Slno = mysqli_real_escape_string($mysqli, $_POST['Slno']);
$FirstName = mysqli_real_escape_string($mysqli, $_POST['FirstName']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$LastName = mysqli_real_escape_string($mysqli, $_POST['LastName']);	
if(empty($FirstName) || empty($age) || empty($LastName)) {	
if(empty($FirstName)) {
echo '<font color="red">Name field is empty.</font><br>';
}
if(empty($age)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($LastName)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE teachers SET FirstName='$FirstName',Age='$age',LastName='$LastName' WHERE Slno=$Slno");
header("Location: teachers.php");
}
}
?>