<?php
//print_r($_FILES["images"]);
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}

require ("./connection.php");
if (!empty($_FILES["images"])) {
    $target_file="profile/".basename($_FILES["images"]["name"][0]);
    $fileType=strtolower(pathinfo(basename($_FILES["images"]["name"][0]),PATHINFO_EXTENSION));
    if ($fileType=="jpg" || $fileType=="png" || $fileType=="jpeg") {
        if (move_uploaded_file($_FILES["images"]["tmp_name"][0], $target_file)) {
            echo "successfully uploaded";
        }
        $fileName=basename( $_FILES["images"]["name"][0]);
        
        $insertPic="UPDATE rahul_profiles SET profilePic='$fileName' WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
        $conn->query($insertPic);
    }
    else {
        die("only images are allowed.");
    }
}
else {
    die("image not available");
}
//checking for info availibility.
$check="SELECT * FROM rahul_users WHERE username='$username';";
$result=$conn->query($check)->fetch_assoc();
foreach ($result as $key => $value) {
    if (empty($value)) {
        $complete="NO";
    }
}
if ($complete=="NO") {
    echo "empty error";
}
else if ($complete=="YES") {
    echo "dashboard";
}
$completion="UPDATE rahul_profiles SET complete='$complete' WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
$conn->query($completion);
?>