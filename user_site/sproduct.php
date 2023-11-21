<?php

// Establish a database connection
$conn = new mysqli('localhost', 'root', '', 'product');

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Retrieve the product ID from the URL parameter
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Fetch product details from the database based on the product ID
  $sql_product = "SELECT * FROM all_products WHERE id = $product_id";
  $result_product = $conn->query($sql_product);

  if ($result_product->num_rows > 0) {
    $product = $result_product->fetch_assoc();
  } else {
    // Handle the case when the product is not found
    echo "Product not found!";
  }
} else {
  // Handle the case when the ID parameter is not set
  echo "Product ID not provided!";
}




$conn = new  mysqli('localhost', 'root', '', 'product');

$sql_featured = "SELECT * FROM all_products";
$item  = $conn->query($sql_featured);


require_once("get_cart.php")

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
        <li><a class="active" href="shop.php"> Shop</a></li>
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
      </ul>
    </div>
  </section>

  <section id="prodetails" class="section-p1">
    <div class="single-pro-img">
      <img src="../img/products/<?php echo $product["image"]; ?>" width="100%" height="70%" id="MainImg" />
      <!-- ... other product images ... -->
      <div class="small-img-group">
        <div class="small-img-col">
          <img src="../img/products/f1.jpg" width="100%" height="70%" class="small-img" />
        </div>
        <div class="small-img-col">
          <img src="../img/products/f2.jpg" width="100%" height="70%" class="small-img" />
        </div>
        <div class="small-img-col">
          <img src="../img/products/f3.jpg" width="100%" height="70%" class="small-img" />
        </div>
        <div class="small-img-col">
          <img src="../img/products/f4.jpg" width="100%" height="70%" class="small-img" />
        </div>
      </div>
    </div>

    <div class="single-pro-details">
      <h6><?php echo $product["brand"]; ?></h6>
      <h4><?php echo $product["name"]; ?></h4>
      <h2>৳<?php echo $product["price"]; ?></h2>
      <!-- ... other product details ... -->
      <select>
        <option>Select Size</option>
        <option>S</option>
        <option>M</option>
        <option>L</option>
        <option>XL</option>
        <option>XXL</option>
        <option>XXXL</option>
      </select>
      <h4>Product Details</h4>
      <span>Premium Quality Sports t-shirts are smooth and comfortable. The
        t-shirts are made with the finest quality polyester fabric, perfect
        for casual or sports wear. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum libero deserunt nihil labore itaque autem aliquid alias asperiores sapiente ipsa, amet et velit, doloremque possimus quod nesciunt, exercitationem suscipit delectus?</span>

      <button class="add normal" data-id="<?php echo $product["id"] ?>" data-name="<?php echo $product["name"] ?>" data-brand="<?php echo $product["brand"] ?>" data-image="<?php echo $product["image"] ?>" data-price="<?php echo $product["price"] ?>" data-rating="<?php echo $product["rating"] ?>">Add to Cart</button>
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
          <img onclick="window.location.href='sproduct.php?id=<?php echo $row["id"] ?>'" src="../img/products/<?php echo $row["image"] ?>" alt="" />
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

  <script src="get_cart.js"></script>
  <script src="sproduct.js"></script>
  <script src="sendtoserver.js"></script>


</body>

</html>