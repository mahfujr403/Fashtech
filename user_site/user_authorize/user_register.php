    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password != $confirmPassword) {
            $message = "Passwords do not match.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $conn = new mysqli('localhost', 'root', '', 'author');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $checkEmailQuery = "SELECT * FROM user_info WHERE email = '$email'";
            $checkEmailResult = $conn->query($checkEmailQuery);

            if ($checkEmailResult->num_rows > 0) {
                $message = "Email address is already registered.";
            } else {

                $insertQuery = "INSERT INTO user_info (first_name, last_name, email, contact, password) VALUES ('$fname','$lname', '$email', '$contact', '$hashedPassword')";
                if ($conn->query($insertQuery) === TRUE) {
                    $message = "Registration successful!";
                    header("location:user_login.php??message=Registration Successful");
                    exit;
                } else {
                    echo "Error: " . $insertQuery . "<br>" . $conn->error;
                }
            }

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
        <link rel="stylesheet" href="../../admin_site/author.css">
        <title>User Register</title>
    </head>

    <body>

        <div class="container">
            <h2>Register Now</h2>
            <?php if (!empty($message)) : ?>
                <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="user_register.php" method="post">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" required>
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contact">Contact No:</label>
                    <input type="number" name="contact" required>
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

                <p>Already have an account? <a href="user_login.php">login</a></p>
            </form>
        </div>
        <script src="../../admin_site/popupmessage.js"></script>
    </body>

    </html>