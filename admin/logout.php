<?php

include "constants.php";
//destroy seesion 
session_destroy();
header('location:'.SITEURL.'/admin/login.php');




?>