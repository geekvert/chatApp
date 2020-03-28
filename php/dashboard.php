<?php
session_start();
if (empty($_SESSION["username"])) {
    $username=$_COOKIE["rchat"];
}
else {
    $username=$_SESSION["username"];
}

require ("./connection.php");
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
</head>
<body>
    <header class="header">R chat, a global network!</header>
    <div class="hello"></div>
    <button class="logoutbtn">Logout</button>

    <div class="container">
        <?php while ($row=$result->fetch_assoc()) {
        echo"<div class='user'>
                <div class='dp'><img src='./profile/".$row["profilePic"]."' width='40px' height='40px'></div>
                <div class='name'>".$row["name"]."</div>
                <div class='about'>".$row["about"]."</div>
            </div>
            <div class='modal'>
            <div class='sent'>this is a sent message.</div>
            <div class='received'>this is a received message.</div>
            <form action='../php/message.php' method='POST'>
                <input class='mBox' placeholder='Type a message...' name='message' type='text' title=".$row["username"].">
                <input class='send' type='submit' value='send'/>
                <input name='receiver' value=".$row["username"]." hidden>
            </form>
            </div>
            ";
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