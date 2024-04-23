<?php
// Connection to the database
include 'db_connect.php'; // Make sure this file has your database connection setup

// Fetch all restaurants to populate the dropdown
$restaurantQuery = "SELECT restaurant_id, name FROM restaurants";
$restaurantResult = $conn->query($restaurantQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $restaurant_id = $_POST['restaurant_id'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    // SQL query to insert data into dishes table
    $query = "INSERT INTO dishes (restaurant_id, name, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isds", $restaurant_id, $name, $price, $image);
    $stmt->execute();

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image uploaded successfully";
    } else {
        echo "Failed to upload image";
    }

    $stmt->close();
    $conn->close();
}
?>

<html>

<head>
    <title>Add Dish</title>
</head>

<body>
    <h1>Add a New Dish</h1>
    <form method="post" enctype="multipart/form-data">
        Restaurant:
        <select name="restaurant_id" required>
            <?php while ($row = $restaurantResult->fetch_assoc()): ?>
                <option value="<?php echo $row['restaurant_id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select><br>
        Name: <input type="text" name="name" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        Image: <input type="file" name="image" required><br>
        <input type="submit" value="Add Dish">
    </form>
</body>

</html>