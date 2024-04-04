<?php
session_start();
$type = $_SESSION["user_type"];
if ($type == "user") {
  header("location:Homepage.php");
}
else if ($type == "admin") {
    header("location:home-section.php");
}
else {
  header("location:Homepage.php");
}
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Ayos Lomboy Barangay Management System
	</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="topbar">
		<a href="#">Home</a>
		<a href="#">Home2</a>
		<a href="#">Home2</a>
		<a href="#">Home3</a>
		     <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
	</div>
	<div class="sidebar">
		<div class="logo-details">
			<span>
				Ayos Lomboy	
			</span>
		</div>
		<ul class="nav-links">
        <li>
          <a href="#">
            <i class='bx bx-info-circle'></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-table'></i>
            <span class="links_name">Oficials and Staff</span>
          </a>
        </li>
		 <li>
          <a href="#">
           <i class='bx bx-paperclip'></i>
            <span class="links_name">Residents Record</span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class='bx bxl-facebook-circle'></i>
            <span class="links_name">Household Records</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bxl-facebook-circle'></i>
            <span class="links_name">Barangay Certificates</span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class='bx bxl-facebook-circle'></i>
            <span class="links_name">Blotter Records</span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class='bx bxl-facebook-circle'></i>
            <span class="links_name">Documents Requests</span>
          </a>
        </li>
         <li>
          <a href="#">
            <i class='bx bxl-facebook-circle'></i>
            <span class="links_name">Revenues Record</span>
          </a>
        </li>
      </ul>
	</div>

	<div class="home-section">
		 <h1>Fixed Top Menu</h1>
  <h2>Scroll this page to see the effect</h2>
  <h2>The navigation bar will stay at the top of the page while scrolling</h2>

  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
  <p>Some text some text some text some text..</p>
	</div>
</body>
</html>
-->