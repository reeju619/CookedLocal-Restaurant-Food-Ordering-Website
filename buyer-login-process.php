<?php
session_start(); // Start the session at the very beginning
include 'db_connect.php'; // Ensure this file includes your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email exists in the database
    $query = "SELECT buyer_id, password FROM buyer WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to home page
            $_SESSION['logged_in'] = true;
            $_SESSION['buyer_id'] = $row['buyer_id'];
            header("Location: http://localhost/cookedlocal/");
            exit();
        } else {
            // Password is not correct
            echo "<script>alert('Invalid password.'); window.location.href='buyer-login.php';</script>";
        }
    } else {
        // Email does not exist
        echo "<script>alert('Invalid email.'); window.location.href='buyer-login.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>