<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] != "true"){
header("location:login.php");
}			?>
<style>
	@import url("update_students.css");
	@import url("boss.css");
</style>
<?php
// including the database connection file
$conn = mysqli_connect("localhost", "root", "", "aptitude");

//getting Slno from url
$Slno = $_GET['Slno'];

//selecting data associated with this particular Slno
$result = mysqli_query($conn, "SELECT * FROM students WHERE Slno=$Slno");

while($res = mysqli_fetch_array($result))
{
	$FirstName = $res['FirstName'];
	$age = $res['Age'];
	$LastName = $res['LastName'];
        $Class = $res['Class'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<span class="back"><a href="teachers.php"><i class="fa-solid fa-arrow-left"></i></span>back</a>
	<br><br>
	<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
	<form FirstName="form1" method="POST" action="proceed_students.php">
		<header><h1>Editing P/O <?php echo $FirstName;?></h1><hr class="blue"/></header>
	<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="FirstName" value="<?php echo $FirstName;?>"></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
		<tr> 
				<td>LastName</td>
				<td><input type="text" name="LastName" value="<?php echo $LastName;?>"></td>
			</tr><tr> 
				<td>Class </td>
				<td><input type="text" name="Class" value="<?php echo $Class;?>"></td>
			</tr>
			<tr>
				<td><button type="submit" style="cursor:pointer;color:white;background-color:green;width:640px;border-radius:5px;height:42px;"id="sbmt" class="fillcenter seto "> Update</button></td>
			</tr>
		</table>
		<div class="seto fillblue round2 center" onclick="this.stop()" onclick="this.start()">Notice: You are editing the profile of <?php echo $FirstName. " ". $LastName. " studying in class ". $Class. " having id ". $Slno?></div>
	</form>

</body>
</html>