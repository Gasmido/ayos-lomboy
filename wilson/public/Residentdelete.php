<?php
	require_once '../include/db_conn.php';
	$id=$_GET['id'];
	
	$sql = "DELETE FROM resident WHERE id='".$id."'";

	if ($connn->query($sql) === TRUE) {
		session_start();
		$_SESSION['statu'] = "Resident Information Successfully Deleted!";
        header("Location: ResidentRecord.php");
    } else {
        echo "Error deleting record: " . $connn->error;

    }

    $connn->close();




