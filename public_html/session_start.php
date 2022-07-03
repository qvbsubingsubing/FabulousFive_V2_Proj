<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["curr_email"] = "";
if($_SESSION["curr_email"] == ""){
   header("location: page_login.php");
}
?>

</body>
</html>