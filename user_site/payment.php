<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'product');

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
    <link rel="stylesheet" href="../../admin_site/author.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
</head>

<body class="payment">
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
                        <?php
                        if ($userLoggedIn) {
                            echo  '<a href="../admin_site/logout.php">Log Out</a>';
                        } elseif (!$userLoggedIn) {
                            echo  '<a href="/user_site/user_authorize/user_login.php">Log In</a>';
                        }
                        ?>
                        <a href="../admin_site/login_page.php">Continue as Admin</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <h3 style="text-align: center;">Delivery Address</h3>

        <form action="index.php" method="post" onsubmit="return redirectToIndex()">
            <div class="form-group">
                <label for="HouseNo">House No:</label>
                <input type="text" name="fname" required>
            </div>
            <div class="form-group">
                <label for="Street">Street :</label>
                <input type="text" name="lname" required>
            </div>
            <div class="form-group">
                <label for="landmark">Landmark:</label>
                <input type="text" name="land" required>
            </div>
            <div class="form-group">
                <label for="Area">Area :</label>
                <input type="text" name="area" required>
            </div>

            <div class="form-group">
                <label for="District">District:</label>
                <input type="text" name="dis" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Place Order" class="submit">
            </div>

        </form>
    </div>


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

    <script>
        function redirectToIndex() {
            // You can add any additional logic here before redirection
            alert('Order placed successfully!'); // You can remove this line
            window.location.href = 'confirmation.php';
            return false; // Prevent form submission (if needed)
        }
    </script>
</body>

</html>