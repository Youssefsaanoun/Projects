<?php include 'partials/menu.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <form action="" method="POST">

            <table>
                <tr>
                    <td>Full name :</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add admin" class="btn btn-primary" name="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include 'partials/footer.php';

include 'connect.php'; 

if(isset($_POST["submit"])){
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming 'id' is auto-incremented and you don't need to provide it explicitly
    $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$full_name', '$username', '$password')";
    
    if (mysqli_query($con, $sql)) {
        $_SESSION['add']="Admin Added Successfully";
        header("location:".SITEURL.'admin/manage.admin.php');
    } else {
        $_SESSION['add']="Failed to Add Admin";
        header("location:".SITEURL.'admin/manage.admin.php');
    }

    mysqli_close($con);
}
?>