<?php
// Include your menu or DB connection file here
include('partials/menu.php');
include "connect.php";

// Get the ID of the selected admin
$id = $_GET['id'];

// Create SQL query to get the details
$sql = "SELECT * FROM tbl_admin WHERE id=$id";

// Execute the query
$res = mysqli_query($con, $sql);

// Check if the query executed successfully
if($res == true) {
    // Check if the data is available
    $count = mysqli_num_rows($res);
    // Check if admin data is available
    if($count == 1) {
        // Get the details
        $row = mysqli_fetch_assoc($res);
        $full_name = $row['full_name'];
        $username = $row['username'];
    } else {
        // Redirect to admin page with a session message
        $_SESSION['no-admin-found'] = "<div class='error'>Admin Not Found.</div>";
        header('location:manage-admin.php');
    }
}
?>

<!-- HTML form for updating admin -->
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Full Name: </td>
            <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
        </tr>
        <tr>
            <td>Username: </td>
            <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
// Check if the submit button is clicked
if(isset($_POST['submit'])) {
    // Get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // Create a SQL query to update admin
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username' 
    WHERE id='$id'";

    // Execute the query
    $res = mysqli_query($con, $sql);

    // Check if the query executed successfully
    if($res == true) {
        // Query executed and admin updated
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
        header('location:manage.admin.php');
    } else {
        // Failed to update admin
        $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
        header('location:manage.admin.php');
    }
}
?>
<?php include('partials/footer.php'); ?>