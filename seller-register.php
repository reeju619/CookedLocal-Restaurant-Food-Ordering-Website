<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];

    $query = "INSERT INTO sellers (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $email);
    if ($stmt->execute()) {
        header("Location: seller-login.php"); // Redirect to login page after successful registration
        exit();
    } else {
        echo "Error: " . $conn->error; // Handle possible errors such as duplicate username
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Seller</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Register as a Seller</h1>
        <form method="post" action="seller-register.php">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            Email: <input type="email" name="email" required><br>
            <input type="submit" value="Register">
        </form>
        <a href="seller-login.php">Already registered? Login here.</a>
    </div>

</body>

</html>