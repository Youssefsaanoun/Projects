<?php
include "admin\constants.php";
include "admin\connect.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Website</title>
    <link rel="stylesheet" href="css/index.css">

    <!-- Link our CSS file -->

</head>


<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.jpg" alt="Gaming Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>

                    <li>
                        <a href="<?php echo SITEURL; ?>index.php">Home</a>
                    </li>
                    <li>
                        <a href=" <?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>products.php">Products</a>
                    </li>
                    <li>
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVFJREFUSEvVldFNA0EMRCedQCWBSoBKApUAlQCVQCoJepJHMl5f9k4oEuzP6qK7eZ6xd7PThdfuwvr6M4ArSYdw+yHpXdLXGvdrHCD+LOkhduvyPIWsAVD5q6Q7SU8BQRgwbl7OOZkBEEEYAC5YN7G7enYiAz6sc4D7ELdg/dgu/Pt1F9kSgFgeJ02k6gzfBCAOHHgBO0aFwBGuAJo+9GPJwVuq7jbEDPuMBteINgFOoUZFfEjFVI6onVUHfvdHsksODCAapgNxhJkqrwrgGbdTACLEwMof4YLeGELFuU+8PxTcOUCIHuQGcw6IJ09XdcD7wyR1gCziRrqBGd4B6kC0t6kBiFORR5IKO3jOfJikzoHPAAAq8pVA3r4u3J96yodJ6gD5DFiIxuYJ+hXAYvuIpxNfAgyjOrtNc77EkaGIsYiQa6T9E9oCqGdo1fP/B3wDJWlUGbueJtoAAAAASUVORK5CYII=" />
                        <a href="foods.html">Panier</a>

                    </li>
                    <li>
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMJJREFUSEvdVcENgzAQM5uUTcoonaRiEhilm8AmUKMDpTQiTpRIKPe5Bxeb2He5BoWjKYyP2xA8AbwBMIfiA6D/1jLLN5gAPELIzneCdzEEix1WJP2pVQ4Quz4CGk4jfZEk0RmIILMZyexGNgKC+kiCBHuB2pUkGR3JshPwR15G8tdxapv6PNglIvg2tRbBGyjSEOSY1hwmnwdtMFmytWl9k3zlU5LJsc81Z6ONea65aGisshOSFo7Sut6a1EGTCYsTrMbnMhlVQcDaAAAAAElFTkSuQmCC" />
                        <a href="login.html">Signe in</a>
                    </li>


                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>