<?php


if (isset($_POST['submit'])) {
	$bno=$_POST['blotterno'];
	$fname=$_POST['name'];
	$complainant=$_POST['complainant'];
	$complained=$_POST['complained'];
	$loc=$_POST['Location'];
	$dof=$_POST['DoF'];
	$status=$_POST['status'];
	$BI=$_POST['BI'];
	$pin=$_POST['pin'];
	$stat = "Approved";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if (duplicateBlot($connn, $bno) !== false) {
		session_start();
		$_SESSION["sta"] = "Already Exists!";
		header("location: BlotterAdd.php");
		exit();
	}

	addBlotter($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $stat); 
	
}
else {
	header("Location: Blotter.php");
	exit();
}