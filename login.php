<?php
//begin session
session_start(['cookie_lifetime' => 600]);

//variables needed
$username = $_POST['username'];
$password = $_POST['password'];
$hashpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$user_type = $_POST['user_type'];

//session storage
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['user_type'] = $user_type;
$_SESSION[$hashpass] = $hashpass;

//db values
$servername = '66.228.53.178';
$dbusername   = 'chukwuma';
$dbpassword   = 'Z_Q7tM"VQaGyqx3n';
$dbname     = 'chukwuma_ophion';

//db connect
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword); //connects to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //shows errors

//login validation
function getHashedPassword($username, $user_type, $conn) {
	$stmt = $conn->prepare('SELECT password FROM user WHERE username = :username AND user_type = :user_type');
	$stmt->execute(
			array(
					'username'=>$username,
					'user_type'=>$user_type
			)
			);
	$row = $stmt->fetch();
	
	if ($row == false) {
		return false;
	}
	return $row['password'];
	//var_dump($row);
}
$passwordHash = getHashedPassword($username, $user_type, $conn);
password_verify($password, $passwordHash);

//var_dump(getHashedPassword($username, $user_type, $conn));

if (password_verify($password, $passwordHash) == true && $user_type == 0) {
	header("location:./welcomeemployer.html");
}
	else if (password_verify($password, $passwordHash) == true && $user_type == 1) {
		header("location:./welcome.html");
	}
	
	else if (password_verify($password, $passwordHash) == false) {
		echo "Invalid Login Credentials. Please try again";
		header("refresh: 3;url=./login.html");
		//header("location:./incorrectlogin.html") //when released
	}


/* //check user type
 if ($user_type == 0) {
	header("location:./welcomeemployer.html");
}
else if ($user_type == 1) {
	header("location:./welcome.html");
}
	
else {
	header("location:./login.html");
} */
 
//this should actually check login credentials with db
//if user_type in user in chukwuma_ophion = 0 or 1