<?php


if (isset($_POST['submit'])) {
	$fname=$_POST['name'];
	$position='Tanod';
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Tanod";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: TanodAdd");
		exit();
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
			header("location: TanodAdd");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: TanodAdd");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			addTanod($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
else {
	header("Location: OffStaff");
	exit();
}