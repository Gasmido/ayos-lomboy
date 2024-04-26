<?php
if (isset($_POST['lokoka'])) {
	$id = $_POST['id'];

	include_once "../include/db_conn.php";
	include_once "func.php";


	removeAnnounceEvents($connn, $id);

}
elseif (isset($_POST['lokokas'])) {
	$id = $_POST['id'];

	include_once "../include/db_conn.php";
	include_once "func.php";


	removeAnnounceNews($connn, $id);

}
 else {
	header("location: Announcements");
}




?>