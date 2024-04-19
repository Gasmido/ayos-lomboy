<?php
session_start();
        if (isset($_GET["error"])) {
		if ($_GET["error"] == "access_denied") {
		    header("Location: login");
		    
		}
        }



require_once "config.php";
require_once "func.php";

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'last_name' => $google_account_info['familyName '],
    'verifiedEmail' => $google_account_info['verifiedEmail'],
    'token' => $google_account_info['id']
  ];
}


// duplicate database
    date_default_timezone_set('Asia/Manila');
   $currentDate = gmdate('Y-m-d');
    $no = 0;
    $status = "Processing";
    $type = "user";

    $email = $userinfo['email'];
    $fname = $userinfo['first_name'];
    $lname = $userinfo['last_name'];
    $ve = $userinfo['verifiedEmail'];
    $token = $userinfo['token'];
	$exname = "";
	$miname = "";

$sql = "SELECT * FROM users WHERE user_email = '{$userinfo['email']}'";
$result = mysqli_query($connn, $sql);
  if (mysqli_num_rows($result) > 0) {
    //user exists
    $userdata = mysqli_fetch_assoc($result);

  } else {
    // user not exists
    $sql = "INSERT INTO users (user_email, user_type, Last_name, First_name, Middle_name, Extension_name, Status, dateReg, RequestNo, verifiedEmail, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?);";
  $stmt = mysqli_stmt_init($connn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: sign_up?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssssssss", $email,$type,$lname,$fname,$exname,$miname,$status,$currentDate,$no,$ve,$token);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  }


//SESSION
 $sql2 = "SELECT * FROM users WHERE user_email=?";
        $stmt = $connn->prepare($sql2); 
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $id2 = $row['user_id'];
            $type = $row['user_type'];
            $stata = $row['Status'];
            $firstname = $row['First_name'];
            $lastname = $row['Last_name'];
			$mname = $row['Middle_name'];
			$ename = $row['Extension_name'];
            $purok = $row['purok'];
            $citizenship = $row['citizenship'];
        }
  $_SESSION['user_token'] = $userinfo['token'];
  $_SESSION['ID'] = $id2;
  $_SESSION['user_type'] = $type;
  $_SESSION['status'] = $stata;
  $_SESSION['lastname'] = $lastname;
  $_SESSION['firstname'] = $firstname;
  $_SESSION['extensionname'] = $ename;
  $_SESSION['middlename'] = $mname;
  $_SESSION['purok'] = $purok;
  $_SESSION['citizenship'] = $citizenship;


if ($purok == "" && $citizenship == "") {
  header("Location: GoogleAccSettings");
  exit();
}
else {
  header("Location: Homepage");
}

  // now you can use this profile info to create account in your website and make user logged in.




?>

