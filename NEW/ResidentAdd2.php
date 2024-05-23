<?php


if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$ename = $_POST['ename'];
	$datereg = $_POST['datereg'];
	$birth = $_POST['birth'];
	$sex = $_POST['sex'];
	$citizenship = $_POST['citizenship'];
	$civil = $_POST['civil'];
	$brgy = $_POST['brgy'];
	$puro = $_POST['purok'];
	$purok = "Purok#$puro";
	$city = $_POST['city'];
	$province = $_POST['province'];



	require_once 'db_conn.php';
	require_once 'func.php';

	if (duplicateResident($connn, $fname, $mname, $lname, $ename) !== false) {
		session_start();
		$_SESSION["sta"] = "Already Exists!";
		header("location: ResidentAdd.php");
		exit();
	}

	addResident($connn, $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg); 
	
}
else {
	header("Location: Blotter.php");
	exit();
}
