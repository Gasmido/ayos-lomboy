<?php
session_start();
	require_once '../include/db_conn.php';
	require 'func.php';
	$currentDate = date('Y-m-d');

	$d=mktime(2023-12-10);
	$f=date("Y-m-d",$d);

	$id = $_SESSION['ID'];
	$stat = "Processing";
	$z = 0;
	 $docty = $_SESSION['type'];
	if ($docty != "Blotter") {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}
	$sql3 = "SELECT DLRequest FROM users WHERE user_id=$id";
	$result2 = mysqli_query($connn, $sql3);
	if ($result2-> num_rows > 0) {
		while ($row2 = $result2->fetch_assoc()) {
			$rqn2 = $row2['DLRequest'];
		}
	}
	if ($rqn2 != $currentDate) {
		$sql = "UPDATE users SET RequestNo=? WHERE user_id=?";
		$stmt = mysqli_stmt_init($connn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: sign_up.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "si", $z, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
if ($rqn2 === $currentDate  && $rqn > 2 ) {
	$_SESSION['statuss'] = "Sorry but you have exceeded maximum amount of request for a day! (3)";
	header("location: doctrack.php");
	exit();
	
}
else {
if (isset($_POST['submit'])) {
	
	$docutype = $_POST["docutype"];
	$fname = $_POST["fName"];
	$purok= $_POST["purok"];
	$dateofres = $_POST["dateofres"];
	if (isset($_POST["purpose"])) {
		$purpose = $_POST["purpose"];
	} else {
		$purpose = $_POST["oth"];
	}



	createdoc($connn, $docutype, $fname, $purok, $dateofres, $purpose, $currentDate, $id, $stat);


} 
elseif (isset($_POST['submit1'])) {
	$docutype = $_POST["docutype"];
	$fname = $_POST["fName"];
	if (isset($_POST["reason"])) {
		$reason = $_POST["reason"];
	} else {
		$reason = $_POST["oth2"];
	}

	createdoc2($connn, $docutype, $fname, $reason, $currentDate, $id, $stat);
	
}


}
}
else {
$sql2 = "SELECT blotreq FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['blotreq'];
		}
	}
	$sql3 = "SELECT blotdateusers FROM users WHERE user_id=$id";
	$result2 = mysqli_query($connn, $sql3);
	if ($result2-> num_rows > 0) {
		while ($row2 = $result2->fetch_assoc()) {
			$rqn2 = $row2['blotdateusers'];
		}
	}
	if ($rqn2 != $currentDate) {
		$sql = "UPDATE users SET blotreq=? WHERE user_id=?";
		$stmt = mysqli_stmt_init($connn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: sign_up.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "si", $z, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
if ($rqn2 === $currentDate  && $rqn > 1 ) {
	$_SESSION['statuss'] = "Sorry but you have exceeded maximum amount of blotter filing request for a day! (2)";
	header("location: doctrack.php");
	exit();
	
}
else  {
	if (isset($_POST['submit2'])) {
		$fname = $_POST["fName"];
		$purok = $_POST["purok"];
		$purok2 = "Purok#". $purok;
		$complained = $_POST["complained"];
		$phonenum = $_POST["phonenum"];
		$incidenttype = $_POST["incidenttype"];
		$incidentdetails = $_POST["incidentdetails"];
		
		
		createdoc3($connn, $fname, $purok2, $complained, $phonenum, $incidenttype, $incidentdetails, $currentDate, $id, $stat);
	}else {
	echo "sdfsd";
	}

}

}
?>