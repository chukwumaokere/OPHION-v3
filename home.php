<?php
$user_type = $_POST['user_type'];
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