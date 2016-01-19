<?php
$user = $_POST['user'];
$password= $_POST['password'];

session_start(['cookie_lifetime' => 600]);
$_SESSION['user'] = $user;
$_SESSION['password'] = $password;

header("location:./welcome.html");