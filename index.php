<?php
include "partials-front/menu.php";

?><section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL ;?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Products</h2>

        <?php 
        $sql ="SELECT * FROM  tbl_category ";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        if ($count > 0) {
            while ($row=mysqli_fetch_assoc($res)) {
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
        ?>

        <a href=" category-foods.html">
            <div class="box-3 float-container">
                <?php
                if ($image_name == "") {
                    echo "image not available";
                } else {
                ?>

                <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt=""
                    class="img-responsive img-curve">

                <?php
                }
                ?>

                <h3 class="float-text text-white">
                    <?php echo $title; ?>
                </h3>
            </div>
        </a>
        <?php
            }
        }
        ?>

        <div class="clearfix">
        </div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Products</h2>
        <?php 
        $sql ="SELECT * FROM  tbl_product ";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        if ($count > 0) {
            while ($row=mysqli_fetch_assoc($res)) {
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['description'];
                $image_name=$row['image_name'];
        ?>

        <a href="category-foods.html">
            <div class="box-3 float-container">

                <div class="food-menu-box">
                    <?php
                    if ($image_name == "") {
                        echo "image not available";
                    } else {
                    ?>

                    <img src="<?php echo SITEURL; ?>images/<?php echo $image_name; ?>" alt=""
                        class="img-responsive img-curve">

                    <?php
                    }
                    ?>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <br>
                        <a href="<?php echo SITEURL; ?>order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order
                            Now</a>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </a>

        <?php
            }
        }
        ?>
    </div>

    <p class=" text-center">
        <a href="#">See All Products</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<!-- social Section Starts Here -->
<?php
include "partials-front/footer.php";
?>