<?php
include "connect.php";
include "constants.php";


$id=$_GET['id'];
$sql="DELETE FROM tbl_admin where $id=id ";
$res=mysqli_query($con,$sql);
if($res ==TRUE){
    $_SESSION['delete']="Admin deleted successfully";
    header("location:".SITEURL.'admin/manage.admin.php');

}
else{
    $_SESSION['delete']="Faild to delete admin ";
    header("location:".SITEURL.'admin/manage.admin.php');
}



?>