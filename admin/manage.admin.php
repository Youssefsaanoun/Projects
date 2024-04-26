<?php
// Start session at the beginning if not already started in included files
session_start();
include('partials/menu.php');
include('connect.php');

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>

        <?php
        // Display session message if set
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // Remove message from session after displaying
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']); // Remove message from session after displaying
        }

       
        ?>

        <br>

        <!-- Fix: Corrected the button syntax and placement -->
        <a href="add-admin.php" class="btn btn-primary">Add Admin</a>
        <br><br>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_admin";
                $res = mysqli_query($con, $sql);

                // Check if the query was successful
                if ($res == true) {
                    $count = mysqli_num_rows($res);
                    $sn = 1; // Initialize a serial number variable

                    // Check if there are any rows returned
                    if ($count > 0) {
                        // Loop through each row in the result set
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                            // Display the data
                            ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $full_name; ?></td>
                    <td><?php echo $username; ?></td>
                    <td>
                        <!-- Update and Delete buttons with proper href (you'll need to replace with actual links) -->
                        <a href="update-addmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                        <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        <a href="update-password.php?id=<?php echo $id; ?>" class="btn-secondary">Change Password</a>
                    </td>
                </tr>
                <?php
                        }
                    } else {
                        // Optionally, display a message if no admins found
                        echo "<tr><td colspan='4' class='text-center'>No Admins Found</td></tr>";
                    }
                } else {
                    // Display error message if query failed
                    echo "<tr><td colspan='4'>Error: " . mysqli_error($con) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>