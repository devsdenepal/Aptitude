<link rel="shortcut icon" href="logo.ico">
<?php
// Initialize the session
session_start();
error_reporting(E_ERROR | E_PARSE);
$usr = $_SESSION['username'];
$created_at = $_SESSION['created_at'];


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo  '<button class="w3-button  w3-silver w3-right"><image src="profile.png" class="w3-round-xxlarge" onclick="showProfile()"></image>' . $usr . '</button>' ;

}
else{
    echo '<script>window.location.href="login.php"</script>';
    
}

// Include config file
require_once "config.php";
?>
<div style="background-color:white">
<h1 class="heading"> Gautam Community </h1>
<hr/>
<script>
function showProfile(){
 window.location.href="profile.php";
}
</script>
</div>
<?php
include 'config2.php';
$searchErr = '';
$user_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from users where username like '%$search%' or Id like '%$search%'");
        $stmt->execute();
        $user_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($user_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Search more || Gautam Community</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.container{
    width:70%;
    height:30%;
    padding:20px;
}
h1{
text-align:center;
animation-name: welcome;
animation-duration: 2s;
color:green;
font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}
}

@keyframes welcome {
  from {color: green;}
  to {color: blue;}
}
body{
background-color: #38444d;
color: white;
}
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color:white;
  color: green;
}
</style>
<script src="https://kit.fontawesome.com/1364c3c233.js" crossorigin="anonymous"></script>
</head>
 
<body>
    <div class="w3-container">
    <br/><br/>
    <form class="form-horizontal" action="#result" method="post">
            <label class="w3-center" for="email"><b>Type to search:</b>:</label>
              <input type="text" class="w3-center w3-round-xxlarge w3-green" name="search" placeholder="search here">
              <button type="submit" name="save" class="w3-button"><i class="fa-brands fa-searchengin"></i>Search</button>
            
                    <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        
         
    </div>
    </form>
    <br/><br/>
    <h3 style="text-align:center;"><u>Found:</u></h3><br/>
    <div class="table-responsive">          
      <table class="w3-round-xxlarge w3-center table">
        <thead>
          <tr>
            <th>Users found:</th>
            
          </tr>
        </thead>
        <tbody class="card">
                <?php
                 if(!$user_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 
                 else{
                    foreach($user_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo '<a href="https://wa.me/' . $value['username'] . '">' . '<img src="profile.png"></img></a>' . $value['username'];?></td>
                        <td><?php echo '|| ' . $value['created_at'];?> A memeber of Gautam Community.</td>
                      .
                    </tr>
                     
                         
                        <?php
                    }
                     
                 }
                ?>
             </div></div></div>
         </tbody>
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>