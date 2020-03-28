<?php
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}
function sanitize($data) {
	$data = trim($data);
	//$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
$receiver=sanitize($_POST["receiver"]);
$message=sanitize($_POST["message"]);
echo $receiver;
echo $message;

require ("./connection.php");
//getting ids of sender and receiver
$q1="SELECT id FROM rahul_users WHERE username='$username';";
$sender_id=$conn->query($q1)->fetch_assoc()["id"];
$q2="SELECT id FROM rahul_users WHERE username='$receiver';";
$receiver_id=$conn->query($q2)->fetch_assoc()["id"];

echo $sender_id;
echo $receiver_id;

$insMess="INSERT INTO rahul_messages(sender_id, receiver_id, message) VALUES('$sender_id', '$receiver_id', '$message');";
echo $insMess;	
if($conn->query($insMess)) {
	echo "success";
	header("Location: ./dashboard.php");
}
else {
	header("Location: ./error.php");
}
?>