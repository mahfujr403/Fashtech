<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'author');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user data from the database
    $sql = "SELECT * FROM admin_info WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            header("location:admin_panel.php");
        } else {
            $message = "Incorrect Password";
        }
    } else {
        $message = "User not found.";
    }
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<div class='update-message'><span id='close-message'>&times;</span><P>$message</P></div>";
        unset($_GET['message']);
    }


    $conn->close();
}
// Close the database connection
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="author.css">
    <title>Admin Login</title>
</head>

<body>

    <div class="container">
        <?php if (!empty($message)) : ?>
            <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="login_page.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" class="submit">
            </div>
            <p>don't have an account? <a href="register_page.php">register now!</a></p>
        </form>

    </div>
    <script src="popupmessage.js"></script>
</body>

</html>