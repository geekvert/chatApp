<?php
$username=$_POST["username"];
$about=$_POST["about"];
$age=$_POST["age"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$education=$_POST["education"];
$address=$_POST["address"];

$empty=empty($about) or empty($age) or empty($email) or empty($mobile) or empty($education) or empty($address);
if ($empty) {
    die("empty error");
}

require ("./connection.php");
$update="UPDATE rahul_users SET email='$email',mobile='$mobile',education='$education',address='$address',age='$age',about='$about' WHERE username='$username';";
//echo $update;
if ($conn->query($update)) {
    echo "working";
}
else {
    die("server error");
}
//checking for profilePic availibility
$pro="SELECT profilePic from rahul_profiles WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
$proRes=($conn->query($pro)->fetch_assoc());
if (!empty($proRes["profilePic"])) {
    $complete="YES";
    echo "dashboard";
}
else {
    die("empty error");
}
$completion="UPDATE rahul_profiles SET complete='$complete' WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
$conn->query($completion);
?>