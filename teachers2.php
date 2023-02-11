<?php
$conn = mysqli_connect("localhost", "root", "", "aptitude");
$result = mysqli_query($conn,"SELECT * FROM teachers");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete teachers data</title>
</head>
<body>
<table>
	<tr>
	<td>Teachers Id</td>
	<td>First Name</td>
	<td>Last Name</td>
	
	<td>Action</td>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
	<td><?php echo $row["Slno"]; ?></td>
	<td><?php echo $row["FirstName"]; ?></td>
	<td><?php echo $row["LastName"]; ?></td>
	
	<td><a href="delete.php?Slno=<?php echo $row["Slno"]; ?>">Delete</a></td>
	</tr>
	<?php
	$i++;
	}
	?>
</table>
</body>
</html>