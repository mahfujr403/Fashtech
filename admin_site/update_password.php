<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userEmail = $_POST['user_email'];
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    $conn = new mysqli('localhost', 'root', '', 'author');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($newPassword != $confirmPassword) {
        $message = "Passwords do not match.";
    } else {
        $sql = "SELECT * FROM admin_info WHERE email = '$userEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($oldPassword, $row['password'])) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateQuery = "UPDATE admin_info SET password = '$hashedNewPassword' WHERE email = '$userEmail'";
                if ($conn->query($updateQuery) === TRUE) {
                    header("location:http://localhost:3000/admin_site/login_page.php?message=Password updated!");
                } else {
                    $message = "Error updating password: " . $conn->error;
                }
            } else {
                $message = "Incorrect old password.";
            }
        } else {
            $message = "User not found.";
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
    <link rel="stylesheet" href="author.css">
    <title>Update Password</title>
</head>

<body>

    <div class="container">
        <h2>Update Password</h2>
        <?php if (!empty($message)) : ?>
            <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="update_password.php" method="post">
            <div class="form-group">
                <label for="user_email">User Email:</label>
                <input type="email" name="user_email" required>
            </div>

            <div class="form-group">
                <label for="old_password">Old Password:</label>
                <input type="password" name="old_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Update Password" class="submit">
            </div>
        </form>
    </div>
    <script src="popupmessage.js"></script>
</body>

</html>