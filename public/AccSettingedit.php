<?php
session_start();
if (isset($_POST['submits'])) {
	$id=$_POST['idd'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$ename = $_POST['ename'];
	$bday = $_POST['bday'];
	$sex = $_POST['sex'];
	$citi = $_POST['citizenship'];


	require_once '../include/db_conn.php';
	require_once 'func.php';
  
      editResident2($connn, $fname, $mname, $lname, $ename, $bday, $sex, $citi, $id); 
		

}
else {
	header("Location: Homepage.php");

}