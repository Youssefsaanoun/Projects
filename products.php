<?php
include "partials-front/menu.php";
?>

<!-- Navbar Section Ends Here -->

<!-- Food Search Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <form action="<?php echo SITEURL ;?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>
<!-- Food Search Section Ends Here -->

<!-- Food Menu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">All Products</h2>
        <?php 
        $sql = "SELECT * FROM tbl_product";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php if ($image_name == "") {
                    echo "Image not available";
                } else { ?>
                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt=""
                    class="img-responsive img-curve">
                <?php } ?>
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price"><?php echo $price; ?></p>
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
        ?>
    </div>
</section>
<!-- Food Menu Section Ends Here -->

<!-- Social Section Starts Here -->
<?php
include "partials-front/footer.php";
?>
<!-- Footer Section Ends Here -->

</body>

</html>