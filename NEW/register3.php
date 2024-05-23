<?php
	session_start();
if (isset($_POST['submitv'])) {
	$otp = $_POST['otp'];
	$sendotp = $_POST['send'];

	require_once 'db_conn.php';
	require_once 'func.php';


	 if ($otp === "") {
		header("location: register2.php?error=empty_input");
		exit();
	} elseif ($otp != $sendotp) {
		header("location: register2.php?error=wrong_input");
		exit();
	}
	else {
	unset($_SESSION['otp']);
	$user = $_SESSION["email"]; 
	$pass= $_SESSION["pass"]; 
	$use= $_SESSION["usertype"]; 
	$lastname= $_SESSION["lastname"]; 
	$firstname= $_SESSION["firstname"]; 
	$middleinitial= $_SESSION["middleinitial"]; 
	$extension= $_SESSION["extension"]; 
	$status= $_SESSION["status"]; 
	$currentDate= $_SESSION["currentDate"]; 
	$no= $_SESSION["no"];
	$sex =$_SESSION["sex"];
	$birth = $_SESSION["birth"];
	$purok = $_SESSION["purok"];
	$citizenship = $_SESSION["citizenship"];


	createUser($connn, $user, $pass, $use, $lastname, $firstname, $middleinitial, $extension, $status, $currentDate, $no, $birth, $sex, $purok, $citizenship); 
	}
} else {
	header("location: register");
	exit();
}
?>