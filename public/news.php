<?php
include '../include/db_conn.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings");
	exit();
}
}
$csstime = date ("Y-m-d\TH-i", filemtime($_SERVER["DOCUMENT_ROOT"] . '/CSS/style.css'));
?>
<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css<?='?'.$csstime ?>">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage">
	
	<div id="s" class="Services">
		<div class="servtitle">
			<h1>
				NEWS
			</h1>
			<p>
				Get informed about the latest news in Ayos Lomboy.
			</p>
		</div>
		<div class="servicescontent hidden">
			 <?php
                    $sql = "SELECT id, newsTitle, newsDesc, newsPic from announcements where newsTitle != '' && removed IS NULL";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
																	<div class="boximg">
																		<img width="360" height="210" src="image/'. $row['newsPic'] .'">
																	</div>
																	<div class="evedesc">
																		<h2>
																			'. $row['newsTitle'] .'
																		</h2>
																	</div>
																	<form action="newsmore" method="post">
																		<section class="boxbut">
																			<input type="text" name="cor" value="'. $row['id'] .'" hidden></input>
																					<button class="btnservice" type="submit" name="submit">Read More</button>
																		</section>
																	</form>
																</div>';
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no News at the moment</p>";
                    }
                    $connn-> close();
                   ?>				
		</div>
	</div>
</div>
<?php
include '../include/footer.php';
?>