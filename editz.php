<div class="main">
    <?php
// Initialize the session
session_start();
error_reporting(E_ERROR | E_PARSE);
$usr = $_SESSION['username'];

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    echo  '<button class="w3-button  w3-silver w3-right" onclick="showProfile()"><image src="profile.png" class="w3-round-xxlarge" ></image>' . $usr . '</button>' ;

}
else{
    echo '<script>window.location.href="login.php"</script>';
}


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
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Taking all 5 values from the form data(input)
		$first_name = $_POST['LastName'];
		$last_name = $_POST['FirstName'];
		$age = $_POST['age'];
		$subject = $_POST['subject'];
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO teachers (LastName, FirstName, subject, age) VALUES ('$first_name',
			'$last_name','$subject','$age')";
                header(location:'http://localhost/Online%20Schooling/main/');
		
		if(mysqli_query($conn, $sql)){
			echo "<div id='notify'><h6>data stored in a database successfully." . " Please browse your localhost php my admin". " to view the updated data</h6></div>";

			echo nl2br("\n$first_name\n $last_name\n "
				. "$age");
		} }else{
			echo "<div id='notify' style='text-align:center;'>Update database $sql.</div> "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
	

?>

<form method="post" action="">
&nbsp;nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F.Name<input name="FirstName"/><br/>L.Name:<input name="LastName" /><br/>Subject:<input name="subject"/><br/>Age:<input name="age"/><br/><input type="submit"/></form>
<iframe src="teachers.php" width=70% id="teachers" class="iframe"></iframe>
    </div>
    