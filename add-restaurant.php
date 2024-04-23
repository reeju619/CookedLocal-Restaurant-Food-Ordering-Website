<?php
session_start();
include 'db_connect.php';

// Check if the user_id session variable is set
if (!isset($_SESSION['user_id'])) {
    die("Session data not found, please log in again.");
}

echo "User ID: " . $_SESSION['user_id']; // Debugging line to display user_id

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);
    $owner_id = $_SESSION['user_id'];

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $query = "INSERT INTO restaurants (name, description, image, owner_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $name, $description, $image, $owner_id);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Restaurant added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Failed to upload image";
    }
}
?>


<html>

<head>
    <title>Add Restaurant</title>
    <link rel="stylesheet" href="add-restaurant.css">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <h1>Add a New Restaurant</h1>
        Name: <input type="text" name="name" required><br>
        Description: <textarea name="description" required></textarea><br>
        Image: <input type="file" name="image" required><br>
        <input type="submit" value="Add Restaurant">
        <p><a href="seller-profile.php" class="back-button">Go Back</a></p>
    </form>
    <!-- Go Back Link -->

</body>

</html>