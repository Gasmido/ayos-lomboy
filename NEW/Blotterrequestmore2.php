<?php


if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$bno=$_POST['blotterno'];
	$fname=$_POST['name'];
	$complainant=$_POST['complainant'];
	$complained=$_POST['complained'];
	$loc=$_POST['Location'];
	$dof=$_POST['DoF'];
	$status= "Active";
	$BI=$_POST['BI'];
	$pin=$_POST['pin'];
	$userID=$_POST['userID'];
	$sstat = "Active";

	require_once 'db_conn.php';
	require_once 'func.php';

	$sql1 = "SELECT * FROM blotter WHERE id=". $id;
                 	$result1 = $connn-> query($sql1);
                 	if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $blotno = $row['blotter_no'];
                        }
                    }
                   
       if ($blotno == $bno) {
       		editBlotter2($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $sstat, $id, $userID); 
       }
		elseif ($blotno != $bno) {
		 	if (duplicateBlot($connn, $bno) !== false) {
			session_start();
			$_SESSION["sta"] = "Already Exists!";
			$_SESSION["iss"] = $id;
			header("location: Blotterrequestmore");
			exit();
			}
			else {
			editBlotter2($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $sstat, $id, $userID); 
		}
		}
		

}
elseif (isset($_POST['submitu'])) {
	$id=$_POST['id'];
	$sstat = "Denied";
	require_once 'db_conn.php';
	require_once 'func.php';
	
	editBlotter3($connn, $sstat, $id); 
}
else {
	header("Location: Blotter.php");
}