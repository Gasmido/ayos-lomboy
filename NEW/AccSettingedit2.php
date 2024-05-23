<?php
session_start();
if (isset($_POST['submits'])) {
	$id=$_POST['idd'];
	$fname = trim($_POST['fname']);
	$mname = trim($_POST['mname']);
	$lname = trim($_POST['lname']);
	$ename = trim($_POST['ename']);
	$bday = $_POST['bday'];
	$sex = trim($_POST['sex']);
	$citi = trim($_POST['citizenship']);
	$purok = trim($_POST['purok']);


	require_once 'db_conn.php';
	require_once 'func.php';
  
      editResident3($connn, $fname, $mname, $lname, $ename, $bday, $sex, $citi, $purok, $id); 


}
else {
	header("Location: Homepage.php");

}
?>