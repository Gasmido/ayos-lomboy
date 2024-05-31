<?php
session_start();
if (!isset($_SESSION['emal'])) {
	header("location: DocReq");
	}
	 


include('smtp/PHPMailerAutoload.php');
$de=$_SESSION['de'];
$dt = $_SESSION['dt'];
$user = $_SESSION["emal"];
$receiverEmail=$_SESSION["emal"];
$subject=$dt;
if ($de == "Denied") {
$emailbody="Your requested ". $dt ." have been denied by the Barangay.<p style='font-size:18px;color:grey;'>(Please request for a new one or contact our Officials.)</p>";
}
else {
$emailbody="Your requested ". $dt ." have been approved and filled out by the Barangay and is now ready to be claimed.<p style='font-size:18px;color:grey;'>(You may now claim and pay for it inside the Barangay.)</p>";
}
echo smtp_mailer($receiverEmail,$subject,$emailbody);

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "barangayayoslomboy@gmail.com"; //write sender email address
	$mail->Password = "plan xkjs bbvs jsgc"; //write app password of sender email
	$mail->SetFrom("barangayayoslomboy@gmail.com"); //write sender email address
	$mail->Subject = $subject;
	$mail->Body ="<span style='font-size:24px;text-align:center;'>".$msg."</span>";
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{	
		unset($_SESSION['emal']);
		unset($_SESSION['dt']);
		unset($_SESSION['de']);
		if (isset($_SESSION['COR'])) {
		header("location: DocReqmoreCOR");
		exit();
		}else {
		header("location: DocReqmore");
			exit();
	}
	}
}

?>