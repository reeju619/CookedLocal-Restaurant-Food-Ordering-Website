<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Get the password from form input
    $hobbies = $_POST['hobbies'];
    $likes = $_POST['likes'];
    $profile_image = $_FILES['profile_image']['name'];
    $target = "profile-images/" . basename($profile_image);

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO buyer (name, email, password, hobbies, likes, profile_image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $hobbies, $likes, $profile_image);
    $stmt->execute();

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
        echo "<script>alert('Registration successful.'); window.location.href='buyer-login.php';</script>";
    } else {
        echo "<script>alert('Failed to upload profile image.'); window.location.href='buyer-profile.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>