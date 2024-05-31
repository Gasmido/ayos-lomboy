<?php
if (isset($_POST['lokooka'])) {
	$id = $_POST['id'];

	include_once "db_conn.php";
	include_once "func.php";


	removeTanod($connn, $id);

}
 else {
	header("location: OffStaff");
}




?>