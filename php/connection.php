<?php
$servername = "localhost";
$user = "rahul";
$pass = "rahul";
$dbname = "first_year";

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("error connecting to the Database: " . $conn->connect_error);
}
?>