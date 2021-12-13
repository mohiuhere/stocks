<?php
session_start();
if(!$_SESSION['auth']){
    header('location:error401.php');
}
?>