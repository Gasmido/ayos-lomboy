<?php


if (isset($_POST['c1'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Finance";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAdd");
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
			header("location: OffStaffCommitteeAdd");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAdd");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c2'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "LandTax";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddL");
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
			header("location: OffStaffCommitteeAddL");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddL");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c3'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "PeaceAndOrder";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddP");
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
			header("location: OffStaffCommitteeAddP");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddP");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c4'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Infrastructure";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddI");
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
			header("location: OffStaffCommitteeAddI");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddI");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c5'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Health";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddH");
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
			header("location: OffStaffCommitteeAddH");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddH");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c6'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Education";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddE");
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
			header("location: OffStaffCommitteeAddE");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddE");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c7'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "SocialServices";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddS");
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
			header("location: OffStaffCommitteeAddS");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddS");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c8'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "Agriculture";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddA");
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
			header("location: OffStaffCommitteeAddA");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddA");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
elseif (isset($_POST['c9'])) {
	$fname=$_POST['name'];
	$position=$_POST['position'];
	$termstart=$_POST['termstart'];
	$termend=$_POST['termend'];
	$ss='Active';
	$com = "SK";
	
	require_once '../include/db_conn.php';
	require_once 'func.php';

	if ($_FILES['image']['error'] === 4) {
		$_SESSION['wrongs'] = "Please Add Image!";
		header("location: OffStaffCommitteeAddSK");
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
			header("location: OffStaffCommitteeAddSK");
		exit();
		}
		elseif ($fileSize > 10000000) {
			header("location: Announcementsevents.php?error=10000");
			$_SESSION['big'] = "Image size is too big!";
			header("location: OffStaffCommitteeAddSK");
		exit();
		}
		else {
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;

			move_uploaded_file($tmpName, 'image/' . $newImageName);
			
			AddCom($connn, $newImageName, $fname, $position, $termstart, $termend,$ss,$com);
		}
	}
}
else {
	header("Location: OffStaffCommittee");
	exit();
}