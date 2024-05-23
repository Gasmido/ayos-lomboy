<?php
session_start();
include_once "db_conn.php";
$idd = $_SESSION['emaill'];
date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');  
    $time = date('H:i:s'); 
$sql2 = "SELECT * FROM users WHERE user_id=?";
        $stmt = $connn->prepare($sql2); 
        $stmt->bind_param("s", $idd);
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
        unset($_SESSION['emaill']);
        $sql = "UPDATE users SET logdate=?, logtime=? WHERE user_id=?";
        $stmt = mysqli_stmt_init($connn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("location: login?error=stmtfailed");
          exit();
        }
        mysqli_stmt_bind_param($stmt, "ssi", $date, $time, $id2);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
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

?>