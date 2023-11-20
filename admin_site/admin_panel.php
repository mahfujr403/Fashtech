<?php

$conn = mysqli_connect("localhost", "root", "", "product") or die("Connection failed");

$sql = "SELECT * FROM all_products";
$result = mysqli_query($conn, $sql) or die("QUery Unsessful");

$sql_cart = "SELECT * FROM cart";
$cartItem  = $conn->query($sql_cart);


if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo "<div class='update-message'><span id='close-message'>&times;</span><P>$message</P></div>";
    unset($_GET['message']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_product.css" />
    <link rel="stylesheet" href="../user_site/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" />
</head>

<body>
    <div class="sidebar active">
        <div class="logo_content">
            <a href="../user_site/index.php">
                <div class="logo">
                    <div class="logo_name"><img src="../img/logo.png" /></div>
                </div>
            </a>
            <i class="fa-solid fa-ellipsis" id="btn"></i>
        </div>

        <ul class="nav_list">
            <li>
                <a href="admin_panel.php" class="active">
                    <i class="fa-solid fa-box"></i>
                    <span class="links_name"> Manage Product</span>
                </a>
                <span class="tooltip">Manage Product</span>
            </li>
            <li>
                <a href="add.php">
                    <i class="fa-solid fa-square-plus"></i>
                    <span class="links_name">Add Product</span>
                </a>
                <span class="tooltip">Add Product</span>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span class="links_name">Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-cart-arrow-down"></i>
                    <span class="links_name">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-message"></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-user-check"></i>
                    <span class="links_name">Employees</span>
                </a>
                <span class="tooltip">Employees</span>
            </li>

            <li>
                <a href="#">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="links_name">Accounts</span>
                </a>
                <span class="tooltip">Accounts</span>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="links_name">Sign Out</span>
                </a>
                <span class="tooltip">Sign Out</span>
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


    <div class="home_content">
        <h2>Admin Panel</h2>
        <section class="display-product-table">

            <table>
                <thead>
                    <th>Image</th>
                    <th>product brand</th>
                    <th>product name</th>
                    <th>product price</th>
                    <th>product rating</th>
                    <th>action</th>
                </thead>

                <tbody>
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <img src="../img/products/<?php echo $row["image"] ?>" alt="">
                                </td>
                                <td><?php echo $row["brand"] ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td>৳<?php echo $row["price"] ?></td>
                                <td><?php echo $row["rating"] ?></td>
                                <td>
                                    <a href='edit.php?id=<?php echo $row["id"]; ?>'><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href='delete-inline.php?id=<?php echo $row["id"]; ?>'><i class="fa-solid fa-trash-can dlt"></i></a>
                                </td>

                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7"> <span>No item in Database</span></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </section>
    </div>



    <script src="popupmessage.js"></script>
    <script src="navbar.js"></script>
</body>



</html>