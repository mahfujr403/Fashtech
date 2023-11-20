    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect form data
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if passwords match
        if ($password != $confirmPassword) {
            $message = "Passwords do not match.";
        } else {
            // Hash the password (you should use a more secure hashing method)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'author');

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the email address is already registered 
            $checkEmailQuery = "SELECT * FROM admin_info WHERE email = '$email'";
            $checkEmailResult = $conn->query($checkEmailQuery);

            if ($checkEmailResult->num_rows > 0) {
                $message = "Email address is already registered.";
            } else {
                // Insert user data into the database
                $insertQuery = "INSERT INTO admin_info (email, password) VALUES ('$email', '$hashedPassword')";
                if ($conn->query($insertQuery) === TRUE) {
                    $message = "Registration successful!";
                    header("location:login_page.php??message=Registration Successful");
                    exit; 
                } else {
                    echo "Error: " . $insertQuery . "<br>" . $conn->error;
                }
            }

            // Close the database connection
            $conn->close();
        }
    }
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="author.css"> <!-- Create a separate CSS file for styling -->
        <title>Admin Register</title>
    </head>

    <body>

        <div class="container">
            <h2>Register Now</h2>
            <?php if (!empty($message)) : ?>
                <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="register_page.php" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Register" class="submit">
                </div>

                <p>Already have an account? <a href="login_page.php">Login now!</a></p>
            </form>
        </div>
                <script src="popupmessage.js"></script>
    </body>

    </html>