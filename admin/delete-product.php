<?php
include "connect.php";
include "constants.php";


$id=$_GET['id'];
$sql="DELETE FROM tbl_product where $id=id ";
$res=mysqli_query($con,$sql);
if($res ==TRUE){
    $_SESSION['delete']="Category deleted successfully";
    header("location:".SITEURL.'admin/manage-products.php');

}
else{
    $_SESSION['delete']="Faild to delete  Category";
    header("location:".SITEURL.'admin/manage-products.php');
}



?>