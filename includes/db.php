<?php
$host = 'localhost'; 
$db   = 'dbstudent';  
$user = 'root';        
$pass = "";            
$port = '3306';        
$charset = 'utf8mb4';


// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
