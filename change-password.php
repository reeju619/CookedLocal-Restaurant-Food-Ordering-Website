<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: buyer-login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $buyer_id = $_SESSION['buyer_id'];

    $query = "UPDATE buyer SET password = ? WHERE buyer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $hashed_password, $buyer_id);
    $stmt->execute();

    echo "<script>alert('Password successfully changed.'); window.location.href='profile-buyer.php';</script>";
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="change-password.css"> <!-- Link to your CSS file -->
</head>

<body>
    <div class="container">
        <h1>Change Your Password</h1>
        <form method="post">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <input type="submit" value="Update Password">
        </form>
    </div>
</body>

</html>