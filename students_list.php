<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] != "true"){
header("location:login.php");
}			?>
<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script><link rel="stylesheet" href="main.css"/>
<!DOCTYPE html>
<html>
    <style>
		#content{
			visibility: hidden;
		}
a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  font-family: 'Source Sans Pro', sans-serif;
}
table {
  border-collapse: collapse;
  width: 100%;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
button{
border-radius:12px;
border:none;
}
</style>
<?php
$conn = mysqli_connect("localhost", "root", "", "aptitude");
$result = mysqli_query($conn,"SELECT * FROM students");
$result2 = mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete students data</title>
</head>
<body>

 
<form action="search_students.php" method="get" style="display:block;">
<input name="search" type="search" id="search" placeholder="search by name..."></input><button type="submit" class="go seto" style="background-color: blue;width:fit-content;height:fit-content;text-align:left">Go</button></form>

<table>
	<tr>
	<td>Student's Id</td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Age</td>
        <td>Class studying</td>
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
	<td><?php echo $row["Age"]; ?></td>
        <td><?php echo $row["Class"]; ?></td>
	<td><button style="color:white;background-color:blue;"><a href="update_students.php?Slno=<?php echo $row["Slno"]; ?>" ><i class="fa-solid fa-pen"></i> edit</a></button>
	</a><button style="color:white;background-color:#DC143C;"><a href="delete_students.php?Slno=<?php echo $row["Slno"]; ?>" ><i class="fa-solid fa-trash"></i> delete</a></button>
	</a></tr></td>
	<?php
	$i++;
	}
	?>
</table>
<button id="cmd" style="color:white;background-color:red;">Print as PDF</button>
<div id="content">

<h3 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EverGreen Pacific English High School</h3>
  <h4 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mayadevi-7,HatiBangai</h3>
	<h5>Student Data </h5>
 <?php
	$j=0;
	while($row2 = mysqli_fetch_array($result2)) {
	?>
--------------------------------------------------------------------------------------------------------------------
<b>|Serial:</b>	<u><?php echo $row2["Slno"]; ?></u> |
<b>FirstName:</b>	<u><?php echo $row2["FirstName"]; ?></u> |
<b>LastName:</b>	<u><?php echo $row2["LastName"]; ?></u> |
<b>Age:</b><u><?php echo $row2["Age"]; ?></u> |
<b>Subjects:</b> <u><?php echo $row2["Subject"]; ?></u> |
--------------------------------------------------------------------------------------------------------------------


	<?php
	$j++;
	}
	?><h6>Produced using Aptitude</h6>
</div>
<div id="editor"></div>

<!--Add External Libraries - JQuery and jspdf 
check out url - https://scotch.io/@nagasaiaytha/generate-pdf-from-html-using-jquery-and-jspdf
-->
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {   
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
            
    });
    
    doc.save('Students_EGPEHS.pdf');
});


</script>
</body>
</html>
</body>
</html>