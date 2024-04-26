<!-- Navbar Section Ends Here -->
<?php
include "partials-front/menu.php";
session_start();
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">
        <?php
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_product WHERE id=$id"; 
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
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="#" class="order" method="POST">
            <fieldset>
                <legend>Selected Product</legend>

                <div class="food-menu-img">
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
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title?> </h3>
                    <p class="food-price"><?php echo $price?></p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Youssef saanoun" class="input-responsive"
                    required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
        <?php
            }
        }
$total=0;
        // Insertion part
        if(isset($_POST["submit"])){
            $full_name = $_POST['full-name'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $qty = $_POST['qty'];
            $total=$total*$qty;
           
            // Assuming 'id' is auto-incremented and you don't need to provide it explicitly
            $sql= "INSERT INTO tbl_order (customer_name,customer_contact,customer_email,customer_address, qty,price,total) VALUES ('$full_name', '$contact', '$email', '$address', $qty,$price,$total)";
            
            if (mysqli_query($con, $sql)) {
           echo "product order";
            } else {
                echo "Failed to Add Product";
               
                
            }
        }
        ?>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- social Section Starts Here -->
<?php
include "partials-front/footer.php";
?>