<?php
$username=$_POST["username"];
require ("./connection.php");
$validaton="SELECT * FROM rahul_users WHERE username LIKE '$username';";
$result=$conn->query($validaton)->fetch_assoc();
if (empty($result)) {
    die("noUserExists");
}
else {
    die("userExists");
}
?>