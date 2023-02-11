<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] != "true"){
header("location:login.php");
}			?>
<style>
body{
color:black;
background-image: url("wbg.png");
font-family: 'M PLUS Rounded 1c', sans-serif;
}
input{
border-color: blue;
border-radius:5px;
width: max-content;
height: 50px;
}
input:hover{
background-color:blue;
color:white;
}
button:hover{
background-color:white;
color:green;
}

@import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap');
</style>
<?php
// including the database connection file
$conn = mysqli_connect("localhost", "root", "", "aptitude");

//getting Slno from url
$Slno = $_GET['Slno'];

//selecting data associated with this particular Slno
$result = mysqli_query($conn, "SELECT * FROM teachers WHERE Slno=$Slno");

while($res = mysqli_fetch_array($result))
{
	$FirstName = $res['FirstName'];
	$age = $res['Age'];
	$LastName = $res['LastName'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="teachers.php">Home</a>
	<br><br>
	
	<form FirstName="form1" method="POST" action="proceed.php">
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
			</tr>
			<tr>
				<td><input type="number" name="Slno" value=<?php echo $_GET['Slno'];?>></td>
				<br/><td><button type="submit" style="cursor:pointer;color:white;background-color:green;width:640px;border-radius:5px;height:42px;"id="sbmt"> Update</button></td>
			</tr>
		</table>
	</form>

</body>
</html>