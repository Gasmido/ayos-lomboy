<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
	$fname=$_POST['name'];
	$chairmanship=$_POST['chairmanship'];
	$position=$_POST['position'];
	$termstart=$_POST['tstart'];
	$termend=$_POST['tend'];
	$status=$_POST['status'];
	
	$sql = "insert into bolt ()"
}
else {
	header("Location: OffStaff.php");
}