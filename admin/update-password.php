<?php
// Include your menu or DB connection file here
include('partials/menu.php');
include "connect.php";

// Ensure the ID is set and valid to prevent errors
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']); // Prevent SQL injection

    // Create SQL query to get the details
    $sql = "SELECT * FROM tbl_admin WHERE id='$id'";

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
            $password = $row['password']; // This should ideally not be displayed or handled this way for security reasons
        } else {
            echo "There's an error.";
        }
    }
} else {
    echo "No admin selected.";
    exit; // Stop further execution if no ID is provided
}
?>

<!-- HTML form for updating admin -->
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>New Password: </td>
            <!-- Removed the value attribute from the password input for security -->
            <td><input type="password" name="newpassword"></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
if(isset($_POST['submit'])) {
    // Sanitize and validate the form inputs
    $id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
    $newPassword = isset($_POST['newpassword']) ? mysqli_real_escape_string($con, $_POST['newpassword']) : '';

    // Check if new password is not empty
    if(!empty($newPassword)) {
        // Hash the new password before saving it
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Create a SQL query to update admin
        $sql = "UPDATE tbl_admin SET password = '$hashedPassword' WHERE id='$id'";

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
    } else {
        echo "<div class='error'>New password cannot be empty.</div>";
    }
}
?>