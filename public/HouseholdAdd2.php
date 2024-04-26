<?php
if (isset($_POST['submit'])) {
	$houseno=$_POST['houseno'];
	$st=$_POST['st'];
	$prk=$_POST['prk'];
	$datereg=$_POST['datereg'];
	$inhNo = count($_POST['inhabitant']);
	$inh = ($_POST['inhabitant']);
	 $brgy = "Ayos Lomboy";
    $Munici = "Guimba";
    $prv = "Nueva Ecija";
    
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if (duplicatehouseno($connn, $houseno) !== false) {
		session_start();
		$_SESSION["sta"] = "Already Exists!";
		header("location: Householdadd");
		exit();
	}

	addHousehold($connn,$houseno,$st,$prk,$datereg,$Munici,$brgy,$prv,$inhNo,$inh); 

}
else {
	header("Location: Householdadd");
	exit();
}