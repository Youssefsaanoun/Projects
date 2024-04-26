<?php
if (!isset($_SESSION["user"])){
$_SESSION['no-login-message']="please login to access Admin panel.";
header('location:'.SITEURL.'admin/login.php');
    
}



?>