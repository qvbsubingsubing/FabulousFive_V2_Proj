<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$find = $_POST['selected_item'];
echo $find." is what i found";
$_SESSION["selected_item"] = $find; //changeable by clicking the selected item.
echo "Session variables are set.";
echo $_SESSION["curr_email"]." ".$_SESSION["curr_account_id"]." ".$_SESSION["wh_role"]." ".$_SESSION["curr_chat_account_id"] ; // just for checking
echo json_encode($_SESSION);

?>

</body>
</html>