<?php

include('partials/menu.php');
include('connect.php');

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br /><br />
        <?php
        if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']); // Remove message from session after displaying
        }
        ?>

        <br /><br />


        <a href="<?php echo SITEURL;?>admin/add-cateegory.php" class="btn btn-primary">Add category</a>
        <br><br>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">Featured</th>
                    <th scope="col">AcTIVE</th>
                    <th scope="col">Image_name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_category";
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
                            $title = $rows['title'];
                            $image_name=$rows['image_name'];
                            $featured = $rows['featured'];
                            $active=$rows['active'];

                            // Display the data
                            ?>
                <tr>

                    <td><?php echo $title; ?></td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <?php if ($image_name != "") : ?>
                        <img src="<?php echo SITEURL; ?>C:\MyProjectphp\images<?php echo $image_name; ?>" width="100px">
                        <?php else : ?>
                        Image not added
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="update-category.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update
                            Category</a>
                        <a href="delete-category.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete category</a>

                    </td>
                </tr>
                <?php
                        }
                    } else {
                        // Optionally, display a message if no admins found
                        echo "<tr><td colspan='4' class='text-center'>No Category Found</td></tr>";
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