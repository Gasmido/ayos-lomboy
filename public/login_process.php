<?php
session_start();

if (isset($_POST["submit"])) {
	$user = $_POST["user1"];
	$pass = $_POST["pass"];
	date_default_timezone_set('Asia/Manila');
  	$date = date('Y-m-d');  
  	$time = date('H:i:s');  
$secretKey = '6LdC5r4pAAAAAI57LWy8yH6YVV_ndKLzuQefGXUO'; 
	require "../include/db_conn.php";
	require_once "func.php";
	
	if (empInpLogin($user, $pass) !== false) {
		header("location: login.php?error=Empty_input");
		exit();
	} 
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
		 
		            // Verify the reCAPTCHA response 
		            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
		             
		            // Decode json data 
		            $responseData = json_decode($verifyResponse); 
		            if($responseData->success){ 
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
					 else { 
		            header("location: login.php?error=wrong");
					exit();
		            } 
		        }else { 
		            header("location: login.php?error=wrongf");
					exit();
	

	
}
} else {
	header("Location: login");
	exit();
}

