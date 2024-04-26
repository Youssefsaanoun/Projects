<?php
include "partials-front/menu.php";
?>

<body>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Products</h2>
            <?php 
            $sql = "SELECT * FROM tbl_category ";
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
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Social Section Starts Here -->
    <?php
    include "partials-front/footer.php";
    ?>
    <!-- Footer Section Ends Here -->

</body>

</html>