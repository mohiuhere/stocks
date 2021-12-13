<?php
include "connection.php";
include "auth.php";
$id = $_REQUEST['id'];
$quary = "DELETE FROM company WHERE id = '".$id."';";
mysqli_query($conn, $quary);
header("Location: company-list.php");
?>