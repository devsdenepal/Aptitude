<title>Notification | Aptitude</title><link rel="shortcut icon" href="http://localhost/EGPEHS/logo.ico">
<link rel="stylesheet" href="boss.css"><script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
<div class="sidenav">
<img src="http://localhost/EGPEHS/logo.ico"style="width:50%;justify-item:center">
  <a onclick="location.replace('dashboard.html')"><i class="fa-solid fa-bars-progress"></i> Dashboard</a>
  <a onclick="location.replace('index.php')"><i class="fa-solid fa-users-line"></i> Staff Data</a>
<a onclick='location.replace("students.php")'><i class="fa-solid fa-users-line"></i> Student Data</a>
  <a onclick='location.replace("You.html")'><i class="fa-solid fa-user"></i>You</a>
  <a onclick='location.replace("feedback.php")'> <i class="fa-solid fa-flag"></i> Report </a>
  <a id="hovered"> <i class="fa-solid fa-bell"></i> Notifications </a>
</div>
<div class="main" id="main">
	<div class="fillblue seto card filltop helvetica center thulo header" ><h1>Notifications</h1></div>
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
        $result = mysqli_query($conn,"SELECT * FROM notifications");
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <div class="card  helvetica black" style="height:fit-content;width:80%;">
	 <strong> <?php echo $row["title"]; ?></strong>
	: <?php echo $row["description"]; ?><span style="color:navy;font-size:small;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row["date"]; ?>  </span><hr/></div>
	
	</tr>
	<?php
	
	$i++;
	}
	mysqli_close($conn);?>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <div class="card round center" width=80%><h4 class="black">Powered by <span class="blue helvetica">Aptitude</span></h4> <a href="dashboard.html">About us</a></div>