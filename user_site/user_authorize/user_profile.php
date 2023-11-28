<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../admin_site/admin_product.css">
    <link rel="stylesheet" href="../../admin_site/author.css">

    <title>User Profile</title>
</head>

<body>
    <header id="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav id="navbar">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Profile <span class="count">3</span></a></li>
                <li class="admin-panel-container">
                    <div class="admin-panel">Admin Panel</div>
                    <div class="admin-dropdown">
                        <a href="#">Dashboard</a>
                        <a href="#">Orders</a>
                        <a href="#">Settings</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="user-profile">
            <h1>User Profile</h1>
            <div class="profile-info">
                <img src="user-avatar.jpg" alt="User Avatar" class="avatar">
                <div class="user-details">
                    <h2>John Doe</h2>
                    <p>Email: john.doe@example.com</p>
                    <p>Phone: +123 456 789</p>
                </div>
            </div>
            <div class="change-password">
                <h4>Change Password</h4>
                <form action="#">
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" name="current-password" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="new-password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                    <button type="submit" class="normal">Update Password</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <!-- Your footer content here -->
    </footer>
</body>

</html>