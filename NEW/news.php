<?php
include 'head.php';
include 'db_conn.php';

unset($_SESSION['eidd']);
?>

<body>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="Homepage">Home</a></li>
   
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
include 'footer.php';
?>