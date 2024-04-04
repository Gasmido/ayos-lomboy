<?php
session_start();
$type = $_SESSION["user_type"];

if ($type == "admin") 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Ayos Lomboy Barangay Management System
	</title>
	<meta charset="UTF-8">  
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../DataTables/css/bootstrap.css"> 
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap.css"> 
    <link rel="stylesheet" href="../CSS/style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
    	localStorage.removeItem("txt1")
		localStorage.removeItem("txt3")
		localStorage.removeItem("txt2")
        localStorage.removeItem("txt5")
		localStorage.removeItem("txt6")
	</script>
</head>
<?php
}
else {
  header("location:Homepage.php");
}