<?php
$username=$_POST["username"];
$about=$_POST["about"];
$age=$_POST["age"];
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$education=$_POST["education"];
$address=$_POST["address"];

$empty=empty($about) or empty($age) or empty($email) or empty($mobile) or empty($education) or empty($address);
echo $username+" "+$about+" "+$age+" "+$email+" "+$mobile+" "+$education+" "+$address;
if ($empty) {
    die("empty error");
}
require ("./connection.php");
$update="UPDATE rahul_users SET email='$email',mobile='$mobile',education='$education',address='$address',age='$age',about='$about' WHERE username='$username';";
$conn->query($update);

$check="SELECT * FROM rahul_users INNER JOIN rahul_profiles ON rahul_users\.id=rahul_profiles\.user_id WHERE username='$username';";
$result=$conn->query($check)->fetch_assoc();
foreach ($result as $key => $value) {
    if (empty($value)) {
        $check="NO";
    }
}
if ($check=="NO") {
    echo "empty error02";
}
else {
    $check="YES";
}
echo "chal gaya";
if (!empty($_FILES["images"]["name"])) {
    $target_file="./profile/".basename($_FILES["image"]["name"]);
    $fileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($fileType!="jpg"||$fileType!="png"||$fileType!="jpeg") {
        die("only images are allowed.");
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $fileName=basename( $_FILES["image"]["name"]);

    $insertPic="UPDATE rahul_profiles SET profilePic='$fileName',complete='$check' WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
    $conn->query($insertPic);
}
$final_check="SELECT complete FROM rahul_profiles WHERE user_id=(SELECT id from rahul_users WHERE username='$username');";
$res=($conn->query($final_check)->fetch_assoc());
if ($res["complete"]=="YES") {
    header("Location: ./dashboard.php");
}
else {
    die("empty error");
}
?>