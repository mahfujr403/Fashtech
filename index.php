<?php

$conn = new  mysqli('localhost', 'root', '', 'product');
$sql_featured = "SELECT * FROM all_products";
$item  = $conn->query($sql_featured);

require_once("get_cart.php");
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
    <a href="index.php"><img src="img/logo.png" class="logo" alt /></a>

    <div>
      <ul id="navbar">
        <li>
          <a class="active" href="index.php"> Home</a>
        </li>
        <li><a href="shop.php"> Shop</a></li>
        <li><a href="blog.php"> Blog</a></li>
        <li><a href="about.php"> About</a></li>
        <li><a href="contact.php"> Contact</a></li>
        <li>
          <a href="cart.php">
            <i class="fa-solid fa-bag-shopping"></i>
            <?php
            if ($cartItemCount > 0) {
              echo '<span class="count">' . $cartItemCount . '</span>';
            }
            ?>
          </a>
        </li>
        <li class="admin-panel-container">
          <a href="#">
            <img src="img/people/1.png" width="35px">
          </a>
          <div class="admin-dropdown">
            <a href="admin_panel.php">Continue as Admin</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <a href="shop.php"><button>Shop Now</button></a>
  </section>

  <section id="feature" class="section-p1">
    <div class="fe-box">
      <img src="img\features\f1.png" alt="" />
      <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
      <img src="img\features\f2.png" alt="" />
      <h6>Online Order</h6>
    </div>
    <div class="fe-box">
      <img src="img\features\f3.png" alt="" />
      <h6>Save Moneyg</h6>
    </div>
    <div class="fe-box">
      <img src="img\features\f4.png" alt="" />
      <h6>Promotions</h6>
    </div>
    <div class="fe-box">
      <img src="img\features\f5.png" alt="" />
      <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
      <img src="img\features\f6.png" alt="" />
      <h6>F24/7 Support</h6>
    </div>

  </section>

  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">

      <?php
      $p = 1;
      while ($row = mysqli_fetch_assoc($item)) {
        if ($p > 8) {
          break;
        }
        $p++;
      ?>
        <div class="pro">
          <img onclick="window.location.href='sproduct.php?id=<?php echo $row["id"] ?>'" src="img\products\<?php echo $row["image"] ?>" alt="" />
          <div onclick="window.location.href='sproduct.php'" class="des">
            <span><?php echo $row["brand"] ?></span>
            <h5><?php echo $row["name"] ?></h5>
            <div class="star">
              <?php
              $rating =  $row["rating"];
              for ($x = 1; $x <= $rating; $x++) {
              ?>
                <i class="fa-solid fa-star"></i>
              <?php
              }
              ?>
              <?php
              $rating =  $row["rating"];
              for ($x = $rating + 1; $x <= 5; $x++) {
              ?>
                <i class="fa-regular fa-star"></i>
              <?php
              }
              ?>
            </div>
            <h4>৳<?php echo $row["price"] ?></h4>
          </div>
          <button class="add normal" data-id="<?php echo $row["id"] ?>" data-name="<?php echo $row["name"] ?>" data-brand="<?php echo $row["brand"] ?>" data-image="<?php echo $row["image"] ?>" data-price="<?php echo $row["price"] ?>" data-rating="<?php echo $row["rating"] ?>">Add to Cart</button>

        </div>
      <?php

      }
      ?>

    </div>
  </section>

  <section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Upto <span>70% Off</span> - All t-shirt & Accessories</h2>
    <button class="normal">Explore More</button>
  </section>

  <section id="product1" class="section-p1">
    <h2>New Arraivals</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">

      <?php
      mysqli_data_seek($item, 8);
      while ($row = mysqli_fetch_assoc($item)) {
      ?>
        <div class="pro">
          <img onclick="window.location.href='sproduct.php?id=<?php echo $row["id"] ?>'" src="img\products\<?php echo $row["image"] ?>" alt="" />
          <div onclick="window.location.href='sproduct.php'" class="des">
            <span name="add_brand"><?php echo $row["brand"] ?></span>
            <h5><?php echo $row["name"] ?></h5>
            <div class="star">
              <?php
              $rating =  $row["rating"];
              for ($x = 1; $x <= $rating; $x++) {
              ?>
                <i class="fa-solid fa-star"></i>
              <?php
              }
              ?>
              <?php
              $rating =  $row["rating"];
              for ($x = $rating + 1; $x <= 5; $x++) {
              ?>
                <i class="fa-regular fa-star"></i>
              <?php
              }
              ?>
            </div>
            <h4>৳<?php echo $row["price"] ?></h4>
          </div>
          <button class="add normal" data-id="<?php echo $row["id"] ?>" data-name="<?php echo $row["name"] ?>" data-brand="<?php echo $row["brand"] ?>" data-image="<?php echo $row["image"] ?>" data-price="<?php echo $row["price"] ?>" data-rating="<?php echo $row["rating"] ?>">Add to Cart</button>
        </div>

      <?php
      }
      ?>
    </div>
  </section>

  <section id="sm-banner" class="section-p1">
    <div class="banner-box">
      <h4>crazy deals</h4>
      <h2>buy 1 & get 1 free</h2>
      <span>The best classic dress in on sale at Fashtech</span>
      <button class="white">Lern More</button>
    </div>
    <div class="banner-box banner-box2">
      <h4>Spring/Summer</h4>
      <h2>Upcoming Season</h2>
      <span>The best classic dress in on sale at Fashtech</span>
      <button class="white">Collections</button>
    </div>
  </section>

  <section id="banner3">
    <div class="banner-box">
      <h2>Seasonal Sale</h2>
      <h3>Winter Collection 50% OFF</h3>
    </div>

    <div class="banner-box banner-box2">
      <h2>New Footwear Collection</h2>
      <h3>Spring/Summer 2023</h3>
    </div>

    <div class="banner-box banner-box3">
      <h2>T-Shirt</h2>
      <h3>New trendy Prints</h3>
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
      <img src="img/logo.png" class="logo" />
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
      <a href="about.php">About us</a>
      <a href="#">Delivary Information</a>
      <a href="#">Privacy ploicy</a>
      <a href="#">Trams & contidions</a>
      <a href="contact.php">Contact us</a>
    </div>

    <div class="col">
      <h4>My Account</h4>
      <a href="#">Sign In</a>
      <a href="cart.php">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Track my order</a>
      <a href="#">Help</a>
    </div>

    <div class="col install">
      <h4>Install app</h4>
      <p>From App Store or Google Play</p>
      <div class="row">
        <img src="img/pay/app.jpg" />
        <img src="img/pay/play.jpg" />
      </div>
      <div>
        <p>Secured payment gateway</p>
        <img src="img/pay/pay.png" />
      </div>
    </div>
  </footer>


  <script src="sendtoserver.js"></script>
  <script src="get_cart.js"></script>

</body>

</html>