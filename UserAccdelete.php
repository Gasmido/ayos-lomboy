<?php
	require_once '../include/db_conn.php';
	$id=$_GET['id'];
	$sql = "DELETE FROM docreq WHERE user_id='".$id."'";
	if ($connn->query($sql) === TRUE) {

		echo "success";
    } else {
        echo "Error deleting record: " . $connn->error;

    }
	$sql2 = "DELETE FROM users WHERE user_id='".$id."'";


	if ($connn->query($sql2) === TRUE) {

		session_start();
		$_SESSION['statu'] = "Data Successfully Deleted!";
       header("Location: UserAcc.php");
    } else {
        echo "Error deleting record: " . $connn->error;

    }

    $connn->close();




