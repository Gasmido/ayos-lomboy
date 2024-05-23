<?php
include 'head.php';
include 'db_conn.php';

if (isset($_POST["submit"])) {
	$idss = $_POST["cor"];
	$_SESSION['eidd'] = $_POST["cor"];
}
elseif (isset($_SESSION['eidd'])) {
    $idss = $_SESSION['eidd'];
    }

else {
	header("location: news");
}

$sql2 = "SELECT * FROM announcements WHERE id=?";
				$stmt = $connn->prepare($sql2); 
				$stmt->bind_param("s", $idss);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
				    $newsTitle = $row['newsTitle'];
				    $newsDesc = $row['newsDesc'];
						$newsPic = $row['newsPic'];
						$curdate = $row['curdate'];
					}
					$stmt->close();
?>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="news">Back</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage docud">
	<div class="docu-homenew">
		<div>
				<img src="image/<?= $newsPic ?>">
			</div>
		<div class="docu-formnew">
			<div>
				<h1><?= $newsTitle ?></h1>
				<p style="color: #454545;"><?= $curdate ?></p>
			</div>
			<div>
				<hr>
				<p><?= $newsDesc ?></p>
			</div>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>