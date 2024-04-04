<?php
	require_once '../include/db_conn.php';
	session_start();
	$id=$_GET['id'];
	
	$sql = "DELETE FROM docreq WHERE id='".$id."'";

	if ($connn->query($sql) === TRUE) {
		$_SESSION['statusss'] = "Document Successfully Removed!";
        header("Location: doctrack.php");
    } else {
        echo "Error deleting record: " . $connn->error;

    }

    $connn->close();




