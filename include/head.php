
<!DOCTYPE html>

<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;">

<head>
	<title>
		Ayos Lomboy Barangay Management System
	</title>
					    <?php
session_start();
$csstime = date ("Y-m-d\TH-i", filemtime($_SERVER["DOCUMENT_ROOT"] . '/CSS/style.css'));
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
    <link rel="stylesheet" href="../CSS/style.css<?='?'.$csstime ?>">   
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


