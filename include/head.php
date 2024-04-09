
<!DOCTYPE html>

<html lang="en">

<head>
	<title>
		Ayos Lomboy Barangay Management System
	</title>
					    <?php
session_start();
if (isset($_SESSION['user_type'])) {
if ($_SESSION["user_type"] == "admin") {
 	header("Location: home-section");	
 }
 elseif (isset($_SESSION['ID'])) {
$id = $_SESSION['ID'];
$status = $_SESSION['status'];
$lastname = $_SESSION['lastname'];
$firstnames = $_SESSION['firstname'];
$middlename = $_SESSION['middlename'];
$extensionname = $_SESSION['extensionname'];
$purokss = $_SESSION['purok'];
$ciiit = $_SESSION['citizenship'];
}
} 


?>
	

	<meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
    	localStorage.removeItem("txt1")
		localStorage.removeItem("txt3")
		localStorage.removeItem("txt2")
        localStorage.removeItem("txt5")
		localStorage.removeItem("txt6")
	</script>

</head>


