<?php
session_start();
if (isset($_POST['submitv'])) {
 $user1 = $_SESSION['useriD'];
 $user = $_SESSION['emailll'];
 $pass = $_SESSION['ssap'];
 $otp = $_POST['otp'];
	$sendotp = $_POST['send'];
 $fingerprint = $_SESSION['fingerprint'];
date_default_timezone_set('Asia/Manila');
  	$date = date('Y-m-d');  
  	$time = date('H:i:s'); 

unset($_SESSION['useriD']);
unset($_SESSION['emailll']);
unset($_SESSION['ssap']);

 require_once 'db_conn.php';
	require_once 'func.php';


	 if ($otp === "") {
		header("location: loginWeb.php?error=Empty_input");
		exit();
	} elseif ($otp != $sendotp) {
		header("location: loginWeb.php?error=wrong_input");
		exit();
	}
$sql11 = "INSERT INTO users_browser (user_id, fingerprint) VALUES (?,?);";
			$stmt11 = mysqli_stmt_init($connn);
			if (!mysqli_stmt_prepare($stmt11, $sql11)) {
				header("location: sign_up?error=stmtfailed");
				exit();
			}
			mysqli_stmt_bind_param($stmt11, "ss", $user1, $fingerprint);
			mysqli_stmt_execute($stmt11);


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
loginUser($connn, $user, $pass, $type, $date, $time, $id2, $fingerprint);


} else {
	header('location: login');
}

?>