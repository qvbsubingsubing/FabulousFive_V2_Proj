<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["curr_email"] = "administrator@gmail.com"; //permanent account property
$_SESSION["curr_account_id"] = "1"; //permanent account property during use
$_SESSION["curr_chat_account_id"] = "3"; //changeable by clicking who will be chatted
//$_SESSION["wh_role"] = "1"; //permanent account property role
$_SESSION["selected_item"] = "0"; //changeable by clicking the selected item
echo "Session variables are set.";
echo $_SESSION["curr_email"]." ".$_SESSION["curr_account_id"]." ".$_SESSION["wh_role"]." ".$_SESSION["curr_chat_account_id"] ; // just for checking
echo json_encode($_SESSION);
//header("location: page_administrator.php");
?>

</body>
<script>
    window.location.href = 'page_administrator.php';
    //window.location.href = 'insert_message.php';
</script>
</html>