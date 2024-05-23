<?php

session_start();
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
    $name = $_POST['name'];
    $termstart = $_POST['termstart'];
    $termend = $_POST['termend'];
    $status = $_POST['status'];

	require_once 'db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		editTanod2($connn, $name, $termstart, $termend, $status, $id);
	}
	else {
		$fileName = $_FILES["image"]["name"];
		$fileSize = $_FILES['image']["size"];
		$tmpName = $_FILES['image']['tmp_name'];

		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));
		if (!in_array($imageExtension, $validImageExtension)) {

			$_SESSION['wrong'] = "Wrong image file type!";
			header("location: TanodStaffmore");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: TanodStaffmore");
			$_SESSION['big'] = "Image size is too big!";
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			editTanod($connn, $name, $termstart, $termend, $newImageName, $status, $id);
		}
	}

}
else {
	header("Location: OffStaff");
}