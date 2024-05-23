<?php


if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$houseno=$_POST['houseno'];
	$st=$_POST['st'];
	$prk=$_POST['prk'];
	$datereg=$_POST['datereg'];
	$inhNo = count($_POST['inhabitant']);
	$inh = ($_POST['inhabitant']);
	 $brgy = "Ayos Lomboy";
    $Munici = "Guimba";
    $prv = "Nueva Ecija";

	require_once 'db_conn.php';
	require_once 'func.php';

	$sql1 = "SELECT * FROM household WHERE id=". $id;
                 	$result1 = $connn-> query($sql1);
                 	if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $blotno = $row['HouseNo'];
                        }
                    }
                   
       if ($blotno == $houseno) {
       		editHousehold($connn,$houseno,$st,$prk,$datereg,$Munici,$brgy,$prv,$inhNo,$inh,$id); 
       }
		elseif ($blotno != $houseno) {
			if (duplicatehouseno($connn, $houseno) !== false) {
				session_start();
				$_SESSION["sta"] = "Household Number Already Exists!";
				$_SESSION["iss"] = $id;
				header("location: Householdmore");
				exit();
			}
			else {
			editHousehold($connn,$houseno,$st,$prk,$datereg,$Munici,$brgy,$prv,$inhNo,$inh,$id); 
		}
		}
		

}

else {
	header("Location: Blotter.php");
}