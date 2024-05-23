<?php

session_start();
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$desc=$_POST['desc'];
	date_default_timezone_set('Asia/Manila');
  	$date = date('Y-m-d');  
	
	
	require_once 'db_conn.php';
	require_once 'func.php';

	if ($title == "") {
		$_SESSION['title'] = "Please Add Title!";
		header("location: Announcementsevents");
		exit();
	}
	elseif ($desc == "") {
		$_SESSION['desc'] = "Please Add Description!";
		header("location: Announcementsevents");
		exit();
	}

	elseif ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: Announcementsevents");
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
			header("location: Announcementsevents.php?error=type");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			addEvents($connn, $title, $desc, $newImageName, $date);
		}
	}
	
}
else {
	header("Location: Announcementsevents");
	exit();
}