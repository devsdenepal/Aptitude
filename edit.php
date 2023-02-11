<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
   <?php echo 'Username: <input type="text" name="username">';?><br>
   email: <input type="password" name="password"><br>
   
   <input type="submit" name="edited">
   
</form>
<?php
 
 session_start();
 include "config.php";
 if(isset($_POST['edited']))
 {
    $id=$_SESSION['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $select= "select * from users where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update users set username='$username',password='$password',  where id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:login.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:edit.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('edit.php');
    }
 }
?>
