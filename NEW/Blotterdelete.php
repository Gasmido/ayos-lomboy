<?php
	require_once 'db_conn.php';
	$id=$_GET['id'];
	
	$sql = "DELETE FROM blotter WHERE id='".$id."'";

	if ($connn->query($sql) === TRUE) {
		session_start();
		$_SESSION['statu'] = "Blotter Successfully Deleted!";
        header("Location: Blotter.php");
    } else {
        echo "Error deleting record: " . $connn->error;

    }

    $connn->close();




