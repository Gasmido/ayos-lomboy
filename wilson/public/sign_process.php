<?php
if (isset($_POST['submit'])) {
	$currentDate = gmdate('Y-m-d');
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$birth = $_POST['birthdate'];
	$sex = $_POST['sex'];
	$purok = $_POST['purok'];
	$citizenship = $_POST['citizenship'];
	$firstname = $_POST["firstname"];
	$middleinitial = $_POST["middleinitial"];
	$lastname = $_POST["lastname"];
	$no = 0;
	$extension = $_POST["extensionname"];
	$status = "Processing";
	
	include '../include/db_conn.php';
	require_once 'func.php';

	
	if (empInpSign($user, $pass, $firstname, $lastname, $birth, $sex, $purok, $citizenship) !== false) {
		header("location: register.php?error=Empty_input");
		exit();
	}
	if (invalidUname($user) !== false) {
		header("location: register.php?error=Invalid_E-mail");
		exit();
	}
	if (duplicateEmail($connn, $user) !== false) {
		header("location: register.php?error=Email_alreadytaken");
		exit();
	}
	if (duplicateName($connn, $firstname, $lastname, $citizenship, $sex) !== false) {
		$status = "Approved";
	}
	if (passlength($pass) !== false) {
		header("location: register.php?error=Password_too_short");
		exit();
	}
	if (maxpasslength($pass) !== false) {
		header("location: register.php?error=Password_too_long");
		exit();
	}
	if (passnum($pass) !== false) {
		header("location: register.php?error=Password_strength");
		exit();
	}
	if (maxfnamelength($firstname) !== false) {
		header("location: register.php?error=First_too_long");
		exit();
	}
	if (maxlnamelength($lastname) !== false) {
		header("location: register.php?error=Last_too_long");
		exit();
	}
	if (maxMnamelength($middleinitial) !== false) {
		header("location: register.php?error=Middle_too_long");
		exit();
	}
	if (maxEnamelength($extension) !== false) {
		header("location: register.php?error=Extension_too_long");
		exit();
	}
session_start();
	$_SESSION["email"] =  $user; 
	$_SESSION["pass"] =  $pass; 
	$_SESSION["usertype"] =  $user; 
	$_SESSION["lastname"] =  $lastname; 
	$_SESSION["firstname"] =  $firstname; 
	$_SESSION["middleinitial"] =  $middleinitial; 
	$_SESSION["extension"] =  $extension; 
	$_SESSION["status"] =  $status; 
	$_SESSION["currentDate"] =  $currentDate; 
	$_SESSION["no"] =  $no; 
	$_SESSION["sex"] =  $sex;
	$_SESSION["birth"] =  $birth;
	$_SESSION["purok"] =  $purok;
	$_SESSION["citizenship"] =  $citizenship;
	header("location: sendotp.php");
	createUser($connn, $user, $pass, $use, $lastname, $firstname, $middleinitial, $extension, $status, $currentDate, $no); 
	
} else {
	header("location: register.php");
	exit();
}
?>