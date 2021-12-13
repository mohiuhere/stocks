<?php
include "connection.php";
include "auth.php";
$id = $_REQUEST['id'];
$str = "DELETE FROM users WHERE id = '".$id."';";
mysqli_query($conn, $str);

$str = "DELETE FROM user_account WHERE user_id = '".$id."';";
mysqli_query($conn, $str);

header("Location: users-list.php");
?>