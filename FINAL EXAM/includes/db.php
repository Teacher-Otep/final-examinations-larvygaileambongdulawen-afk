<?php
// Database connection settings
$host = "localhost";      // XAMPP default host
$user = "root";           // XAMPP default user
$pass = "";               // XAMPP default password (empty string)
$db   = "dbstudents";     // Your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
