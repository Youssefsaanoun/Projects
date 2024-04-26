<?php

include ('partials/menu.php');
include ('connect.php');


?> <div class="main-content">
    <div class="wrapper">
        <h1> Admine Pannel </h1>
        <?php
        if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']); // Remove message from session after displaying
        }

        ?>
        <div class="col-4">
            <?php
            $sql= "SELECT * FROM tbl_category ";
            $res= mysqli_query($con,$sql);
            $count=mysqli_num_rows($res);
            
            
            
            ?>

            <h1><?php echo $count?></h1>
            <br>
            Categories
        </div>
        <div class="col-4">
            <?php
            $sql= "SELECT * FROM tbl_product ";
            $res= mysqli_query($con,$sql);
            $count=mysqli_num_rows($res);
            
            
            
            ?>
            <h1><?php echo $count?></h1>
            <br>
            Products
        </div>
        <div class="col-4">
            <?php
            $sql= "SELECT * FROM tbl_order ";
            $res= mysqli_query($con,$sql);
            $count=mysqli_num_rows($res);
            
            
            
            ?>
            <h1><?php echo $count ;?></h1>
            <br>
            Total Orders
        </div>
        <div class="col-4">
            <?php
            $sql= "SELECT SUM(price) AS Total FROM tbl_order ";
            $res= mysqli_query($con,$sql);
            
            $rows=mysqli_fetch_assoc($res);
            $revenue=$rows['Total'];
            
            
            ?>
            <h1><?php echo $revenue;  ?><?php echo "DT";  ?></h1>
            <br>
            Revenue Generated
        </div>
        <div class="clearfix"></div>

    </div>
</div>


<?php
include('partials/footer.php');

?>