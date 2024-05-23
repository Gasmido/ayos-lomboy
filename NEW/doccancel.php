<?php
	require_once 'db_conn.php';
	session_start();
	$id=$_GET['id'];
	$stat="Cancelled";
		
		$sql = "UPDATE docreq SET Status=? WHERE id=?";
		$stmt = mysqli_stmt_init($connn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: login.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "si", $stat, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$_SESSION['statusss'] = "Document Cancelled Successfully!";
        header("Location: doctrack.php");
    
    $connn->close();




