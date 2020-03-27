<?php
$servername = "localhost";
$user = "first_year";
$pass = "first_year";
$dbname = "first_year";

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("error connecting to the Database: " . $conn->connect_error);
}
?>