<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback || Aptitude</title>
    <link rel="shortcut icon" href="http://localhost/EGPEHS/logo.ico"><link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="dashboard.css"/>

</head>
<body>
    <script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
<script>
function showProfile() {
 window.location.href="profile.php";
}
</script>
<div class="sidenav">
<img src="http://localhost/EGPEHS/logo.ico"style="width:50%;justify-item:center">
  <a href="dashboard.html"><i class="fa-solid fa-bars-progress"></i> Dashboard</a>
  <a onclick="location.replace('index.php')"><i class="fa-solid fa-users-line"></i> Staff Data</a>
<a onclick='location.replace("students.php")'><i class="fa-solid fa-users-line"></i> Student Data</a>
  <a onclick='location.replace("You.html")'><i class="fa-solid fa-user"></i>You</a>
  <a id="hovered"> <i class="fa-solid fa-flag"></i> Feedback</a>
    <a  onclick='location.replace("notification.php")'> <i class="fa-solid fa-bell"></i> Notifications </a>
</div>
<div class="main" id="main">
	<div class="chalk card">Notification</div>
<?php
// Initialize the session



		// servername => localhost
		// username => root
		// password => empty
		// database name =>  
		$conn = mysqli_connect("localhost", "root", "", "aptitude");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		if (!empty($_SERVER['REQUEST_METHOD'] === 'POST')) {
		// Taking all 5 values from the form data(input)
		$mail = $_POST['email'];
		$subject = $_POST['subject'];
		$detail = $_POST['detail'];
		
                
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO reports (mail, subject, detail) VALUES ('$mail',
			'$subject','$detail')";
                header("location:http://localhost/Aptitude/main/");
		
		if(mysqli_query($conn, $sql)){
			echo "<div id='notify'><h6>data stored in a database successfully." . " Please browse your localhost php my admin". " to view the updated data</h6></div>";

			echo nl2br("\n$first_name\n $last_name\n "
				. "$age");
      
		} 
    
      $last_id = mysqli_insert_id($conn);
      echo "New record created successfully. Last inserted ID is: " . $last_id;
    
  }else{
      $last_id = mysqli_insert_id($conn);
			echo "<div id='notify' style='text-align:center;'><u>Feedback || Reports</u></div> "
				. mysqli_error($conn);
		}
		
		// Close connection
		
	
        
?>
    <form method="POST" action="">
        Your mail :<input type="email" name="email" required/><br/> Subject: <input type="text" name="subject" required/><br/> Detail : <input type="text" name="detail"/><button type="submit">Send</button>
    </form>
   
	<?php
    $result = mysqli_query($conn,"SELECT * FROM reports");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <div class="card round2 helvetica black" style="height:30%"><span style="color:navy"><?php echo $row["mail"]; ?>  </span>
	 <strong> <?php echo $row["subject"]; ?></strong>
	: <?php echo $row["detail"]; ?></div>
	
	</tr>
	<?php
	$i++;
	}
	mysqli_close($conn);?>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <div class="card round center"><h4 class="black">Powered by <span class="blue helvetica">Aptitude</span></h4> <a href="dashboard.html">About ust</a></div>