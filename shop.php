<?php
session_start();
include "mysqli_connect.php";
$result = $db->query("SELECT * FROM plant where Quantity>0");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Cmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IVY Shop | shop </title>
    <!-- link to the css-->
    <link rel="stylesheet" href="style.css">
    <!-- box icons -->
    <link href='http://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <section id="header">
        <a href="Home.php"> <img src="img/Logo_dark.png" class="logo" alt="" width="100" height="100"></a>
        <div>
            <ul id="navbar">
                <li> <a href="Home.php">Home</a> </li>
                <li> <a class="active" href="shop.php">Shop</a> </li>
                <li> <a href="Aboutt.html">About</a></li>
                <li> <a href="contact.html">Contact</a> </li>
                <li> <a href="account.php">Account</a> </li>
                <li> <a href="FAQ.html">FAQ</a> </li>
                <li> <a href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
            </ul>
        </div>
    </section>

    <section id="page-header1">

        <h2>SHOP ALL PLANTS </h2>
        <br>
        <br>


        <h4 style="color: #088178; font-weight: 300">
            <center>All our plants are guaranteed to arrive happy & healthy. It is our customer happiness guarantee!</center>
        </h4>

    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            while ($row = $result->fetch_assoc()) { ?>
               
                    <div class="pro" >
                    <a style="text-decoration: none; width: 350px; " href="Product_Details.php?p_id=<?php echo $row["pid"] ?>&
                    p_name=<?php echo $row["pname"] ?>&
                    p_image=<?php echo $row["Picture"] ?>&
                    p_price=<?php echo $row["price"] ?>&
                    p_quantity=<?php echo $row["Quantity"] ?>">
                        <img src="images/<?php echo $row["Picture"] ?>" height="350px">
                    </a>
                        <div class="des">
                            <span>Live Plant</span>
                            <h5><?php echo $row["pname"]  ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo $row["price"] ?> SAR</h4>
                            <h5>ID: <?php echo $row["pid"]  ?></h5>
                        </div>
                        <form action="shop.php?p_id=<?php echo $row["pid"] ?>" method="post">
                            <input type="hidden" name="p_image" value="<?php echo $row["Picture"] ?>">
                            <input type="hidden" name="p_id" value="<?php echo $row["pid"] ?>">
                            <input type="hidden" name="p_name" value="<?php echo $row["pname"] ?>">
                            <input type="hidden" name="p_price" value="<?php echo $row["price"] ?>">
                            <input type="hidden" name="Descr" value="<?php echo $_GET["Descr"] ?>">

                            <input style="width: 50px; font-size: large;" type="number" name="p_quantity" value="1" min="1" max="<?php echo $row["Quantity"] ?>">
                            <button type="submit" name="add_to_cart" value="add_to_cart"> <i class="bx bxs-cart-alt cart"></i>
                            </button>
                        </form>
                    </div>
            <?php  } ?>

        </div>
    </section>

    <?php
    if (isset($_POST["add_to_cart"])) {
        if (isset($_SESSION["cart"])) {
            $session_array_id = array_column($_SESSION["cart"], "p_id");
            if (!in_array($_GET["p_id"], $session_array_id)) {
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            } else {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value["p_id"] == $_GET["p_id"]) {
                        unset($_SESSION["cart"][$key]);
                    }
                }
                $session_array = array(
                    "p_id" => $_POST["p_id"],
                    "p_image" => $_POST["p_image"],
                    "p_name" => $_POST["p_name"],
                    "p_price" => $_POST["p_price"],
                    "p_quantity" => $_POST["p_quantity"],
                );
                $_SESSION["cart"][] = $session_array;
            }
        } else {
            $session_array = array(
                "p_id" => $_POST["p_id"],
                "p_image" => $_POST["p_image"],
                "p_name" => $_POST["p_name"],
                "p_price" => $_POST["p_price"],
                "p_quantity" => $_POST["p_quantity"],
            );

            $_SESSION["cart"][] = $session_array;
        }
    }

    // var_dump($_SESSION["cart"]);


    ?>


    <section id="pagination" class="section-p1">
        <a href="#">1</a>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/Logo_dark.png" alt="" height="60" width="90">
            <h4>Contact</h4>
            <p><strong>Address: </strong> King Faisal In Abd Al Aziz, King Faysal University. Dammam 34212</p>
            <p><strong>Phone:</strong> 013 333 3766</p>
            <p><strong>Hours:</strong> sun-thu: 8:00am-8:00pm</p>

            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>


        <div class="col">
            <h4>About</h4>
            <a href="Aboutt.html">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.html">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="account.php">Sign In</a>
            <a href="ncart.php">View Cart</a>
            <a href="ncart.php">My Wishlist</a>
            <a href="account.php">Track My Order</a>
            <a href="contact.html">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
        </div>
        <div class="copyright">
            <p>
                <center> © 2022, web based project - Class 3, Group 3</center>
            </p>
        </div>

    </footer>






</body>

</html>