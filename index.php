<!-- Created by GautamKumar -->
<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] == "true"){

}		

 // to get IP address of a host
else{
	header("location:login.php");
}

?>

<script>
function showProfile() {
 window.location.href="profile.php";
}
</script>
<title>loading...</title>
<link rel="shortcut icon" href="http://localhost/EGPEHS/logo.ico"><link rel="stylesheet" href="dashboard.css"/>
<style>
  @import url("boss.css");
</style>
<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
<script>
function showProfile() {
 window.location.href="profile.php";
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../files/Plugins/w3.css">
<body>
<div class="sidenav">
<img src="profile.png"style="justify-items:center;align-items;center;">
  <a onclick='location.replace("dashboard.php")'><i class="fa-solid fa-bars-progress"></i> Dashboard</a>
  <a id ="hovered"><i class="fa-solid fa-users-line"></i> Staff Data</a>
<a onclick='location.replace("students.php")'><i class="fa-solid fa-users-line"></i> Student Data</a>
  <a onclick='location.replace("You.html")'><i class="fa-solid fa-user"></i>You</a>
  <a onclick='location.replace("feedback.php")'><i class="fa-solid fa-flag"></i> Report</a>
  <a  onclick='location.replace("notification.php")'> <i class="fa-solid fa-bell"></i> Notifications </a>
  <a  onclick='window.open("../../Aptitude%20Learns/login.php", value="_blank")'> <i class="fa-solid fa-circle-play"></i> Learns </a>
  <button onclick="location.replace('logout.php')" style="color:white;background-color: red;    width: 100%;
    font-size: large;">Log Out</button>
</div>
   <?php
// Include config file
require_once "login_config.php";



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
		$first_name = $_POST['LastName'];
		$last_name = $_POST['FirstName'];
		$age = $_POST['age'];
		$subject = $_POST['subject'];
		$gender = $_POST['gender'];
        $salary = $_POST['salary'];
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO teachers (LastName, FirstName, subject, age,Gender,salary) VALUES ('$first_name',
			'$last_name','$subject','$age','$gender','$salary')";
                echo "<script>location.replace('../index.php')</script>";
		
		if(mysqli_query($conn, $sql)){
			echo "<div id='notify'><h6>data stored in a database successfully." . " Please browse your localhost php my admin". " to view the updated data</h6></div>";

			echo nl2br("\n$first_name\n $last_name\n "
				. "$age");
      
		} 
    
      
      echo "New record created successfully. Last inserted ID is: ";
    
  }else{
      $last_id = mysqli_insert_id($conn);
session_start();
			echo "<div id='notify' class='card2' style='text-align:center;'><h1>Staff Profile Management @". $_SESSION['user'] ."<h1></div> "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
	

?>
<div class="main">
<!-- <iframe class="iframe" src="../main/index.php" alt="loading.."> -->
  <div id="data"><div class="spinner"></div></div>
  
  <script src='../client_request.js'></script>
  <script src="../fR_Valid.js"></script>
  <script src="../order_query.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script>
  

  function fnExcelReport() {
  var table = document.getElementById('customers'); // id of table
  var tableHTML = table.outerHTML;
  var fileName = <?php echo '"'. $_SESSION['user']. '.xls'.'"'?>;

  var msie = window.navigator.userAgent.indexOf("MSIE ");

  // If Internet Explorer
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    dummyFrame.document.open('txt/html', 'replace');
    dummyFrame.document.write(tableHTML);
    dummyFrame.document.close();
    dummyFrame.focus();
    return dummyFrame.document.execCommand('SaveAs', true, fileName);
  }
  //other browsers
  else {
    var a = document.createElement('a');
    tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
    a.href = 'data:application/vnd.ms-excel,' + tableHTML;
    a.setAttribute('download', fileName);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }
}
var specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '.no-export': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return true;
    }
};
var specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '.no-export': function (element, renderer) {
        // true = "handled elsewhere, bypass text extraction"
        return true;
    }
};

function exportPDF(id) {
    var pdf = new jsPDF('p', 'pt', 'a4');
    //A4 - 595x842 pts
    //https://www.gnu.org/software/gv/manual/html_node/Paper-Keywords-and-paper-size-in-points.html
    pdf.setFont("helvetica");
pdf.setFontType("bold");
pdf.setFontSize(9);
    pdf.setProperties({
        title: 'Evergreen PEH School',
        subject: 'Staff list',
        author: '<?php echo $id?>',
        keywords: 'aptitude,evergreen,staff,lists',
        creator: 'aptitude dbms',
        fast_web_view : 'yes'
    });
    //Html source 
    source = document.getElementById(id);
   
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 0,//70
        bottom: 0,//50
        left: 30,//30
        width: 700
    }
    width =
      "max-width";
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'height':"80%",
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
    <?php 
  $time = time();
?>
        pdf.save('<?php echo $id.$time?>_teachers.pdf');
    }, margins);
  ;
}
$(window).keydown(function(event) {
  if(event.ctrlKey && event.keyCode == 80) { 
   
    window.open('print_t.php','_blank','height=500, width=888,right=50%');
    event.preventDefault(); 
    
  }
  if(event.ctrlKey && event.keyCode == 83) { 
    $("#submiter").click();
    event.preventDefault(); 
  }
  if(event.ctrlKey && event.keyCode == 13){
    create();
    event.preventDefault(); 
  }
});
  function create(){
    console.log("clicked");
    $("#forum").slideDown("slow");
   
  $("#table").css("cursor","not-allowed");
  $(".sidenav").css("cursor","not-allowed");
  $("#table").css("user-select","none");
  $(".sidenav").css("user-select","none");

  
 $("#close").click(function(){
    $("#forum").slideUp("slow");
    $("#table").css("cursor","pointer");
$(".sidenav").css("cursor","pointer");
$("#table").css("user-select"," ");
$(".sidenav").css("user-select"," ");

  })}
  
  function age_validator(){
  let age=document.getElementById('age_input').value;
if(age>100 || age<18){
  document.getElementById("submiter").disabled=true;
  document.getElementById("submiter").style.opacity=0;
  if(age>100 && age>18){
  document.getElementById('age_input').value = "";
  }

}
else{
  document.getElementById("submiter").style.opacity=1;
  document.getElementById("submiter").disabled=false;
}
  }
function down(){
  document.getElementById("iframe").style.display = "block";
}
update_required=false;
if(update_required==true){
  new update();
  
}
// setInterval(update,15000);
let trancuater = document.getElementById("trancuater");

</script>