<?php
 session_start();
 
$conn = new  mysqli('localhost', 'root', '', 'product');

$userLoggedIn = isset($_SESSION['user_id']);

$sql_cart = "SELECT * FROM cart";
$item  = $conn->query($sql_cart);

$cartItemCount = mysqli_num_rows($item);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fashtech</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="../img/logo.png" class="logo" alt /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php"> Home</a></li>
                <li><a href="shop.php"> Shop</a></li>
                <li><a href="blog.php"> Blog</a></li>
                <li><a href="about.php"> About</a></li>
                <li><a href="contact.php"> Contact</a></li>
                <li>
                    <a class="active" href="cart.php">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <?php
                        if ($cartItemCount > 0) {
                            echo '<span class="count">' . $cartItemCount . '</span>';
                        }
                        ?>
                    </a>
                </li>
                <li class="admin-panel-container">
                    <a href="user_authorize/user_login.php">
                        <img src="../img/people/1.png" width="35px">
                    </a>
                    <div class="admin-dropdown">
                        <a href="../admin_site/login_page.php">Continue as Admin</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>#Try once_keep forever</h2>
        <p>We are committed to your satisfaction</p>
    </section>

    <section id="cart" class="section-p1">
        <form method="post" id="cart-form">
            <table>
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($item) > 0) {
                        while ($row = mysqli_fetch_assoc($item)) { ?>
                            <tr>
                                <td>
                                    <button class="dlt">
                                        <i data-id="<?php echo $row["id"] ?>" class="fa-regular fa-trash-can"></i>
                                    </button>
                                </td>
                                <td>
                                    <img src="../img/products/<?php echo $row["image"] ?>" alt="">
                                </td>
                                <td><?php echo $row["name"] ?></td>
                                <td>৳<?php echo $row["price"] ?></td>
                                <td>
                                    <input type="number" name="itemQuantity" value="1" min="0" max="15" data-product-id="<?php echo $row["id"] ?>" onchange="updateSubtotal(this)">
                                </td>
                                <td id="subtotal-<?php echo $row["id"] ?>">৳<?php echo $row["price"] ?></td>
                                <td>
                                    <input type="hidden" id="price-<?php echo $row["id"] ?>" value="<?php echo $row["price"] ?>">
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7"> <span>No item in Cart</span></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </form>

    </section>

    <section class="section-p1" id="cart-add">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" id="coupon-input" placeholder="Enter your coupon">
                <button class="normal" onclick="applyCoupon()">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Cart total</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td id="cart-subtotal">৳0</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td id="capp">Coupoun Discount</td>
                    <td id="discount">৳0</td>
                </tr>
                <tr>
                    <td><Strong>Total</Strong></td>
                    <td id="totalpay"><Strong>৳0</Strong></td>
                </tr>

            </table>
            <?php
            if ($userLoggedIn && mysqli_num_rows($item) > 0) {
                echo '<a href="index.php"> <button class="normal">Proceed to Checkout</button></a>';
            } elseif (!$userLoggedIn && mysqli_num_rows($item) > 0) {
                echo '<a href="user_authorize/user_login.php"> <button class="normal">Login to Checkout</button></a>';
            }
            ?>
        </div>


    </section>

    <section id="newsletter" class="section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>
                Get e-mail updates about our leatest shop and
                <span>special offers.</span>
            </p>
        </div>
        <div class="form">
            <input type="email" placeholder="Your e-mail address" />
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img src="../img/logo.png" class="logo" />
            <h4>Contact</h4>
            <p><strong>Address: </strong>Shaheb Bazar, Rajshahi</p>
            <p><strong>Phone: </strong>01771431724, 01521768694</p>
            <p><strong>Open: </strong>10am-10pm, Sat-Thu</p>

            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivary Information</a>
            <a href="#">Privacy ploicy</a>
            <a href="#">Trams & contidions</a>
            <a href="#">Contact us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track my order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install app</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="../img/pay/app.jpg" />
                <img src="../img/pay/play.jpg" />
            </div>
            <div>
                <p>Secured payment gateway</p>
                <img src="../img/pay/pay.png" />
            </div>
        </div>
    </footer>


    <script src="cart.js"></script>


</body>

</html>