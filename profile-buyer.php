<?php
session_start();
include 'db_connect.php'; // Make sure to include the database connection file

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: buyer-login.php');
    exit;
}

// Fetch user details from the database
$buyer_id = $_SESSION['buyer_id'];
$query = "SELECT * FROM buyer WHERE buyer_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $buyer_id);
$stmt->execute();
$result = $stmt->get_result();
$buyer = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile-buyer.css"> <!-- Link to the CSS file -->
</head>

<body>
    <div class="container">
        <h1>Profile Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Hobbies</th>
                    <th>Likes</th>
                    <th>Profile Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($buyer['name']); ?></td>
                    <td><?php echo htmlspecialchars($buyer['email']); ?></td>
                    <td><?php echo htmlspecialchars($buyer['hobbies']); ?></td>
                    <td><?php echo htmlspecialchars($buyer['likes']); ?></td>
                    <td><img src="profile-images/<?php echo htmlspecialchars($buyer['profile_image']); ?>"
                            alt="Profile Image" style="width: 100px; height: auto;"></td>

                    <td>
                        <a href="edit-buyer.php">Edit</a>
                        <a href="change-password.php">Change Password</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <button onclick="window.location.href='logout.php'">Logout</button>
    </div>
</body>

</html>