<?php
session_start();
include "connect.php";
include "constants.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Corrected SQL query syntax and added single quotes around variables
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'"; 
    $res = mysqli_query($con, $sql);
    
    // Check if query executed successfully
    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $_SESSION["login"] = "Login successful";
            $_SESSION["user"]=$username;
            
            
            header('location:'.SITEURL.'admin/manage.admin.php');
         
        } else {
            $_SESSION["login"] = "Login failed";
            header('location:'.SITEURL.'admin/login.php');
         
        }
    } else {
        // Error handling for query execution
        echo "Error: " . mysqli_error($con);
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    body {
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body" style="background-color: rgb(245, 244, 242);">
                        <h5 class="card-title text-center">Login</h5>
                        <?php if (isset($_SESSION['login'])) {
                             echo $_SESSION['login'];
                              unset($_SESSION['login']);}
                      
                        if (isset($_SESSION["no-login-message"])) {
                        echo $_SESSION['no-login-message']; 
                            unset($_SESSION['no-login-message']);}
                        
                         ?>

                        <form method="POST">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                            <a href="/register.html">Register Now?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>