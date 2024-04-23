<?php
// Database configuration settings
$host = 'localhost'; // or your host, e.g., IP address or hostname
$username = 'root'; // your database username
$password = ''; // your database password
$database = 'cookedlocal'; // your database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can set the charset, it's good for handling UTF-8 data
$conn->set_charset("utf8");

// If you plan to use this file for RESTful APIs or public endpoints,
// consider handling errors more gracefully and securely.
?>