<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Login</title>
    <link rel="stylesheet" href="buyer-login.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="buyer-login-process.php" method="post">
            Email: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>