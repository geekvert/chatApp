<?php
$servername = "localhost";
$username = "first_year";
$password = "first_year";
$dbname = "first_year";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  
?>