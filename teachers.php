<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script><link rel="stylesheet" href="main.css"/>
<!DOCTYPE html>
<html>
    <style>
      #content{
        visibility:hidden;
      }
/* a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  font-family: 'Source Sans Pro', sans-serif;
} */
table {
  border-collapse: collapse;
  width: 80%;
  height:fit-content;
}
img{
height:10%;
margin:center;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td, #customers th {
  border: 1px solid #ddd;
  padding: 2px;
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
input{
    /* border-color: black; */
    /* border-radius:12px; */
    display:flex;
    }
	.input{
  
  font-size: 17px;
  border:  solid grey;
  float: left;
  width: fit-content;
  background: #f1f1f1;
}
input{
  
  font-size: 17px;

  
  width: fit-content;
  background: #f1f1f1;
}
    input:hover{
 
opacity:1;
    }
    @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap');
    
	button{
/* border-radius:12px; */
border:none;
width:fit-content;
height:fit-content;
}
.go{
    background-color: grey;
}
/* .a{
/*  */
} */
</style>
<?php
$conn = mysqli_connect("localhost", "root", "", "aptitude");
$result = mysqli_query($conn,"SELECT * FROM teachers");
$result2 = mysqli_query($conn,"SELECT * FROM teachers");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Teachers data</title>
</head>
<body>
<form action="search_teachers.php" method="get">
<input name="search" type="search" id="search" placeholder="search by name..."/><span><button type="submit" class=""><i class="fa-brands fa-searchengin"></i></button></span></form>

<table>
	<tr>
    <form method ="get" action="search_teachers.php">
	<td><input type="text" name="name" id="name" placeholder="Teachers Id" disabled></input></form></td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Age</td>
        <td>Subject teaching</td>
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
        <td><?php echo $row["Subject"]; ?></td>
	<td><span><a style="color:blue;" href="update.php?Slno=<?php echo $row["Slno"]; ?>" class="a" ><i class="fa-solid fa-pen"></i></a>
	</a>|<a style="color:#DC143C;"href="delete.php?Slno=<?php echo $row["Slno"]; ?>" class="a"><i class="fa-solid fa-trash"></i></a></span>
	</a></tr></td>
	<?php
	$i++;
	}
	?>
</table>
</div>
<button onclick="window.print()" style="background-color: green;color:white;"><i class="fa-solid fa-print"></i> Print</button>
 
<button id="cmd" style="color:white;background-color:grey;">Save as PDF</button>

<div id="content">
<img src="http://localhost/EGPEHS/logo.ico"></img>
<h3 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EverGreen Pacific English High School</h3>
  <h4 style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mayadevi-7,HatiBangai</h3>
	<h5>Subject:<u>Staff Data</u></h5>
 <?php
	$j=0;
	while($row2 = mysqli_fetch_array($result2)) {
	?>
--------------------------------------------------------------------------------------------------------------------
<b>| Serial:</b>	<u><?php echo $row2["Slno"]; ?></u> |
<b>| FirstName:</b>	<u><?php echo $row2["FirstName"]; ?></u> |
<b>| LastName:</b>	<u><?php echo $row2["LastName"]; ?></u> |
<b>| Age:</b><u><?php echo $row2["Age"]; ?></u> |
<b>| Subjects:</b> <u><?php echo $row2["Subject"]; ?></u> |
--------------------------------------------------------------------------------------------------------------------


	<?php
	$j++;
	}
	?>
  <?php echo "<h6>Produced on " .  date('Y/m/d') .  " using Aptitude</h6>";?>
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
    
    doc.save('Teachers_EGPEHS.pdf');
});


</script>
</body>
</html>