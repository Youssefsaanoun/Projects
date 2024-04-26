<?php
// Start session at the beginning if not already started in included files
session_start();
include('partials/menu.php');
include('connect.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
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

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_order";
                $res = mysqli_query($con, $sql);

                // Check if the query was successful
                if ($res) {
                    $count = mysqli_num_rows($res);
                    $sn = 1; // Initialize a serial number variable

                    // Check if there are any rows returned
                    if ($count > 0) {
                        // Loop through each row in the result set
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                                    $price = $rows['price'];
                            $customer_name = $rows['customer_name'];
                            $customer_contact = $rows['customer_contact'];
                            $customer_email = $rows['customer_email'];
                            $customer_address = $rows['customer_address'];
                            $qty = $rows['qty'];
                            $total = $price * $qty;

                            // Display the data
                            ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $customer_name ?></td>
                    <td><?php echo $customer_contact ?></td>
                    <td><?php echo $customer_email ?></td>
                    <td><?php echo $customer_address ?></td>
                    <td><?php echo $price ?></td>
                    <td><?php echo $total ?></td>

                    <td>
                        <!-- Update and Delete buttons with proper href -->
                        <a href="update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                        <a href="delete-order.php?id=<?php echo $id; ?>" class="btn-danger">Delete Order</a>
                    </td>
                </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No Orders Found</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Error: " . mysqli_error($con) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>