<?php
session_start();
include 'db_connect.php';

// Ensure the seller is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: seller-login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input
    $restaurant_id = isset($_POST['restaurant_id']) ? intval($_POST['restaurant_id']) : 0;
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $image = $_FILES['image']['name'];
    $target = "dishes/" . basename($image);

    // Validate required inputs
    if (empty($name) || empty($price) || $restaurant_id <= 0) {
        echo "Please fill in all fields correctly.";
    } else {
        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Prepare the SQL query to insert dish data
            $query = "INSERT INTO dishes (restaurant_id, name, price, image) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("isds", $restaurant_id, $name, $price, $image);

            // Execute the query and check for success
            if ($stmt->execute()) {
                echo "Dish added successfully.";
            } else {
                echo "Error adding dish: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to upload image.";
        }
    }
}
// Redirect back to the seller-profile page after processing
$_SESSION['message'] = "Dish added successfully.";
header('Location: seller-profile.php');
exit;
?>