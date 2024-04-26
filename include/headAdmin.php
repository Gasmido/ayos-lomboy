<?php
session_start();
$type = $_SESSION["user_type"];

if ($type == "admin") 
{
?>
<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
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
	<script type="text/javascript">
    function myRightClick() {
      alert("Right click is not allowed.");
      return false;
    }

    document.onkeydown = function(e) {
      if(event.keyCode == 123) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
    }
  </script>
</head>
<?php
}
else {
  header("location:Homepage.php");
}