<?php
session_start();
include "mysqli_connect.php";
if (isset($_GET["p_idDelete"])) {
    $p_idDelete = $_GET["p_idDelete"];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value["p_id"] == $_GET["p_idDelete"]) {
            unset($_SESSION["cart"][$key]);
        }
    }
}

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Cmpatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IVY Shop | Cart </title>
    <!-- css link -->
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
                <li> <a href="shop.php">Shop</a> </li>
                <li> <a href="Aboutt.html">About</a></li>
                <li> <a href="contact.html">Contact</a> </li>
                <li> <a href="account.php">Account</a> </li>
                <li> <a href="FAQ.html">FAQ</a> </li>
                <li> <a class="active" href="ncart.php"><i class='bx bxs-cart-alt'></i></a></li>
            </ul>
        </div>
    </section>
    <section id="page-header" class="about-header">
        <h2 style="color:#915f50">
            <center>Your Shopping Cart</center>
        </h2>
        <p> </p>
    </section>
    <section id="cart" class="section-p1">
        <table style="width: 95%;">
            <thead>
                <tr>
                    <td>remove</td>
                    <td>update</td>
                    <td>image</td>
                    <td>product</td>
                    <td>price</td>
                    <td>quantity</td>
                    <td>subtotal</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $total = -1;
                if (!empty($_SESSION['cart'])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $total += $value["p_price"] * $value["p_quantity"];
                ?>
                    
                        <tr>
                        <form action="ncart.php" method="post">
                            <td><a href="ncart.php?p_idDelete=<?php echo $value["p_id"] ?>"><i class="bx bxs-x-circle"></i></a></td>
                            <td><button type="submit" name="update_cart" > <i class="bx bxs-edit"></i>
                            </button></td>
                            <td><img src="images/<?php echo $value["p_image"] ?>" width="200px" height="100px"></td>
                            <td><?php echo $value["p_name"] ?></td>
                            <td><?php echo $value["p_price"] ?></td>
                            <input type="hidden" name="p_id" value="<?php echo $value["p_id"] ?>">
                            <td><input style="width: 50px; font-size: large;" type="number" name="p_quantity_new" value="<?php echo $value["p_quantity"] ?>" min="1" max=""></td>
                            <td><?php echo number_format($value["p_price"] * $value["p_quantity"]) ?></td>
                        </form>
                        </tr>
                <?php }
                }

                ?>


            </tbody>
        </table>
    </section>


    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <form method="post" action="#">
                    <input type="text" placeholder="Enter your coupon">

                    <button type="submit" class="normal">Apply</button>
                </form>
            </div>
        </div>
        <div id="subtotal">
            <h3>Cart Total</h3>
            <table>
                <tr>
                    <td> Number of Items </td>
                    <td> <?php
                            if (isset($_SESSION["cart"])) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }

                            ?> </td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>
                            <?php
                            if ($total === -1) {
                                $total = 0;
                            } else {
                            }
                            echo $total;
                            ?>
                        </strong></td>
                </tr>
            </table>

            <div style="display: flex;flex-wrap: wrap;">
                <a href="ncart.php?action=buy"><button type="submit" class="normal">Buy Product</button></a>
                <a style="margin-left: 20px;" href="ncart.php?action=clear"><button type="submit" class="normal">Clear Cart </button></a>
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET["action"])) {
            if($_GET["action"]=="clear"){
               unset($_SESSION["cart"]);
               echo "
               <script> alert('clear seccessfully');
               window.location.href = 'shop.php';
               </script>
               ";
            }else if($_GET["action"]=="buy"){
                if (isset($_SESSION['cart'])){
                    if (count($_SESSION["cart"]) > 0){
                        if (!isset($_SESSION["pur"])){
                            $_SESSION["pur"]=array();

                        }
						foreach ($_SESSION['cart'] as  $value) {	
                        						
                            $p_id=$value["p_id"];
                            $p_name=$value["p_name"];
                            $p_image=$value["p_image"];
                            $p_price=$value["p_price"];
                            $p_quantity=$value["p_quantity"];                            
                            $sqlUpdate = "UPDATE plant SET plant.Quantity=plant.Quantity-$p_quantity WHERE pid =$p_id ";
                            $resultUpdate =  $db->query($sqlUpdate);
                            $cokearray = array(
                               "p_id" => $p_id,
                               "p_image" => $p_image,
                                "p_name" => $p_name,
                                "p_price" => $p_price,
                                "p_quantity" => $p_quantity,
                              );
                            
                            $_SESSION["pur"][$p_id]= $cokearray;


                        }
                        $Cinfo=$_SESSION["pur"];
                        $sendC=array(
                            'cokearray' => $Cinfo
                        );
                        setcookie("purchased", json_encode($sendC), time()+3600 , "/");
                        if ($resultUpdate == true){
                            unset($_SESSION["cart"]);
                            echo "
                            <script> 
                            window.location.href = 'Confirm.php';
                            </script>
                            ";
                        }
                    }
					}
                }else{
                    echo "
                                    <script> alert('there is no any product in cart');
                                    </script>
                                    ";
                }
            }
    
     



    if(isset($_POST["update_cart"])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["p_id"] == $_POST["p_id"]) {
                $_SESSION["cart"][$key]["p_quantity"]=$_POST["p_quantity_new"];
                echo "
                <script> alert('update seccessfully');
                window.location.href = 'ncart.php';
                </script>
                ";
            }
        }
    }

    ?>
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/Logo_dark.png" alt="" width="100" height="100">
            <h4> Contact </h4>
            <p> <strong> Address: </strong> King Faisal Ibn Abd Al Aziz, King Faysal University, Dammam 34212 </p>
            <p> <strong> Phone: </strong> 013 333 3766 </p>
            <p> <strong> Hours: </strong> sun-thu: 8:00am-8:00pm </p>

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
            <h4> Install app </h4>
            <p> from app store or google play </p>
            <div class="row">
                <img src="img/pay/Appstore.jpeg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p> Secured payment gateway </p>
            <img src="img/pay/payment.png" alt="">
        </div>
        <div class="copyright">
            <p>
                <center>© 2022, web based project - Class 3, Group 3</center>
            </p>
        </div>
    </footer>



</body>

</html>