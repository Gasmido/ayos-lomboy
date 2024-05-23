<?php
session_start();
if (!isset($_SESSION['emal'])) {
	header("location: Blotter.php?error=asfadsf	");
	}
	 


include('smtp/PHPMailerAutoload.php');
$user = $_SESSION["emal"];
$receiverEmail=$_SESSION["emal"];
$subject="Blotter Status";
$emailbody="The blotter you have filed using the barangay website is now being taken into consideration by the officials of Barangay Ayos Lomboy <p style='font-size:18px;color:grey;'>(for further questions please head to the Barangay Hall.)</p>";
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
		header("location: Blottermore");
		unset($_SESSION['emal']);
		exit();
	}
}

?>