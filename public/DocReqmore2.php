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
	$emaiil=$_POST['email'];
	if ($status == "Picked-up") {
	$dp=$_POST['Datepicked'];
	$ap=$_POST['Amountpaid'];
	}

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq($connn, $fname, $daterequest, $dt, $purok, $BI, $dof, $dp, $ap, $status, $emaiil, $id); 
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
	$emaiil=$_POST['email'];
	if ($status == "Picked-up") {
	$dp=$_POST['datepicked2'];
	$ap=$_POST['amountpaid2'];
	}
	

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq2($connn, $fname, $daterequest, $dt, $BI, $dp, $ap, $status, $emaiil, $id); 
	}
	else {
		editDocReq22($connn, $fname, $daterequest, $dt, $BI, $status, $id); 
	}
}
elseif (isset($_POST['submit3'])) {
 	$id=$_POST['id2'];
	$Bname=$_POST['Bname'];
	$Lname=$_POST['Lname'];
	$address=$_POST['address'];
	$money=$_POST['money'];
	$BAL=$_POST['BAL'];
	$BALL=$_POST['BALL'];
	$daterequest=$_POST['daterequest2'];
	$dt=$_POST['Docutype2'];
	$status=$_POST['status2'];
	$emaiil=$_POST['email'];
	if ($status == "Picked-up") {
	$dp=$_POST['datepicked2'];
	$ap=$_POST['amountpaid2'];
	}
	

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq3($connn, $Bname, $Lname,$address, $money, $BAL,$BALL, $daterequest, $dt, $dp, $ap, $status, $emaiil, $id); 
	}
	else {
		editDocReq33($connn, $Bname, $Lname,$address, $money, $BAL,$BALL, $daterequest, $dt, $status, $id); 
	}
}
elseif (isset($_POST['submit4'])) {
 	$id=$_POST['id2'];
	$fname=$_POST['fname'];
	$purok=$_POST['purok'];
	$dob=$_POST['dob'];
	$pob=$_POST['pob'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$purpose=$_POST['purpose'];
	$daterequest=$_POST['daterequest2'];
	$dt=$_POST['Docutype2'];
	$status=$_POST['status2'];
	$emaiil=$_POST['email'];
	if ($status == "Picked-up") {
	$dp=$_POST['datepicked2'];
	$ap=$_POST['amountpaid2'];
	}
	

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq4($connn, $fname, $purok,$dob, $pob, $height,$weight,$purpose, $daterequest, $dt, $dp, $ap, $status, $emaiil, $id); 
	}
	else {
		editDocReq44($connn,$fname, $purok,$dob, $pob, $height,$weight,$purpose, $daterequest, $dt, $status, $id); 
	}
}
elseif (isset($_POST['submit5'])) {
 	$id=$_POST['id2'];
	$fname=$_POST['fname'];
	$rbrgy=$_POST['rbrgy'];
	$sqm=$_POST['sqm'];
	$hectare=$_POST['hectare'];
	$owner=$_POST['owner'];
	$daterequest=$_POST['daterequest2'];
	$dt=$_POST['Docutype2'];
	$status=$_POST['status2'];
	$emaiil=$_POST['email'];
	if ($status == "Picked-up") {
	$dp=$_POST['datepicked2'];
	$ap=$_POST['amountpaid2'];
	}
	

	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($status == "Picked-up") {
		editDocReq5($connn, $fname, $rbrgy,$sqm, $hectare, $owner,$daterequest, $dt, $dp, $ap, $status, $emaiil, $id); 
	}
	else {
		editDocReq55($connn, $fname, $rbrgy,$sqm, $hectare, $owner,$daterequest, $dt, $status, $id); 
	}
}
else {
	header("Location: DocReq");
}