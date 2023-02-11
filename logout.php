<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header("login.php");
echo "<script>window.location.href='login.php'</script>"
?>

</body>
</html>