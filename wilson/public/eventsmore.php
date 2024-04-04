<?php
include '../include/head.php';
include '../include/db_conn.php';
if (isset($_POST["submit"])) {
	$id = $_POST["cor"];
}
if ($id != ""){
$sql = "SELECT * FROM announcements WHERE id=?";
				$stmt = $connn->prepare($sql); 
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				while ($row = $result->fetch_assoc()) {
				    $eventTitle = $row['eventTitle'];
				    $eventDesc = $row['eventDesc'];
						$eventPic = $row['eventPic'];
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
      <li><a class="ac" href="../public/events.php">Back</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage docud">
<div class="docu-homenew">
		<div>
				<img src="image/<?= $eventPic ?>">
			</div>
		<div class="docu-formnew">
			<div>
				<h1><?= $eventTitle ?></h1>
				<p style="color: #454545;"><?= $curdate ?></p>
			</div>
			<div>
				<hr>
				<p><?= $eventDesc ?></p>
			</div>
		</div>
	</div>
</div>

<?php
include '../include/footer.php';
}
else {
	header('location:Homepage.php');
}
?>