<?php
include 'partials/menu.php';
include 'connect.php';

// Assuming 'SESSION' and 'SITEURL' are defined elsewhere in your code
// Make sure to define them if they are not already defined

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $featured = isset($_POST['featured']) ? $_POST['featured'] : "NO";
    $active = isset($_POST['active']) ? $_POST['active'] : "NO";


    if ( isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            $image_path=$_FILES['image']['tmp_name'];
            $deestiantionpath="C:\MyProjectphp\images";
            $upload=move_uploaded_file($image_path,$deestiantionpath);
            
            if ($upload==false){

                $_SESSION["upload"]="faild to upload image ";
                header("location:".SITEURL.'add-category.php');
                
                
            }
            else
            $_SESSION["upload"]=" upload successfully   ";
            header("location:".SITEURL.'managec.php');
        
    }
    else
        $image_name="";

    $sql = "INSERT INTO tbl_category (title, featured, active,image_name) VALUES ('$title', '$featured', '$active','$image_name')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['add'] = "Category Added Successfully";
        header('location: ' . SITEURL . 'admin/managec.php');
        exit(); // Exit after header redirect
    } else {
        $_SESSION['add'] = "Failed to Add Category";
        header('location: ' . SITEURL . 'admin/managec.php');
        exit(); // Exit after header redirect
    }

    mysqli_close($con);
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add category </h1>
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
            <td><input type="text" id="title" placeholder="Category Title" name="title"></td>
        </tr>
        <tr>
            <label for="fileUpload">Select image:</label>
            <input type="file" name="image">

        </tr>
        <tr>
            <td><label for="featured">Featured</label></td>
            <td><input type="radio" id="featured" name="featured" value="yes">Yes</td>
            <td><input type="radio" name="featured" value="no">No</td>
        </tr>
        <tr>
            <td><label for="active">Active</label></td>
            <td><input type="radio" id="active" name="active" value="yes">Yes</td>
            <td><input type="radio" name="active" value="no">No</td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" value="Add Category" class="btn-secondary" name="submit">
            </td>
        </tr>
    </table>
</form>

<?php include 'partials/footer.php'; ?>