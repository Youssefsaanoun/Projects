<?php
session_start(); // Start session if not already started

// Include your menu or DB connection file here
include('partials/menu.php');
include "connect.php";

// Check if the ID is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Create SQL query to get the details
    $sql = "SELECT * FROM tbl_product WHERE id=$id";

    // Execute the query
    $res = mysqli_query($con, $sql);

    // Check if the query executed successfully
    if($res) {
        // Check if the data is available
        if(mysqli_num_rows($res) == 1) {
            // Get the details
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $featured = $row['featured'];
            $active = $row['active'];
            $description = $row['description'];
            $price = $row['price'];
        } else {
            // Redirect to manage category page with an error message
            $_SESSION['no-admin-found'] = "<div class='error'>Product Not Found.</div>";
            header('location:'.SITEURL.'manage-products.php');
            exit(); // Stop further execution
        }
    } else {
        // Redirect to manage category page with an error message
        $_SESSION['db-error'] = "<div class='error'>Database Error.</div>";
        header('location:'.SITEURL.'manage-products.php');
        exit(); // Stop further execution
    }
} else {
    // Redirect to manage category page if ID is not provided
    header('location:'.SITEURL.'manage-products.php');
    exit(); // Stop further execution
}
?>

<!-- HTML form for updating category -->
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="text" id="title" placeholder="Product Title" name="title" value="<?php echo $title; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="description">Description</label></td>
            <td><input type="text" placeholder="Description" name="description" value="<?php echo $description; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="price">Price</label></td>
            <td><input type="text" placeholder="Price" name="price" value="<?php echo $price; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="featured">Featured</label></td>
            <td><input type="radio" id="featured" name="featured" value="yes"
                    <?php if($featured == 'yes') echo 'checked'; ?>>Yes</td>
            <td><input type="radio" name="featured" value="no" <?php if($featured == 'no') echo 'checked'; ?>>No</td>
        </tr>
        <tr>
            <td><label for="active">Active</label></td>
            <td><input type="radio" id="active" name="active" value="yes"
                    <?php if($active == 'yes') echo 'checked'; ?>>Yes</td>
            <td><input type="radio" name="active" value="no" <?php if($active == 'no') echo 'checked'; ?>>No</td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Product" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>

<?php
// Check if the submit button is clicked
if (isset($_POST['submit'])) {
    // Sanitize and validate input
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $featured = isset($_POST['featured']) ? mysqli_real_escape_string($con, $_POST['featured']) : "NO";
    $active = isset($_POST['active']) ? mysqli_real_escape_string($con, $_POST['active']) : "NO";

    // Create a SQL query to update product
    $sql = "UPDATE tbl_product SET
            title = '$title',
            description = '$description',
            price = '$price',
            featured = '$featured',
            active = '$active'
            WHERE id='$id'";

    // Execute the query
    $res = mysqli_query($con, $sql);

    // Check if the query executed successfully
    if($res) {
        // Query executed and category updated
        $_SESSION['update'] = "<div class='success'>Product Updated Successfully.</div>";
        header('location:manage-products.php');
        exit(); // Stop further execution
    } else {
        // Failed to update category
        $_SESSION['update'] = "<div class='error'>Failed to Update Product.</div>";
        header('location:manage-products.php');
        exit(); // Stop further execution
    }
}
?>
<?php include('partials/footer.php'); ?>