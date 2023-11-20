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
                <a href="admin_panel.php">
                    <i class="fa-solid fa-box"></i>
                    <span class="links_name"> Manage Product</span>
                </a>
                <span class="tooltip">Manage Product</span>
            </li>
            <li>
                <a href="add.php" class="active">
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
                <a href="logout.php">
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
        <h3>Add New Record</h3>
            <form class="post-form" action="savedata.php" method="post">

                <div class="form-group">
                    <label>Image</label>
                    <input type="text" name="pimage" required />
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="pbrand" required />
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="pname" required />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="pprice" required />
                </div>
                <div class="form-group">
                    <label>Rating</label>
                    <input type="text" name="prating" required />
                </div>
                <input class="submit" type="submit" value="Save" />
            </form>
    </div>

    <script src="navbar.js"></script>

</body>

</html>