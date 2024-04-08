<?php
if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$fname=$_POST['name'];
	$daterequest=$_POST['daterequest'];
	$dt=$_POST['Docutype'];
	$purok=$_POST['purok'];
	$BI=$_POST['BI'];
	$dof=$_POST['dof'];
	$status=$_POST['status'];
	if ($status == "Picked-up") {
	$dp=$_POST['Datepicked'];
	$ap=$_POST['Amountpaid'];
	}

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq($connn, $fname, $daterequest, $dt, $purok, $BI, $dof, $dp, $ap, $status, $id); 
	}
	else {
		editDocReq11($connn, $fname, $daterequest, $dt, $purok, $BI, $dof, $status, $id);
	}
}
elseif (isset($_POST['submit2'])) {
 	$id=$_POST['id2'];
	$fname=$_POST['name2'];
	$daterequest=$_POST['daterequest2'];
	$dt=$_POST['Docutype2'];
	$BI=$_POST['BI2'];
	$status=$_POST['status2'];
	if ($status == "Picked-up") {
	$dp=$_POST['datepicked2'];
	$ap=$_POST['amountpaid2'];
	}
	

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq2($connn, $fname, $daterequest, $dt, $BI, $dp, $ap, $status, $id); 
	}
	else {
		editDocReq22($connn, $fname, $daterequest, $dt, $BI, $status, $id); 
	}
}
else {
	header("Location: Blotter.php");
}