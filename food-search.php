<?php
include "partials-front/menu.php";
?>
<!-- Food Menu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        if(isset($_POST['search'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price = $row['price'];
                    $description = $row['description'];
        ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php
                if ($image_name == "") {
                    echo "Image not available";
                } else {
                ?>
                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt="Food Image"
                    class="img-responsive img-curve">
                <?php
                }
                ?>
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price">$<?php echo $price; ?></p>
                <p class="food-detail"><?php echo $description; ?></p>
                <br>
                <a href="<?php echo SITEURL; ?>order.php" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php
                }
            } else {
                echo "<p>No products found</p>";
            }
        } else {
            echo "<p>Please enter a search query</p>";
        }
        ?>
    </div>
</section>
<!-- Food Menu Section Ends Here -->

<?php
include "partials-front/footer.php";
?>