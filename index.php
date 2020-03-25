<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>R Chat</title>
	<link rel="stylesheet" href="./css/login.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/f6992e24ac.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
function sanitize($data) {
	$data = trim($data);
	//$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if ($_POST["what"]=="login") {
		login();
	}
	elseif ($_POST["what"]=="signup") {
		signup();
	}
}
function login() {
	
}
function signup() {
	$Nerror=$Uerror=$Eerror=$Merror=$Perror=$Cerror=$emptyError="";
	$name=sanitize($_POST["name"]);
	$username=sanitize($_POST["username"]);
	$email=sanitize($_POST["email"]);
	$mobile=sanitize($_POST["mobile"]);
	$password=sanitize($_POST["password"]);
	$confirm=sanitize($_POST["confirm"]);
	$gender=sanitize($_POST["gender"]);
	
	$empty=empty($name) or  empty($username) or empty($email) or empty($mobile) or empty($password) or empty($confirm) or empty($gender);

	if ($empty) {
		global $emptyError;
		$emptyError=" *all the fields are mandatory!";
		global $test;
		$test="testing";
	}
	//validating input fields
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$Nerror=" *invalid name";
	}
	if (!empty("username")) {
		
	}
	if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $email)) {
		$Eerror=" *enter correct e-mail address";
	}
	if (!preg_match("/^[6789]\d{9}$/", $mobile)) {
		$Merror=" *invalid mobile number";
	}
	if (!preg_match("/(?=.{7,})/", $password)) {
		$Perror=" *more than 6 characters required";
	}
	if ($password!=$confirm) {
		$Cerror=" *password mismatch";
	}
}
?>
	<div class="leftContainer">
		<div class="welcome"></div>
		<div class="social"></div>
		<div class="helps"></div>
	</div>
	<div class="rightContainer">
		<div class="login">
			<div class="lName"><span class="log">Log</span><span>in</span></div>
			<form class="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="hidden" name="what" value="login">
				<div>
					<i class="fas fa-user"><span class="small"> Username</span></i><br>
					<input id="username" type="text" name="username">
				</div>
				<div>
					<i class="fas fa-key"><span class="small"> Password</span></i><br>
					<input id="password" type="password" name="password">
				</div>
				<div class="flex"><input type="checkbox" name="remember" id="remember" value="remember"><label class="small" for="remember">Remember me</label></div>
				<input id="loginbtn" type="submit">
			</form>
			<div class="sign small">Don't have an account? <span class="signupEvent">Sign up</span></div>
		</div>
		<div class="signup">
			<div class="lName"><span class="log">Sign</span><span>up</span></div>
			<form class="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<span class="std"><?php echo $emptyError; ?></span>
			<input type="hidden" name="what" value="signup">
				<div class="name">
					<label class="small" for="name">Name<span class="Nerror small"><?php echo $Nerror; ?> *invalid name</span></label><br>
					<input title="should contain letters and spaces only" class="nameGiven si" type="text" name="name">
				</div>
				<div class="username">
					<label class="small" for="username">Username<span class="Uerror small"><?php echo $Uerror; ?></span></label><br>
					<input class="si" type="text" name="username">
				</div>
				<div class="email">
					<label class="small" for="email">Email<span class="Eerror small"><?php echo $Eerror; ?></span></label><br>
					<input class="emailGiven si" type="email" name="email">
				</div>
				<div class="mobile">
					<label class="small" for="mobile">Mobile number<span class="Merror small"><?php echo $Merror; ?></span></label><br>
					<input title="mobile number should belong to indian origin" class="mobileGiven si" type="number" name="mobile">
				</div>
				<div class="password">
					<label class="small" for="password">Password<span class="Perror small"><?php echo $Perror; ?></span></label><br>
					<input title="more than 6 characters required"  class="pass si" type="password" name="password">
				</div>
				<div class="confirm">
					<label class="small" for="confirmPass">Confirm password<span class="Cerror small"><?php echo $Cerror; ?></span></label><br>
					<input class="conf si" type="password" name="confirm">
				</div>
				<div class="small">
					<label for="gender">Gender</label><br>
					<input id="male" name="gender" type="radio" value="male">
					<label for="male">Male</label>
					<input id="female" name="gender" type="radio" value="female">
					<label for="female">Female</label>
				</div>
				<input id="signupbtn" type="submit">
			</form>
			<div class="sign small">Have an account? <span class="loginEvent">Login</span></div>
		</div>
	</div>
	<script src="./js/login.js"></script>
</body>
</html>
<?php
echo "<span style=\"color: red\">".$test."</span>";
?>