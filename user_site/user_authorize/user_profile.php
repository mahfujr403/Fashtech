<?php
// Assume you have a session started and user information available
session_start();
$userFirstName = "John"; // Replace with the actual user's first name
$userLastName = "Doe";  // Replace with the actual user's last name
$userEmail = "john.doe@example.com";  // Replace with the actual user's email
$userContactNumber = "123-456-7890";  // Replace with the actual user's contact number
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="admin_product.css" />
    <link rel="stylesheet" href="../../admin_site/admin_product.css">
    <link rel="stylesheet" href="../../admin_site/author.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
</head>


<body>

    <div class="sidebar active">
        <div class="logo_content">
            <a href="../index.php">
                <div class="logo">
                    <div class="logo_name"><img src="../../img/logo.png" /></div>
                </div>
            </a>
            <i class="fa-solid fa-ellipsis" id="btn"></i>
        </div>

        <ul class="nav_list">
            <li>
                <a href="../index.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="links_name"> Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="#" class="active">
                    <i class=" fa-solid fa-user"></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-cart-arrow-down"></i>
                    <span class="links_name">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>


            <li>
                <a href="../../admin_site/logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>


            <li>
                <div>
                    <a href="#">
                        <img src="../img/people/1.png" width="50px" alt="">
                        <span class="links_name">Mahfuj</span>
                    </a>
                    <span class="tooltip">Mahfuj</span>
                </div>
            </li>
        </ul>
    </div>
    <div class="user-profile">
        <div class="user-details">
            <p><strong>First Name:</strong> <?php echo $userFirstName; ?></p>
            <p><strong>Last Name:</strong> <?php echo $userLastName; ?></p>
            <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
            <p><strong>Contact Number:</strong> <?php echo $userContactNumber; ?></p>
        </div>
    </div>

    <!-- Your page content goes here -->

</body>

</html>