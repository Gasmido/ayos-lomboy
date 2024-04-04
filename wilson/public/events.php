<?php
include '../include/db_conn.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings.php");
	exit();
}
}
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
  
</script>
   </head>
<body>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="Homepage.php">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage">
	
	<div id="s" class="Services">
		<div class="servtitle">
			<h1>
				EVENTS
			</h1>
			<p>
				See latest events in Ayos Lomboy.
			</p>
		</div>
		<div class="servicescontent hidden">
			 <?php
                    $sql = "SELECT id, eventTitle, eventDesc, eventPic from announcements where eventTitle != ''";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
																	<div class="boximg">
																		<img width="360" height="210" src="image/'. $row['eventPic'] .'">
																	</div>
																	<div class="evedesc">
																		<h2>
																			'. $row['eventTitle'] .'
																		</h2>
																	</div>
																	<form action="eventsmore.php" method="post">
																		<section class="boxbut">
																			<input type="text" name="cor" value="'. $row['id'] .'" hidden></input>
																					<button class="btnservice" type="submit" name="submit">Read More</button>
																		</section>
																	</form>
																</div>';
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no Events at the moment</p>";
                    }
                    $connn-> close();
                   ?>	
			
		</div>
	</div>
</div>
<?php
include '../include/footer.php';
?>