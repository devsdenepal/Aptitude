<style>
    @import url("index.css");
    
input {
  
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 20%;
  background: #f1f1f1;
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
width:fit-content;
height:fit-content;
}
.go{
    background-color: grey;
}
.back{
        background-color: rgb(218, 224, 211);
        border-radius: 5px;
        width:6px;
    }
    .back:hover{
        background-color: rgb(155, 160, 149);
        border-radius: 6px;
        width:6px;
        opacity:1;
    }
    .back a{
        color:green;
        
    }
   .back  a:link:visited{
        color:green;
    }
    input{
    border-color: black;
    border-radius:12px;
    display:flex;
    }
    input:hover{
 
background-color: aquamarine;
    }
    @import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap');
    
   </style>
   <span class="back"><a href="teachers.php"><i class="fa-solid fa-arrow-left"></i>back</a>
   </span>
   <form action="" method="get">
<input name="search" type="search" id="search" placeholder="search by name..."></input><button type="submit" class="go white" style="background-color: blue;width:fit-content;height:fit-content;text-align:left">Go</button></form>
<table>
	<tr>
	<td>Id</td>
	<td>F.Name</td>
	<td>L.Name</td>
	<td>Age</td>
    <td>Subject teaching</td>
	<td>Action</td>
	</tr>
  
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aptitude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query=$_GET['search'];
$sql = "SELECT Slno, FirstName, LastName,  Age, Class FROM students WHERE LastName like'%$query%' or FirstName like'%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td> " . $row["Slno"]. " </td><td>" . $row["FirstName"]. "</td><td>" . $row["LastName"]. "</td><td>" . $row["Age"].  "</td><td>". $row['Class'] . "</td><td>". "<button style='color:white;background-color:blue;'><a href='update_students.php?Slno=". $row['Slno']." '><i class='fa-solid fa-edit'></i> edit</a></button>". "<button style='color:white;background-color:red;'><a href='delete_students.php?Slno=". $row['Slno']." '><i class='fa-solid fa-trash'></i> delete</a></button><br></td></tr>";
  }
  if($_SERVER["REQUEST_METHOD"] !== "GET"){
echo "search something...";
  }
}
 else {
  echo '<div style="color:red;text-align:center;"> no results found...</div>';
}
$conn->close();
?>


<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>