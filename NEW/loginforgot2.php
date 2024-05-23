<?php
session_start();
if (isset($_POST['submitv'])) {
	$user = $_POST['user'];
$secretKey = '6LdC5r4pAAAAAI57LWy8yH6YVV_ndKLzuQefGXUO'; 
	include 'db_conn.php';
	require_once 'func.php';
	 if (empInpEmail($user) !== false) {
				header("location: loginforgot.php?error=Empty_input");
				exit();
			}
			if (invalidUname($user) !== false) {
				header("location: loginforgot.php?error=Invalid_E-mail");
				exit();
			}
			if (duplicateEmail($connn, $user) !== false) {
			
			 	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
		 
		            // Verify the reCAPTCHA response 
		            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
		             
		            // Decode json data 
		            $responseData = json_decode($verifyResponse); 
		            if($responseData->success){ 
		            session_start();
					$_SESSION["email"] =  $user; 
					header("location: loginforgot3.php");
				
					} else { 
		            header("location: loginforgot.php?error=wrong");
					exit();
		            } 
		        }else { 
		            header("location: loginforgot.php?error=wrongf");
					exit();
		       
        }
	
}
 else {
	header("location: loginforgot.php?error=noE-mail");
	exit();
	}
}
elseif (isset($_POST['submitvd'])) {
	$otp = $_POST['otp'];
	$sendotp = $_POST['send'];

	require_once 'db_conn.php';
	require_once 'func.php';


	 if ($otp === "") {
		header("location: loginforgot4.php?error=Empty_input");
		exit();
	} elseif ($otp != $sendotp) {
		header("location: loginforgot4.php?error=wrong_input");
		exit();
	}
	header("location: loginforgot5?error=change");
}
elseif (isset($_POST['submitss'])) {
$pass = $_POST['userss'];
$user = $_POST['emails'];
	include 'db_conn.php';
	require_once 'func.php';

	if (empInpEmail($pass) !== false) {
		header("location: loginforgot5.php?error=Empty_input");
		exit();
	}
	if (passlength($pass) !== false) {
		header("location: loginforgot5.php?error=Password_too_short");
		exit();
	}
	if (maxpasslength($pass) !== false) {
		header("location: loginforgot5.php?error=Password_too_long");
		exit();
	}
	if (passnum($pass) !== false) {
		header("location: loginforgot5.php?error=Password_strength");
		exit();
	}
	passchange($connn, $pass, $user);
}
elseif (isset($_SESSION['uuuss'])) {
	header("location: loginforgot5");
}

else {
	header("location: login");
}