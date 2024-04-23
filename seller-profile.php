<?php
session_start();
include 'db_connect.php';

// Ensure the seller is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: seller-login.php');
    exit;
}

// Fetch the seller's user ID from session
$seller_id = $_SESSION['user_id'];

// Fetch restaurants owned by the seller
$query = "SELECT * FROM restaurants WHERE owner_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $seller_id);
$stmt->execute();
$restaurants = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="seller-profile.css">
</head>

<body>

    <div class="container">
        <h1>Your Restaurant</h1>
        <?php if ($restaurants->num_rows > 0): ?>
            <?php while ($restaurant = $restaurants->fetch_assoc()): ?>
                <div class="restaurant">
                    <h2><?php echo htmlspecialchars($restaurant['name']); ?></h2>
                    <p><?php echo htmlspecialchars($restaurant['description']); ?></p>
                    <img src="images/<?php echo htmlspecialchars($restaurant['image']); ?>" alt="Restaurant Image"
                        style="width: 200px; height: auto;">
                    <h3>Dishes</h3>
                    <ul>
                        <?php
                        $dishes_query = "SELECT * FROM dishes WHERE restaurant_id = ?";
                        $dishes_stmt = $conn->prepare($dishes_query);
                        $dishes_stmt->bind_param("i", $restaurant['restaurant_id']);
                        $dishes_stmt->execute();
                        $dishes_result = $dishes_stmt->get_result();
                        while ($dish = $dishes_result->fetch_assoc()):
                            ?>
                            <li>
                                <?php echo htmlspecialchars($dish['name']) . " - $" . htmlspecialchars($dish['price']); ?>
                                <img src="dishes/<?php echo htmlspecialchars($dish['image']); ?>" alt="Dish Image"
                                    style="width: 100px;">
                            </li>
                        <?php endwhile;
                        $dishes_stmt->close(); ?>
                    </ul>
                    <form action="add-dish.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="restaurant_id" value="<?php echo $restaurant['restaurant_id']; ?>">
                        Dish Name: <input type="text" name="name" required><br>
                        Price: <input type="number" name="price" required step="0.01"><br>
                        Image: <input type="file" name="image"><br>
                        <input type="submit" value="Add Dish">
                    </form>
                </div>
            <?php endwhile; ?>
            <?php $stmt->close(); ?>
        <?php else: ?>
            <p>No restaurant found. <a href="add-restaurant.php">Add your first restaurant.</a></p>
        <?php endif; ?>
        <div class="logout">
            <button onclick="window.location.href='logout.php'">Logout</button>
        </div>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>{$_SESSION['message']}</p>";
            unset($_SESSION['message']); // Clear the message after displaying
        }
        ?>
    </div>
    <div class="course-invitation">
        <h2>Level 2 Food Hygiene and Safety for Catering Course</h2>
        <button onclick="registerForCourse()">Click here to participate</button>
    </div>

    <script>

        function registerForCourse() {
            alert("We will contact you soon, thank you!");
        }
    </script>
</body>

</html>