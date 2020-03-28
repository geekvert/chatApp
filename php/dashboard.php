<?php
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}
require ("./connection.php");
$getUserId="SELECT id FROM rahul_users WHERE username='$username';";
$userId=$conn->query($getUserId)->fetch_assoc()["id"];
function getMessages($sender_name, $receiver_name) {
    global $conn;
    $q1="SELECT * FROM rahul_users WHERE username='$sender_name';";
    $sender_id=$conn->query($q1)->fetch_assoc()["id"];
    $q2="SELECT * FROM rahul_users WHERE username='$receiver_name';";
    $receiver_id=$conn->query($q2)->fetch_assoc()["id"];

    $oneWay="SELECT * FROM rahul_messages WHERE (sender_id='$sender_id' and receiver_id='$receiver_id') OR (sender_id='$receiver_id' and receiver_id='$sender_id') ORDER BY time ASC;";
    $MT=$conn->query($oneWay);
    return $MT;
}
//print_r(getMessages('rahuliitr', 'rahuliitr'));
$getUsers="SELECT * FROM rahul_users INNER JOIN rahul_profiles ON rahul_users".".id=rahul_profiles".".user_id;";
$result=$conn->query($getUsers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username." | R chat"; ?></title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">R chat, a global network!</header>
    <div class="hello"></div>
    <button class="logoutbtn use">Logout</button>
    <button class="pro use">Edit profile</button>

    <div class="container">
        <?php while ($row=$result->fetch_assoc()) {
        echo "<div class='user'>
                <div class='dp'><img src='./profile/".$row["profilePic"]."' width='40px' height='40px'></div>
                <div class='name'>".$row["name"]."</div>
                <div class='about'>".$row["about"]."</div>
            </div>
            <div class='modal'>";
            $messArray=getMessages($username, $row["username"]);
            while ($r=$messArray->fetch_assoc()) {
                if ($r["sender_id"]==$userId) {
                    echo "<div class='sent'>".$r["message"]."</div>";
                }
                else if ($r["receiver_id"]==$userId) {
                    echo "<div class='received'>".$r["message"]."</div>";
                }
            }   
            echo "<form action='../php/message.php' method='POST'>
                <input class='mBox' autocomplete='off' placeholder='Type a message...' name='message' type='text' title=".$row["username"].">
                <input class='send' type='submit' value='send'/>
                <input name='receiver' value=".$row["username"]." hidden>
            </form>
            </div>";
        }
        ?>
    </div>
    <script src="../js/dashboard.js"></script>
    <script>
        var txt="Hello, "+<?php echo '"'.$username.'"'; ?>+"!";
        var i=0;
        var speed=50;
        function type() {
            if (i<txt.length) {
                document.querySelector(".hello").textContent+=txt.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    </script>
</body>
</html>