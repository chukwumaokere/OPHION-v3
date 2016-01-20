<?php
include  'Account.php';

$user_type= $_POST['user_type'];
$name = $_POST['name'];
$company_name = $_POST['company_name'];
$company_id = $_POST['company_id'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$country= $_POST['country'];
$city = $_POST['city'];
$state_province = $_POST['state_province'];
$zip = $_POST['zip'];
$mainPhone = $_POST['main_phone1'] . $_POST['main_phone2'] . $_POST['main_phone3'];
$altPhone = $_POST['alt_phone1'] . $_POST['alt_phone2'] . $_POST['alt_phone3'];



$servername = '66.228.53.178';
$dbusername   = 'chukwuma';
$dbpassword   = 'Z_Q7tM"VQaGyqx3n';
$dbname     = 'chukwuma_ophion';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword); //connects to database
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //shows errors

//checks if Account exists
function doesUserExist($username, $conn) {
	$stmt = $conn->prepare("SELECT username FROM user WHERE username = username");
	$stmt->bindParam(':username', $username);
	$stmt->execute();

	if($stmt->rowCount() > 0){
		return true;
	}

	else {
		return false;
	}
}

$r = doesUserExist($username, $conn);

if ($r == true) {
	echo "<b>Account Already Exists</b>";
	header("refresh:5;url=http://ophion.chukwumaokere.com/newuser.html");
}
else {
	$acc = new Account();
	$acc->createAccount(
			$user_type,
			$name,
			$company_name,
			$company_id,
			$email,
			$username,
			$password,
			$address1,
			$address2,
			$country,
			$city,
			$state_province,
			$zip,
			$mainPhone,
			$altPhone
			);

	$acc->insertAccount($conn);

	echo "<b>Account Data Saved! Please Login</b>";
	header("refresh:5;url=http://ophion.chukwumaokere.com/login.html"); /* Redirect browser */
}

exit();
/*to crash server
 for ($x = 0; $x <= 1000000; $x++) {
 $stmt->execute();
 }*/


/*
 function example
 function familyName($fname, $year) {
 echo "$fname Refsnes. Born in $year <br>";
 }

 familyName("Hege","1975");
 familyName("Stale","1978");
 familyName("Kai Jim","1983");
 ?>*/

/*
 * MVC (codeigniter, cakephp)
 * model, view, controller
 * css
 * javascript to detect characters
 */