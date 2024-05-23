<?php


if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$bno=$_POST['blotterno'];
	$fname=$_POST['name'];
	$complainant=$_POST['complainant'];
	$complained=$_POST['complained'];
	$loc=$_POST['Location'];
	$dof=$_POST['DoF'];
	$status=$_POST['status'];
	$BI=$_POST['BI'];
	$pin=$_POST['pin'];

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
       		editBlotter($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
       }
		elseif ($blotno != $bno) {
		 	if (duplicateBlot($connn, $bno) !== false) {
			session_start();
			$_SESSION["sta"] = "Already Exists!";
			$_SESSION["iss"] = $id;
			header("location: Blottermore");
			exit();
			}
			else {
			editBlotter($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
		}
		}
		

}
if (isset($_POST['submitas'])) {
	$id=$_POST['id'];
	$bno=$_POST['blotterno'];
	$fname=$_POST['name'];
	$complainant=$_POST['complainant'];
	$complained=$_POST['complained'];
	$loc=$_POST['Location'];
	$dof=$_POST['DoF'];
	$status=$_POST['status'];
	$BI=$_POST['BI'];
	$pin=$_POST['pin'];

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
       		editBlotterA($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
       }
		elseif ($blotno != $bno) {
		 	if (duplicateBlot($connn, $bno) !== false) {
			session_start();
			$_SESSION["sta"] = "Already Exists!";
			$_SESSION["iss"] = $id;
			header("location: BlottermoreA");
			exit();
			}
			else {
			editBlotterA($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
		}
		}
		

}
if (isset($_POST['submitis'])) {
	$id=$_POST['id'];
	$bno=$_POST['blotterno'];
	$fname=$_POST['name'];
	$complainant=$_POST['complainant'];
	$complained=$_POST['complained'];
	$loc=$_POST['Location'];
	$dof=$_POST['DoF'];
	$status=$_POST['status'];
	$BI=$_POST['BI'];
	$pin=$_POST['pin'];

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
       		editBlotterS($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
       }
		elseif ($blotno != $bno) {
		 	if (duplicateBlot($connn, $bno) !== false) {
			session_start();
			$_SESSION["sta"] = "Already Exists!";
			$_SESSION["iss"] = $id;
			header("location: BlottermoreS");
			exit();
			}
			else {
			editBlotterS($connn, $bno, $fname, $complainant, $complained, $loc, $dof, $status, $BI, $pin, $id); 
		}
		}
		

}
else {
	header("Location: Blotter.php");
}