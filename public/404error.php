<?php

    session_start();   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script type="text/javascript">
        localStorage.removeItem("txt1")
		localStorage.removeItem("txt3")
		localStorage.removeItem("txt2")
    localStorage.removeItem("txt4")
    localStorage.removeItem("txt7")
    localStorage.removeItem("txt8")
    localStorage.removeItem("txt9")
</script>
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage.php">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="loginmain">
	<div class="errr" style="margin-bottom: 0px;">
		<h1>ERROR 404</h1>
	</div>
	<div class="errr" style="margin-top:10px">
 		<h3>Page Not Found</h3>
 	</div>
 

  </div>
</body>
<?php
include "../include/footer.php";
?>