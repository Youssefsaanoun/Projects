<?php
include "partials-front/menu.php";

?>
<!-- Navbar Section Ends Here -->

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


        <?php 
            $sql = "SELECT * FROM tbl_category where $ ";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>

        <a href="category-foods.html">
            <div class="box-3 float-container">
                <?php if ($image_name == "") {
                                echo "Image not available";
                            } else {
                            ?>
                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt=""
                    class="img-responsive img-curve">
                <?php } ?>
                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
                }
            } else {
                echo "<p>No categories found</p>";
            }
            ?>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>



        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<!-- social Section Starts Here -->
<?php
include "partials-front/footer.php";

?>