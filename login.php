<?php
$user = $_POST['user'];
$password= $_POST['password'];
$user_type = $_POST['user_type'];


session_start(['cookie_lifetime' => 600]);
$_SESSION['user'] = $user;
$_SESSION['password'] = $password;
$_SESSION['user_type'] = $user_type;

if ($user_type == 0) {
	header("location:./welcomeemployer.html");
}
else if ($user_type == 1) {
	header("location:./welcome.html");
}
	
else {
	header("location:./login.html");
}

//this should actually check login credentials with db
//if user_type in user in chukwuma_ophion = 0 or 1