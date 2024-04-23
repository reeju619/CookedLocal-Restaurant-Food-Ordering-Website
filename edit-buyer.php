<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: buyer-login.php');
    exit;
}

$buyer_id = $_SESSION['buyer_id'];
$buyer = array();  // Initialize buyer array

// Fetch existing data from the database
if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM buyer WHERE buyer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $buyer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $buyer = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hobbies = $_POST['hobbies'];
    $likes = $_POST['likes'];

    if (!empty($_FILES['profile_image']['name'])) {
        $profile_image = $_FILES['profile_image']['name'];
        $target = "profile-images/" . basename($profile_image);
        if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
            echo "Failed to upload new image.";
            $profile_image = $buyer['profile_image']; // Fallback to old image if upload fails
        }
    } else {
        $profile_image = $buyer['profile_image']; // Use the old image if no new image is uploaded
    }

    $query = "UPDATE buyer SET name=?, email=?, hobbies=?, likes=?, profile_image=? WHERE buyer_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $name, $email, $hobbies, $likes, $profile_image, $buyer_id);
    if ($stmt->execute()) {
        header("Location: profile-buyer.php");  // Redirect on successful update
        exit;
    } else {
        echo "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit-buyer.css">
</head>

<body>
    <div class="container">
        <h1>Edit Your Profile</h1>
        <form method="post" enctype="multipart/form-data">
            Name: <input type="text" name="name" value="<?= htmlspecialchars($buyer['name']) ?>" required><br>
            Email: <input type="email" name="email" value="<?= htmlspecialchars($buyer['email']) ?>" required><br>
            Hobbies: <input type="text" name="hobbies" value="<?= htmlspecialchars($buyer['hobbies']) ?>" required><br>
            Likes: <input type="text" name="likes" value="<?= htmlspecialchars($buyer['likes']) ?>" required><br>
            Profile Image: <input type="file" name="profile_image"><br>
            Current Image: <img src="profile-images/<?= htmlspecialchars($buyer['profile_image']) ?>"
                alt="Current Profile Image" style="width: 100px;"><br>
            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>

</html>