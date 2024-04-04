<?php
session_start();

if (isset($_POST["submit"])) {
	$user = $_POST["user1"];
	$pass = $_POST["pass"];
	date_default_timezone_set('Asia/Manila');
  	$date = date('Y-m-d');  
  	$time = date('H:i:s');  

	require "../include/db_conn.php";
	require_once "func.php";
	
	if (empInpLogin($user, $pass) !== false) {
		header("location: login.php?error=Empty_input");
		exit();
	} 
	else {
        $sql2 = "SELECT * FROM users WHERE user_email=?";
				$stmt = $connn->prepare($sql2); 
				$stmt->bind_param("s", $user);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
				    $id2 = $row['user_id'];
				    $type = $row['user_type'];
                    $stata = $row['Status'];
		}

	loginUser($connn, $user, $pass, $type, $date, $time, $id2);
}
} else {
	header("Location: login.php");
	exit();
}

