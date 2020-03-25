<?php
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}
$imageSource="../assets/profile/avatar.png";
require("./connection.php");
$getData="SELECT * FROM rahul_users WHERE username='$username'";
//$result=$conn->query($getData);
//$row=$result->fetch_assoc();
$about=" imgian hai";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username." | R chat"; ?></title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class="container img">
        <div class="img">
            <img src=<?php echo $imageSource; ?> alt="profile picture" width="150px" height="150px">
            <div class="name"><?php echo $name; ?></div>
        </div>
        <div class="box"><span>Username</span>:<?php echo $username; ?></div>
        <div class="box"><span>About</span>: <input readonly value=<?php echo ($about); ?>> </div>
        <div class="box"><span>Age</span>:<?php echo $age." Years"; ?></div>
        <div class="box"><span>E-mail</span>:<?php echo $email; ?></div>
        <div class="box"><span>Mobile</span>:<?php echo $mobile; ?></div>
        <div class="box"><span>Education</span>:<?php echo $education; ?></div>
        <div class="box"><span>Address</span>:<?php echo $address; ?></div>
    </div>
</body>
</html>