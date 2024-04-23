<?php
session_start();
include 'db_connect.php';

// Check if already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: seller-profile.php');
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Fetch user from the database
        $query = "SELECT user_id, password FROM sellers WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                header('Location: seller-profile.php');
                exit;
            } else {
                $error = 'Invalid password.';
            }
        } else {
            $error = 'No user found with that username.';
        }
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="seller-login.css">
</head>

<body>
    <div class="container">
        <h1>Seller Login</h1>
        <form action="seller-login.php" method="post">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
        <?php if ($error): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <a href="seller-register.php">Not registered? Register here.</a>
    </div>
</body>

</html>