<!DOCTYPE html>
<head><title>Online Class</title></head>
<body>
    <?php
   echo "<h1>Welcome</h1>";
   $objDateTime = new DateTime('NOW');
   header("location: Cl1.php#". $objDateTime)?>
 
</body>