<?php
include '../include/head.php';
include '../include/topbar.php';
include '../include/db_conn.php';
if (isset($_SESSION['user_type'])) {
if ($_SESSION["user_type"] == "admin") {
 	header("Location: home-section");
 	exit();	
 } 
}
elseif (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings");
	exit();
}
}
?>
<div class="homepage" style="">
	<div id="h" class="Home">
		<div class="homepic">
			<img class="homepice" src="image/home.jpeg">
		</div>
		<div class="homecontent hidden">
			
			<h1>
				BARANGAY AYOS LOMBOY
			</h1>
			<p>
				<i class='bx bxs-time' ></i>
				Open Hours: Monday to Saturday (7:30AM - 5PM)
			</p>
			<p>
				<i class='bx bxs-contact' ></i>
				Contact: 0947 292 5406
			</p>
			<div class="logoo">
				<img class="logoo2" src="image/logoo.png">
			</div>
			<div>
				<p class="are" style="color:#454545">
				 A vibrant and close-knit community nestled within the heart of Guimba, Nueva Ecija. Where our barangay has evolved into a harmonious blend of peace and progress.</p>
			</div>
		</div>
	</div>
	<div id="a" class="AboutUs">
		<div class="aboutuscontent hidden">
		
			<div class="aboutg">

				<?php
            		$sql1 = "SELECT * FROM officials WHERE id=1";
                 	$result1 = $connn-> query($sql1);
                 	if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $name1 = $row['name'];
                            $position1 = $row['position'];
                            $image1 = $row['image'];
                            $image1 = $row['image'];
                            $status1 = $row['status'];
                        }
                    }
                    $sql2 = "SELECT * FROM officials WHERE id=2";
                 	$result2 = $connn-> query($sql2);
                 	if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $name2 = $row['name'];
                            $position2 = $row['position'];
                            $image2 = $row['image'];
                            $status2 = $row['status'];
                        }
                    }
                    $sql3 = "SELECT * FROM officials WHERE id=3";
                 	$result3 = $connn-> query($sql3);
                 	if ($result3-> num_rows > 0) {
                        while ($row = $result3-> fetch_assoc()) {
                            $name3 = $row['name'];
                            $position3 = $row['position'];
                            $image3 = $row['image'];
                            $status3 = $row['status'];
                        }
                    }
                    $sql4 = "SELECT * FROM officials WHERE id=4";
                 	$result4 = $connn-> query($sql4);
                 	if ($result4-> num_rows > 0) {
                        while ($row = $result4-> fetch_assoc()) {
                            $name4 = $row['name'];
                            $position4 = $row['position'];
                            $image4 = $row['image'];
                            $status4 = $row['status'];
                        }
                    }
                    $sql5 = "SELECT * FROM officials WHERE id=5";
                 	$result5 = $connn-> query($sql5);
                 	if ($result5-> num_rows > 0) {
                        while ($row = $result5-> fetch_assoc()) {
                            $name5 = $row['name'];
                            $position5 = $row['position'];
                            $image5 = $row['image'];
                            $status5 = $row['status'];
                        }
                    }
                    $sql6 = "SELECT * FROM officials WHERE id=6";
                 	$result6 = $connn-> query($sql6);
                 	if ($result6-> num_rows > 0) {
                        while ($row = $result6-> fetch_assoc()) {
                            $name6 = $row['name'];
                            $position6 = $row['position'];
                            $image6 = $row['image'];
                            $status6 = $row['status'];
                        }
                    }
                    $sql7 = "SELECT * FROM officials WHERE id=7";
                 	$result7 = $connn-> query($sql7);
                 	if ($result7-> num_rows > 0) {
                        while ($row = $result7-> fetch_assoc()) {
                            $name7 = $row['name'];
                            $position7 = $row['position'];
                            $image7 = $row['image'];
                            $status7 = $row['status'];
                        }
                    }
                    $sql8 = "SELECT * FROM officials WHERE id=8";
                 	$result8 = $connn-> query($sql8);
                 	if ($result8-> num_rows > 0) {
                        while ($row = $result8-> fetch_assoc()) {
                            $name8 = $row['name'];
                            $position8 = $row['position'];
                            $image8 = $row['image'];
                            $status8 = $row['status'];
                        }
                    }
                    $sql9 = "SELECT * FROM officials WHERE id=9";
                 	$result9 = $connn-> query($sql9);
                 	if ($result9-> num_rows > 0) {
                        while ($row = $result9-> fetch_assoc()) {
                            $name9 = $row['name'];
                            $position9 = $row['position'];
                            $image9 = $row['image'];
                            $status9 = $row['status'];
                        }
                    }
                    $sql10 = "SELECT * FROM officials WHERE id=10";
                 	$result10 = $connn-> query($sql10);
                 	if ($result10-> num_rows > 0) {
                        while ($row = $result10-> fetch_assoc()) {
                            $name10 = $row['name'];
                            $position10 = $row['position'];
                            $image10 = $row['image'];
                            $status10 = $row['status'];
                        }
                    }
                	$sql11 = "SELECT * FROM officials WHERE id=11";
                 	$result11 = $connn-> query($sql11);
                 	if ($result11-> num_rows > 0) {
                        while ($row = $result11-> fetch_assoc()) {
                            $name11 = $row['name'];
                            $position11 = $row['position'];
                            $image11 = $row['image'];
                            $status11 = $row['status'];
                        }
                    }
        		?>
        		<div class="aboutgg">	
        			<h1>Meet our Council</h1>
        		</div>
        		<div class="gallery2">

				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image1 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name1; ?></h3>
				  	<p><?php echo $position1; ?></p>
				  	<?php
					  	if ($status1 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image2 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name2; ?></h3>
				  	<p><?php echo $position2; ?></p>
				  	<?php
					  	if ($status2 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank" >
				    <img src="image/<?= $image3 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name3; ?></h3>
				  	<p><?php echo $position3; ?></p>
				  	<?php
					  	if ($status3 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image4 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name4; ?></h3>
				  	<p><?php echo $position4; ?></p>
				  	<?php
					  	if ($status4 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image5 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name5; ?></h3>
				  	<p><?php echo $position5; ?></p>
				  	<?php
					  	if ($status5 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image6 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name6; ?></h3>
				  	<p><?php echo $position6; ?></p>
				  	<?php
					  	if ($status6 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image7 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name7; ?></h3>
				  	<p><?php echo $position7; ?></p>
				  	<?php
					  	if ($status7 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				   <a target="_blank">
				    <img src="image/<?= $image8 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name8; ?></h3>
				  	<p><?php echo $position8; ?></p>
				  	<?php
					  	if ($status8 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				 <a target="_blank">
				    <img src="image/<?= $image9 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name9; ?></h3>
				  	<p><?php echo $position9; ?></p>
				  	<?php
					  	if ($status9 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image10 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name10; ?></h3>
				  	<p><?php echo $position10; ?></p>
				  	<?php
					  	if ($status10 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
				<div class="gallery">
				  <a target="_blank">
				    <img src="image/<?= $image11 ?>" alt="picture" width="350" height="600">
				  </a>
				  <div class="desc">
				  	<h3><?php echo $name11; ?></h3>
				  	<p><?php echo $position11; ?></p>
				  	<?php
					  	if ($status11 == "Active") {
					  		echo '
						  	<p style="display:inline;color:green;">⦿</p>
						  	<p style="display:inline">Active</p>
						  	';
					  	}
					  	else {
					  		echo '
						  	<p style="display:inline;color:red;">⦿</p>
						  	<p style="display:inline">Inactive</p>
						  	';
					  	}
				  	?>
				  </div>
				</div>
			</div>
			</div>

		</div>
	</div>
	<div id="s" class="Services">
		<div class="servtitle">
			<h1>
				SERVICES
			</h1>
			<p>
				Explore our online service
			</p>
		</div>
		<div class="servicescontent hidden">
			<div class="servicesBox 1">
				<div class="boxtitle">
					<h2>
						Certificate of Residency
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for the Certificate of Residency and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="cor" value="Certificate of Residency" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit">Request</button>
									<a href="#" style="font-size:32px;margin-left:10px" title="Print"><i class="bx bxs-printer serviceprint"></i></a>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to request this document</p>';
							}
						?>
					</section>

				</form>
			</div>
			<div class="servicesBox 2">
				<div class="boxtitle">
					<h2>
						Certificate of Indigency
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for the Certificate of Indigency and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="bc" value="Certificate of Indigency" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit2">Request</button>
									<a href="#" style="font-size:32px;margin-left:10px" title="Print"><i class="bx bxs-printer serviceprint"></i></a>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>
				</form>
			</div>
			<div class="servicesBox 4">
				<div class="boxtitle">
					<h2>
						Barangay Clearance
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for the Barangay Clearance and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="brgyC" value="Barangay Clearance" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit4">Request</button>
									<a href="#" style="font-size:32px;margin-left:10px" title="Print"><i class="bx bxs-printer serviceprint"></i></a>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>
				</form>
			</div>
			<div class="servicesBox 5">
				<div class="boxtitle">
					<h2>
						Kasunduan
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for the Kasunduan document and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="kd" value="Kasunduan" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit5">Request</button>
									<a href="#" style="font-size:32px;margin-left:10px" title="Print"><i class="bx bxs-printer serviceprint"></i></a>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>
				</form>
			</div>
			<div class="servicesBox 6">
				<div class="boxtitle">
					<h2>
						BARC Certification
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for the BARC certification and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="barc" value="BARC" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit6">Request</button>
									<a href="#" style="font-size:32px;margin-left:10px" title="Print"><i class="bx bxs-printer serviceprint"></i></a>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>
				</form>
			</div>
			 <!--
			<div class="servicesBox 3">
				<div class=boxtitle>
					<h2>
						Kasunduan
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						View the requirements needed for Barangay Kasunduan and request one now.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="bp" value="Kasunduan" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit3">PROCEED</button>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to access this service.</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account to access this service.</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>
				</form>
			</div>
				-->
				<div class="servicesBox 3">
				<div class="boxtitle">
					<h2>
						File Blotter
					</h2>
				</div>
				<div class="boxdesc">
					<p>
						File a blotter report.
					</p>
				</div>
				<form action="DocumentRequest" method="post">
					<section class="boxbut">
						<input type="text" name="blotter" value="Blotter" hidden></input>
						<?php
							if (isset($_SESSION['ID'])) {
								if ($status == "Approved") {
									echo '<button class="btnservice" type="submit" name="submit3">PROCEED</button>';
								} elseif ($status == "Denied") {
									echo '<p class="boxreq">Sorry but your account have been denied to continue</p>';
								} elseif ($status == "Processing") {
									echo '<p class="boxreq">Please wait for admin to approve your account</p>';
								}
							}
							else {
								echo '<p class="boxreq">Please <a href="login">LOGIN</a> to use this service</p>';
							}
						?>
					</section>

				</form>
			</div>
		</div>
	</div>
</div>
<?php
include '../include/footer.php';
?>