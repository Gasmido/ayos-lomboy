<?php
if (isset($_POST['submit'])) {
	$id=$_POST['ids'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$ename = $_POST['ename'];
	$datereg = $_POST['datereg'];
	$birth = $_POST['birth'];
	$sex = $_POST['sex'];
	$citizenship = $_POST['citizenship'];
	$civil = $_POST['civil'];
	$brgy = $_POST['brgy'];
	$purok = $_POST['purok'];
	$city = $_POST['city'];
	$province = $_POST['province'];

	require 'db_conn.php';
	require_once 'func.php';

	$sql1 = "SELECT * FROM resident WHERE id=". $id;
                 	$result1 = $connn-> query($sql1);
                 	if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $f2name = $row['firstname'];
                            $m2name = $row['middlename'];
                            $l2name = $row['lastname'];
                            $e2name = $row['extensionname'];
                        }
                    }   
       if ($fname == $f2name && $mname == $m2name && $lname == $l2name && $ename == $e2name) {
       		editResident($connn, $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg, $id); 
       }
		elseif ($fname != $f2name || $mname != $m2name || $lname != $l2name || $ename != $e2name) {
		 	if (duplicateResident($connn, $fname, $mname, $lname, $ename) !== false) {
			session_start();
			$connn->close();
			$_SESSION["sta"] = "Already Exists!";
			$_SESSION["iss"] = $id;
			header("location: Residentmore");
			exit();
			}
			
			editResident($connn, $fname, $mname, $lname, $ename, $birth, $sex, $citizenship, $civil, $brgy, $purok, $city, $province, $datereg, $id); 		
		}
		

}
else {
	header("Location: ResidentRecord.php");
}