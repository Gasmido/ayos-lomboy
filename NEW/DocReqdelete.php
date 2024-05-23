<?php
	require_once 'db_conn.php';
	$id=$_GET['id'];
	
	$sql = "DELETE FROM docreq WHERE id='".$id."'";

	if ($connn->query($sql) === TRUE) {
		session_start();
		$_SESSION['statu'] = "Data Successfully Deleted!";
       header("Location: DocReq.php");
    } else {
        echo "Error deleting record: " . $connn->error;

    }

    $connn->close();




