<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Registration</title>
    <link rel="stylesheet" href="buyer-profile.css">
</head>

<body>
    <div class="container">
        <h1>Register as Buyer</h1>
        <form action="buyer-profile-process.php" method="post" enctype="multipart/form-data">
            <div class="form-field">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-field">
                <label for="hobbies">Hobbies:</label>
                <input type="text" name="hobbies" id="hobbies" required>
            </div>
            <div class="form-field">
                <label for="likes">Likes:</label>
                <input type="text" name="likes" id="likes" required>
            </div>
            <div class="form-field">
                <label for="profile_image">Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image" required>
            </div>
            <input type="submit" value="Register">
        </form>
        <br>
        <div>
            Already registered? <a href="buyer-login.php">Login here.</a>

        </div>

</body>

</html>