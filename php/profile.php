<?php
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}
require ("./connection.php");
$getData="SELECT * FROM rahul_users WHERE username='$username';";
$row=$conn->query($getData)->fetch_assoc();
//print_r($row);

$check="SELECT * FROM rahul_profiles WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
$res=$conn->query($check)->fetch_assoc();
//print_r($res);
if ($res["complete"]=="YES") {
    //header("Location: ./dashboard.php");
}
else {
    echo "<script>alert('Please complete your profile to access all features of the application!')</script>";
}
if (empty($res["profilePic"])) {
    $imageSource="../assets/avatars/avatar.png";
}
else {
    $imageSource=$res["profilePic"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username." | R chat"; ?></title>
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://kit.fontawesome.com/f6992e24ac.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container img">
        <div class="img">
            <img src=<?php echo $imageSource; ?> alt="profile picture" width="150px" height="150px"></img>
            <input class="profilePic" type="file">
            <div class="name"><?php echo $row["name"]; ?></i></div>
        </div>
        <div class="box"><span>Username</span>: <div class="field"><?php echo $row["username"]; ?></div></div>
        <div class="box"><span>Gender</span>: <?php echo $row["gender"]; ?></div>
        <div class="box"><span>About</span>: <div class="field"><?php echo $row["about"]; ?></div> <i class="fas fa-pen"></i></div>
        <div class="box"><span>Age </span>(in years): <div class="field"> <?php echo $row["age"]; ?> </div> <i class="fas fa-pen"></i></div>
        <div class="box"><span>E-mail</span>: <div class="field"><?php echo $row["email"]; ?></div><i class="fas fa-pen"></i></div>
        <div class="box"><span>Mobile</span>: <div class="field"><?php echo $row["mobile"]; ?></div><i class="fas fa-pen"></i></div>
        <div class="box"><span>Education</span>: <div class="field"><?php echo $row["education"]; ?></div><i class="fas fa-pen"></i></div>
        <div class="box"><span>Address</span>: <div class="field"><?php echo $row["address"]; ?></div><i class="fas fa-pen"></i></div>
        <button class="save">Save changes</button>
    </div>
    <script src="../js/profile.js"></script>
</body>
</html>