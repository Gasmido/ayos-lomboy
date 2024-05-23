<?php
session_start();
$type = $_SESSION["user_type"];

if ($type == "admin") 
{
    $csstime = date ("Y-m-d\TH-i", filemtime($_SERVER["DOCUMENT_ROOT"] . '/CSS/style.css'));
?>
<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncut="return false;" onpaste="return false;">
<head>
	<title>
		Ayos Lomboy Barangay Management System
	</title>
	<meta charset="UTF-8">  
	
	<link rel="icon" href="image/logoo.png" type="image/icon type">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="Datatables/css/bootstrap.css"> 
    <link rel="stylesheet" href="Datatables/css/dataTables.bootstrap.css"> 
    <link rel="stylesheet" href="CSS/style.css<?='?'.$csstime ?>"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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
  header("location:Homepage");
}