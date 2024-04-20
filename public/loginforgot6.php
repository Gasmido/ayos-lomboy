<?php
if (isset($_POST['submitv'])) {
	$user = $_POST['user'];

	include '../include/db_conn.php';
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
		session_start();
		$_SESSION["email"] =  $user; 
		header("location: loginforgot3.php");
	} 
	else {
		header("location: loginforgot.php?error=noE-mail");
		exit();
	}
}

else {
	header("location: login");
}