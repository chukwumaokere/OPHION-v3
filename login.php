<?php
$user = $_POST['user'];
$password= $_POST['password'];
$user_type = $_POST['user_type'];


session_start(['cookie_lifetime' => 600]);
$_SESSION['user'] = $user;
$_SESSION['password'] = $password;

if ($user_type == 0) {
	header("location:./welcomeemployer.html");
}
else if ($user_type == 1) {
	header("location:./welcome.html");
}
	
else {
	header("location:./login.html");
}