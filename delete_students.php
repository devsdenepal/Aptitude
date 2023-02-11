<?php
session_start();
error_reporting(0);
if($_SESSION["loggedin"] != "true"){
header("location:login.php");
}			?>
<script>
function reload(){
window.location.href="students_list.php"
move();
}
</script><?php
$conn = mysqli_connect("localhost", "root", "", "aptitude");
$sql = "DELETE FROM students WHERE Slno ='" . $_GET["Slno"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "<p style='color:white;background-color:green;'><i class='fa-solid fa-circle-info'> </i> <img src='https://i.imgur.com/Q9BGTuy.png'/> Record number " .  $_GET["Slno"] . " deleted successfully.</p><script>setTimeout(reload, 3000)</script>";
}    

else {
    echo "Error deleting record:<script>cancel()</script>  " . mysqli_error($conn);
}
mysqli_close($conn);
?> <script>
function reload(){
history.goback(0)
}
</script>       <style>
#myProgress {
  width: 100%;
  background-color: #ddd;
}
#myProgress2 {
  width: 100%;
  background-color: red;
}

#myBar {
  width: 1%;
  height: 13px;
  background-color: #04AA6D;
}
#myBar2 {
  width: 1%;
  height: 13px;
  background-color: red;
}
</style>


<div id="myProgress">
  <div id="myBar"></div>
</div>

<br>


<script>

var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}
function cancel() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar2");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
  reload().cancel
}

</script>                                                                                                                                                                                                                                                                         