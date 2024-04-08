<?php

session_start();
	$user = $_SESSION["email"]; 
	$pass= $_SESSION["pass"]; 
	$use= $_SESSION["usertype"]; 
	$lastname= $_SESSION["lastname"]; 
	$firstname= $_SESSION["firstname"]; 
	$middleinitial= $_SESSION["middleinitial"]; 
	$extension= $_SESSION["extension"]; 
	$status= $_SESSION["status"]; 
	$currentDate= $_SESSION["currentDate"]; 
	$no= $_SESSION["no"]; 
include('smtp/PHPMailerAutoload.php');

$otp=rand(100000,999999);
$receiverEmail=$_SESSION["email"];
$subject="Email Verification";
$emailbody="Your 6 Digit OTP Code: ";

echo smtp_mailer($receiverEmail,$subject,$emailbody.$otp, $otp);

function smtp_mailer($to,$subject, $msg, $otp){
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
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		$_SESSION['otp'] = $otp;
		header("location: register2.php");
	}
}

?>