<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>R Chat</title>
	<link rel="stylesheet" href="./css/login.css">
	<script src="https://kit.fontawesome.com/f6992e24ac.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="leftContainer">
		<div class="welcome"></div>
		<div class="social"></div>
		<div class="helps"></div>
	</div>
	<div class="rightContainer">
		<div class="login">
			<div class="lName"><span class="log">Log</span><span>in</span></div>
			<form class="loginForm" action="" method="post">
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
			<form class="signupForm" action="" method="post">
				<div class="name">
					<label class="small" for="name">Name</label><br>
					<input type="text" name="name">
				</div>
				<div class="username">
					<label class="small" for="username">Username<span class="Uerror small"> *username unavailable</span></label><br>
					<input type="text" name="username">
				</div>
				<div class="email">
					<label class="small" for="email">Email<span class="Eerror small"> *enter correct e-mail address</span></label><br>
					<input class="emailGiven" type="email" name="email">
				</div>
				<div class="mobile">
					<label class="small" for="mobile">Mobile number<span class="Merror small"> *invalid mobile number</span></label><br>
					<input class="mobileGiven" type="number" name="mobile">
				</div>
				<div class="password">
					<label class="small" for="password">Password<span class="Perror small"> *more than 6 characters required</span></label><br>
					<input class="pass" type="password" name="password">
				</div>
				<div class="confirm">
					<label class="small" for="confirmPass">Confirm password<span class="Cerror small"> *password mismatch</span></label><br>
					<input class="conf" type="password" name="confirm">
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
?>