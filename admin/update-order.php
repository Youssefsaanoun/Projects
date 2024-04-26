<?php
session_start(); // Start session if not already started

// Include your menu or DB connection file here
include('partials/menu.php');
include "connect.php";

// Check if the ID is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Create SQL query to get the details
    $sql = "SELECT * FROM tbl_order WHERE id=$id";

    // Execute the query
    $res = mysqli_query($con, $sql);

    // Check if the query executed successfully
    if($res) {
        // Check if the data is available
        if(mysqli_num_rows($res) == 1) {
            // Get the details
            $row = mysqli_fetch_assoc($res);
           
            $qty = $row['qty'];
            $price = $row['price'];
            $email = $row['customer_email'];
            $Phone_number = $row['customer_contact'];
            // Make sure to define $Name_customer if it's used in your database
            $Name_customer = $row['customer_name']; 
        } else {
            // Redirect to manage order page with an error message
            $_SESSION['no-order-found'] = "<div class='error'>Order Not Found.</div>";
            header('location:manage-order.php');
            exit(); // Stop further execution
        }
    } else {
        // Redirect to manage order page with an error message
        $_SESSION['db-error'] = "<div class='error'>Database Error.</div>";
        header('location:manage-order.php');
        exit(); // Stop further execution
    }
} else {
    // Redirect to manage order page if ID is not provided
    header('location:manage-order.php');
    exit(); // Stop further execution
}
?>

<!-- HTML form for updating order -->
<form action="" method="POST">
    <table class="tbl-30">

        <tr>
            <td><label for="Name_customer">Name customer</label></td>
            <td><input type="text" id="Name_customer" placeholder="Name_customer" name="Name_customer"
                    value="<?php echo isset($Name_customer) ? $Name_customer : ''; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="Phone_number">Phone number</label></td>
            <td><input type="text" id="Phone_number" placeholder="Phone number" name="Phone_number"
                    value="<?php echo isset($Phone_number) ? $Phone_number : ''; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="price">Price</label></td>
            <td><input type="text" id="price" placeholder="Price" name="price"
                    value="<?php echo isset($price) ? $price : ''; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" id="email" placeholder="Email" name="email"
                    value="<?php echo isset($email) ? $email : ''; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="qty">Quantity</label></td>
            <td><input type="text" id="qty" placeholder="Quantity" name="qty"
                    value="<?php echo isset($qty) ? $qty : ''; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Order" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
// Check if the submit button is clicked
if (isset($_POST['submit'])) {
    // Sanitize and validate input
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Phone_number = mysqli_real_escape_string($con, $_POST['Phone_number']);
    $Name_customer = mysqli_real_escape_string($con, $_POST['Name_customer']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    
    // Create a SQL query to update order
    $sql = "UPDATE tbl_order SET  
            price = '$price',
            customer_contact='$Phone_number',
            customer_email='$email',
            customer_name='$Name_customer',
            qty='$qty'
            WHERE id='$id'";

    // Execute the query
    $res = mysqli_query($con, $sql);

    // Check if the query executed successfully
    if($res) {
        // Query executed and order updated
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        header('location:manage-order.php');
        exit(); // Stop further execution
    } else {
        // Failed to update order
        $_SESSION['update'] = "<div class='error'>Failed to Update The Order.</div>";
        header('location:manage-order.php');
        exit(); // Stop further execution
    }
}
?>
<?php include('partials/footer.php'); ?>