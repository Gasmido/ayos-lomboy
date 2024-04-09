<?php

function empInpSign($user, $pass, $firstname, $lastname, $birth, $sex, $purok, $citizenship) {
	$result;
	if (empty($user) || empty($pass) || empty($firstname) || empty($lastname) || empty($birth) || empty($sex) || empty($purok) || empty($citizenship)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function purpose($purpose) {
	$result;
	if (empty($purpose)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}


function invalidUname($user) {
	$result;
	if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function passMatch($pass, $pass2) {
	$result;
	if ($pass !== $pass2) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function passlength($pass) {
	$result;
	if (strlen($pass) < 6) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function passnum($pass) {
	$result;
	if (!preg_match("#[0-9]+#", $pass)) {
       $result = true;
    }
	else {
		$result = false;
	}
	return $result;
}
function maxpasslength($pass) {
	$result;
	if (strlen($pass) > 16) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function maxfnamelength($firstname) {
	$result;
	if (strlen($firstname) > 20) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function maxlnamelength($lastname) {
	$result;
	if (strlen($lastname) > 20) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function maxMnamelength($middleinitial) {
	$result;
	if (strlen($middleinitial) > 5) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}
function maxEnamelength($extension) {
	$result;
	if (strlen($extension) > 16) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function duplicateEmail($connn, $user) {
	$sql = "SELECT * FROM users WHERE user_email = ?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $user);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultdata)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}
function duplicateName($connn, $firstname, $lastname, $citizenship, $sex) {
	$sql = "SELECT * FROM resident WHERE firstname = ? AND lastname = ? AND citizenship = ? AND sex = ?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $citizenship, $sex);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultdata)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function createUser($connn, $user, $pass, $use, $lastname, $firstname, $middleinitial, $extension, $status, $currentDate, $no, $birth, $sex, $purok, $citizenship) {
	$sql = "INSERT INTO users (user_email, user_password, user_type, Last_name, First_name, Middle_name, Extension_name, Status, dateReg, RequestNo, birthdate, sex, purok, citizenship) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	$hashpass = password_hash($pass, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssssssssssssss", $user, $hashpass, $use, $lastname, $firstname, $middleinitial, $extension, $status, $currentDate, $no, $birth, $sex, $purok, $citizenship);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_destroy();
	header("location: login?error=Success");
		exit();
}

function empInpLogin($user, $pass) {
	$result;
	if (empty($user) || empty($pass)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($connn, $user, $pass, $type, $date, $time, $id2) {
	$userexist = duplicateEmail($connn, $user);
	
	if ($userexist === false) {
		header("location: login?error=User_not_found");
		exit();
	}
	$passhash = $userexist["user_password"];
	$checkpass = password_verify($pass, $passhash);
	
	if ($checkpass === false) {
		header("location: login?error=User_not_found");
		exit();
	} else if ($checkpass === true) {
		$sql = "UPDATE users SET logdate=?, logtime=? WHERE user_id=?";
		$stmt = mysqli_stmt_init($connn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: login?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "ssi", $date, $time, $id2);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		$_SESSION["ID"] =  $userexist["user_id"];
		$_SESSION["user_type"] =  $userexist["user_type"];
		$_SESSION["status"] = $userexist["Status"];
		$_SESSION["lastname"] = $userexist["Last_name"];
		$_SESSION["firstname"] = $userexist["First_name"];
		$_SESSION["middlename"] = $userexist["Middle_name"];
		$_SESSION["extensionname"] = $userexist["Extension_name"];
		$_SESSION["purok"] = $userexist["purok"];
		$_SESSION["citizenship"] = $userexist["citizenship"];

		$connn->close();

		header("location: index");
		exit();
	}
}

function createdoc($connn, $docutype, $fname, $purok, $dateofres, $purpose, $currentDate, $id, $stat) {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}

	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET RequestNo=?, DLRequest=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Document Requested Successfully!";


	$sql = "INSERT INTO docreq (documentType, Fullname, purok, DateofResidence, CORPurpose, CURDATE, user_id, Status) VALUES (?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssss", $docutype, $fname, $purok, $dateofres, $purpose, $currentDate, $id, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	header("location: doctrack?error=none");
		exit();
}
function createdoc2($connn, $docutype, $fname, $reason, $currentDate, $id, $stat) {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}


	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET RequestNo=?, DLRequest=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Document Requested Successfully!";


	$sql = "INSERT INTO docreq (documentType, Fullname, COIReason, CURDATE, user_id, Status) VALUES (?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssss", $docutype, $fname, $reason, $currentDate, $id, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	header("location: doctrack?error=none");
		exit();
}
function createdoc4($connn, $docutype, $fname, $purok, $dateofbirth, $placeofbirth, $height, $weight, $purpose, $currentDate, $id, $stat) {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}


	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET RequestNo=?, DLRequest=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Document Requested Successfully!";


	$sql = "INSERT INTO docreq (documentType, Fullname, purok, dateOfBirth, placeOfBirth, height, weight, BCpurpose, CURDATE, user_id, Status) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssssis",  $docutype, $fname, $purok, $dateofbirth, $placeofbirth, $height, $weight, $purpose, $currentDate, $id, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	header("location: doctrack?error=none");
		exit();
}
function createdoc5($connn, $docutype, $BName, $LName, $address, $Money, $BAL, $BALL, $currentDate, $id, $stat) {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}


	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET RequestNo=?, DLRequest=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Document Requested Successfully!";


	$sql = "INSERT INTO docreq (documentType, Bname, Lname, Kaddress, Kmoney, KBAL, KBALL, CURDATE, user_id, Status) VALUES (?,?,?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssssis", $docutype, $BName, $LName, $address, $Money, $BAL, $BALL, $currentDate, $id, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	header("location: doctrack?error=none");
		exit();
}
function createdoc6($connn, $docutype, $fName, $rbrgy, $sqm, $hectare, $owner, $currentDate, $id, $stat) {
	$sql2 = "SELECT RequestNo FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['RequestNo'];
		}
	}


	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET RequestNo=?, DLRequest=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Document Requested Successfully!";


	$sql = "INSERT INTO docreq (documentType, Fullname, BarcRBrgy, BarcALAsqm, BarcALAhectare, BarcOwner, CURDATE, user_id, Status) VALUES (?,?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssis", $docutype, $fName, $rbrgy, $sqm, $hectare, $owner, $currentDate, $id, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	header("location: doctrack?error=none");
		exit();
}
function createdoc3($connn, $fname, $purok, $complained, $phonenum, $incidenttype, $incidentdetails, $currentDate, $id, $stat) {

	$sql2 = "SELECT blotreq FROM users WHERE user_id=$id";
	$result = mysqli_query($connn, $sql2);
	if ($result-> num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$rqn = $row['blotreq'];
		}
	}


	$ADD = (int)$rqn + 1;
	$sql4 = "UPDATE users SET blotreq=?, blotdateusers=? WHERE user_id=?";
	$stmt4 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt4, $sql4)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt4, "ssi", $ADD, $currentDate, $id);
	mysqli_stmt_execute($stmt4);
	mysqli_stmt_close($stmt4);
	
	$_SESSION['statusss'] = "Blotter Filed Successfully!";

	$sql = "INSERT INTO blotter (complainant, locationOfIncident, complained, phonenumber, blotter_type, blotter_info, dateOfFiling, Status, user_id) VALUES (?,?,?,?,?,?,?,?, ?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssssi",  $fname, $purok, $complained, $phonenum, $incidenttype, $incidentdetails, $currentDate, $stat, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: doctrackblotter?error=none");
		exit();
}

function addBlotter($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $stat) {
	$sql = "INSERT INTO blotter (blotter_no, blotter_type, complainant, complained, locationOfIncident, dateOfFiling, Status, blotter_info, personInCharge, blotter_status) VALUES (?,?,?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssssss", $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $stat);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "Blotter Successfully Added!";
	
	header("location: Blotter?error=none");
		exit();
}
function editBlotter($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id) {
	$sql = "UPDATE blotter SET blotter_no=?, blotter_type=?, complainant=?, complained=?, locationOfIncident=?, dateOfFiling=?, Status=?, blotter_info=?, personInCharge=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssssi", $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: Blottermore?row_id=$id");
		exit();
}
function editBlotter2($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $sstat,$id) {
	$sql = "UPDATE blotter SET blotter_no=?, blotter_type=?, complainant=?, complained=?, locationOfIncident=?, dateOfFiling=?, Status=?, blotter_info=?, personInCharge=?, Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssssssi", $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $sstat, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: Blotterrequestmore?row_id=$id");
		exit();
}
function editBlotter3($connn, $sstat, $id) {
	$sql = "UPDATE blotter SET Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "si", $sstat, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: BlotterRequest");
		exit();
}
function editDocReq($connn, $fname, $daterequest, $dt, $purok, $BI, $dof, $dp, $ap, $status, $id)  {
	$sql = "UPDATE docreq SET Fullname=?, CURDATE=?, documentType=?, purok=?, CORPurpose=?, DateofResidence=?, datePickedup=?, amountpaid=?, Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssssi", $fname, $daterequest, $dt, $purok, $BI, $dof, $dp, $ap, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	$sql2 = "INSERT INTO revenues (fullname, datereq, docreq, purpose, datepick, amountpaid) VALUES (?,?,?,?,?,?);";
	$stmt2 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt2, $sql2)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt2, "ssssss", $fname, $daterequest, $dt, $BI, $dp, $ap);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_close($stmt2);

	session_start();
	$_SESSION["statu"] = "Data Successfully Updatedd!";

	header("location: DocReqmore?id=$id");
		exit();
}
function editDocReq11($connn, $fname, $daterequest, $dt, $purok, $BI, $dof, $status, $id)  {
	$sql = "UPDATE docreq SET Fullname=?, CURDATE=?, documentType=?, purok=?, CORPurpose=?, DateofResidence=?, Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssi", $fname, $daterequest, $dt, $purok, $BI, $dof, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";
	
	header("location: DocReqmore?id=$id");
		exit();
}
function editDocReq2($connn, $fname, $daterequest, $dt, $BI, $dp, $ap, $status, $id)  {
	$sql = "UPDATE docreq SET Fullname=?, CURDATE=?, documentType=?, CORPurpose=?, datePickedup=?, amountpaid=?, Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssi", $fname, $daterequest, $dt, $BI, $dp, $ap, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	$sql2 = "INSERT INTO revenues (fullname, datereq, docreq, purpose, datepick, amountpaid) VALUES (?,?,?,?,?,?);";
	$stmt2 = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt2, $sql2)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt2, "ssssss", $fname, $daterequest, $dt, $BI, $dp, $ap);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_close($stmt2);
	
	session_start();
	$_SESSION["statu"] = "Data Successfully Updatedd!";
	
	header("location: DocReqmore?id=$id");
		exit();
}
function editDocReq22($connn, $fname, $daterequest, $dt, $BI, $status, $id)  {
	$sql = "UPDATE docreq SET Fullname=?, CURDATE=?, documentType=?, CORPurpose=?, Status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssi", $fname, $daterequest, $dt, $BI, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: DocReqmore?id=$id");
		exit();
}
function editUserAcc($connn, $status, $id)  {
	$sql = "UPDATE users SET Status=? WHERE user_id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "si", $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: UserAccmore?id=$id");
		exit();
}
function duplicateBlot($connn, $bno) {
	$sql = "SELECT * FROM blotter WHERE blotter_no = ?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $bno);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultdata)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}
function duplicateBlot2($connn, $bno) {
	$sql = "SELECT * FROM blotter WHERE blotter_no = ?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $bno);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	
	if ($row = mysqli_fetch_assoc($resultdata)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}
function duplicateResident($connn, $fname, $mname, $lname, $ename) {
	 $sql = "SELECT * FROM resident WHERE firstname = ? AND middlename=? AND lastname=? AND extensionname=? OR firstname =? AND lastname=? OR firstname=? AND middlename=? AND lastname=?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "sssssssss", $fname, $mname, $lname, $ename,$fname,$lname, $fname, $mname, $lname);
	mysqli_stmt_execute($stmt);
	
	$resultdata = mysqli_stmt_get_result($stmt);
	


	if ($row = mysqli_fetch_assoc($resultdata)) {
		//return $row;
		echo "asdf";
	} else {
		$result = false;
		return $result;
	} 
}
function editStaff($connn, $name, $chairmanship, $termstart, $termend, $newImageName, $status, $id) {
	$sql = "UPDATE officials SET name=?, chairmanship=?, termstart=?, termend=?, image=?, status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: OffStaff?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssi", $name, $chairmanship, $termstart, $termend, $newImageName, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: OffStaffmore?id=$id");
		exit();
}
function editStaff2($connn, $name, $chairmanship, $termstart, $termend, $status, $id) {
	$sql = "UPDATE officials SET name=?, chairmanship=?, termstart=?, termend=?, status=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: OffStaff?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssi", $name, $chairmanship, $termstart, $termend, $status, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: OffStaffmore?id=$id");
		exit();
}
function addResident($connn, $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province , $datereg) {
	$sql = "INSERT INTO resident (firstname, middlename, lastname, extensionname, birthdate, sex, citizenship, civilstatus, street, purok, city, province, datereg) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssssssss", $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "Resident Successfully Added!";
	
	header("location: ResidentRecord?error=none");
		exit();
}

function editResident($connn, $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg, $id) {
	$sql = "UPDATE resident SET firstname=?, middlename=?, lastname=?, extensionname=?, birthdate=?, sex=?, citizenship=?, civilstatus=?, street=?, purok=?, city=?, province=?, datereg=? WHERE id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssssssssi", $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: Residentmore?row_id=$id");
		exit();
}
function editResident2($connn, $fname, $mname, $lname, $ename, $bday, $sex, $citi, $id) {
	$sql = "UPDATE users SET First_name=?, Middle_name=?, Last_name=?, Extension_name=?, birthdate=?, sex=?, citizenship=? WHERE user_id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssssi", $fname, $mname, $lname, $ename, $bday, $sex, $citi, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statu"] = "Data Successfully Updated!";

	header("location: AccSetting");
		exit();
}
function editResident3($connn, $fname, $mname, $lname, $ename, $bday, $sex, $citi, $purok, $id) {
	$sql = "UPDATE users SET First_name=?, Middle_name=?, Last_name=?, Extension_name=?, birthdate=?, sex=?, citizenship=?, purok=? WHERE user_id=?";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssssssi", $fname, $mname, $lname, $ename, $bday, $sex, $citi, $purok, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: Homepage");
		exit();
}
function addEvents($connn, $title, $desc, $newImageName, $date) {
	$sql = "INSERT INTO announcements (eventTitle, eventDesc, eventPic, curdate) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssss", $title, $desc, $newImageName, $date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "Event Successfully Added!";
	
	header("location: Announcements");
		exit();
}
function addEvents2($connn, $title, $desc, $date, $id) {
	$sql = "UPDATE announcements SET eventTitle=?, eventDesc=?, updateddate=? WHERE id=?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssi", $title, $desc, $date, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "Event Successfully Edited!";
	
	header("location: Announcements");
		exit();
}
function addEvents3($connn, $title, $desc, $newImageName, $date, $id) {
	$sql = "UPDATE announcements SET eventTitle=?, eventDesc=?, eventPic=?, updateddate=? WHERE id=?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssi", $title, $desc, $newImageName, $date, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "Event Successfully Edited!";
	
	header("location: Announcements");
		exit();
}
function addNews($connn, $title, $desc, $newImageName, $date) {
	$sql = "INSERT INTO announcements (newsTitle, newsDesc, newsPic, curdate) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssss", $title, $desc, $newImageName, $date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "News Successfully Added!";
	
	header("location: Announcements");
		exit();
}
function addNews2($connn, $title, $desc, $date, $id) {
	$sql = "UPDATE announcements SET newsTitle=?, newsDesc=?, updateddate=? WHERE id=?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssi", $title, $desc, $date, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "News Successfully Edited!";
	
	header("location: Announcements");
		exit();
}
function addNews3($connn, $title, $desc, $newImageName, $date, $id) {
	$sql = "UPDATE announcements SET newsTitle=?, newsDesc=?, newsPic=?, updateddate=? WHERE id=?;";
	$stmt = mysqli_stmt_init($connn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: sign_up?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ssssi", $title, $desc, $newImageName, $date, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	session_start();
	$_SESSION["statuss"] = "News Successfully Edited!";
	
	header("location: Announcements");
		exit();
}