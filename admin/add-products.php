<?php
include 'partials/menu.php';
include 'connect.php';

// Assuming 'SESSION' and 'SITEURL' are defined elsewhere in your code
// Make sure to define them if they are not already defined

if (isset($_POST['submit'])) {
  
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    
    $featured = isset($_POST['featured']) ? $_POST['featured'] : "NO";
    $active = isset($_POST['active']) ? $_POST['active'] : "NO";
    $category=$_POST['category'];

    if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $image_path = $_FILES['image']['tmp_name'];
        $destinationpath = "C:/MyProjectphp/images"; // Corrected destination path
        $upload = move_uploaded_file($image_path, $destinationpath . '/' . $image_name);
        
        if (!$upload) {
            $_SESSION["upload"] = "Failed to upload image";
            header("location:" . SITEURL . 'add-products.php');
            exit; // Terminate script after redirection
        } else {
            $_SESSION["upload"] = "Image uploaded successfully";
        }
    } else {
        $_SESSION["upload"] = "No image selected";
    }

    $sql = "INSERT INTO tbl_product (title, description, price, image_name,category_id, featured, active,total) VALUES ('$title', '$description', '$price', '$image_name',$category, '$featured', '$active')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['add'] = "Product Added Successfully";
        header('location: ' . SITEURL . 'admin/manage-products.php');
        exit; // Terminate script after redirection
    } else {
        $_SESSION['add'] = "Failed to Add Product: " . mysqli_error($con);
        header('location: ' . SITEURL . 'admin/add-products.php');
        exit; // Terminate script after redirection
    }

    mysqli_close($con);
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']); // Remove message from session after displaying
        }
        ?>
    </div>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="text" id="title" placeholder="Product Title" name="title"></td>
        </tr>
        <tr>
            <td><label for="description">Description</label></td>
            <td><input type="text" id="description" name="description"></td>
        </tr>
        <tr>
            <td><label for="price">Price</label></td>
            <td><input type="number" id="price" name="price"></td>
        </tr>
        <tr>
            <td><label for="category">Category</label></td>
            <td>
                <select name="category" id="category">
                    <?php
                    $sql = "SELECT * FROM tbl_category WHERE active='YES'";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            echo "<option value='$id'>$title</option>";
                        }
                    } else {
                        echo "<option value='0'>No category Found</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="image">Select Image</label></td>
            <td><input type="file" name="image" id="image"></td>
        </tr>
        <tr>
            <td><label for="featured">Featured</label></td>
            <td>
                <input type="radio" id="featured_yes" name="featured" value="yes">
                <label for="featured_yes">Yes</label>
                <input type="radio" id="featured_no" name="featured" value="no">
                <label for="featured_no">No</label>
            </td>
        </tr>
        <tr>
            <td><label for="active">Active</label></td>
            <td>
                <input type="radio" id="active_yes" name="active" value="yes">
                <label for="active_yes">Yes</label>
                <input type="radio" id="active_no" name="active" value="no">
                <label for="active_no">No</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Add Product" class="btn-secondary" name="submit">
            </td>
        </tr>
    </table>
</form>

<?php include 'partials/footer.php'; ?>