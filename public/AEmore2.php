<?php

session_start();
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	$id=$_POST['id'];
	date_default_timezone_set('Asia/Manila');
  	$date = date('Y-m-d');  
	
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($title == "") {
		$_SESSION['title'] = "Title was removed!";
		$_SESSION["iss"] = $id;
		header("location: AEmore");
		exit();
	}
	elseif ($desc == "") {
		$_SESSION['desc'] = "Description was removed!";
		$_SESSION["iss"] = $id;
		header("location: AEmore");
		exit();
	}
	elseif ($_FILES['image']['error'] === 4) {
		addEvents2($connn, $title, $desc, $date, $id);
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
			$_SESSION["iss"] = $id;
			header("location: AEmore");
		exit();
		}
		elseif ($fileSize > 10000000) {
			$_SESSION['big'] = "Image size is too big!";
			$_SESSION["iss"] = $id;
		header("location: AEmore");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			addEvents3($connn, $title, $desc, $newImageName, $date, $id);
		}
	}
	
}
else {
	header("Location: Announcements.php");
	exit();
}