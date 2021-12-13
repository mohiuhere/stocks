<?php 
include "connection.php";
include "auth.php";

$company_id = $_REQUEST['id'];
$user_id = $_SESSION['id'];

echo "Company id: ".$company_id; 
echo"<br>"; 
echo "User id: ".$user_id;
?>