<?php


if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$status=$_POST['status'];

	require_once 'db_conn.php';
	require_once 'func.php';


	editUserAcc($connn, $status, $id); 
	
}
else {
	header("Location: home-section");
}