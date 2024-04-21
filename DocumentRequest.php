<?php
include '../include/head.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings");
	exit();
}
}
if (isset($_POST["submit"])) {
	$docutype = $_POST["cor"];
} elseif (isset($_POST["submit2"])) {
	$docutype = $_POST["bc"];
} elseif (isset($_POST["submit3"])) {	
	$docutype = $_POST["blotter"];
}elseif (isset($_POST["submit4"])) {
	$docutype = $_POST["brgyC"];
}elseif (isset($_POST["submit5"])) {
	$docutype = $_POST["kd"];
}elseif (isset($_POST["submit6"])) {
	$docutype = $_POST["barc"];
}
if (isset($_SESSION['ID']) && $docutype != ""){

?>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage docud">
	<div class="docu-home">
		<div class="docu-form">
			
				
				
				<?php
				if (isset($_SESSION['statusss'])) {
						echo "<p style='text-align:center;font-size:20px;padding-bottom:20px;color:green;'>";
            echo $_SESSION['statusss']; echo "</p>";
            unset($_SESSION['statusss']);
				}

				if ($docutype == "Certificate of Residency") {
					$_SESSION['type'] = $docutype;
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input id="q1" type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Purok:</label>
				<label for="item"></label>
	    		<select id="item" name="purok" class="hehe" class="inputt" required>
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			    </select>
    		<br />
    		<label>Date of Residence:</label>
				<input type="date" name="dateofres" class="inputt" max="'; echo date("Y-m-d"); echo '" min="1934-12-31" step="1" required></input>
				<label>Purpose:</label><br />		
				<label for="items"></label>
			    <select id="items" name="purpose" class="hehe" class="inputt" required>
			      <option>For Work</option>
			      <option>For School</option>
			    </select>
   			 <br />
        <input id="boxc" type="checkbox" class="check" name="otherrs"></input>
    <label>Other:</label> <br>

    <input id="otex" type="text" class="ohter" name="oth" maxlength="150" pattern="[A-Za-z ]{1,150}" title="Only letters and spaces. Maximum of 150" placeholder="max. of 150 letters only" required disabled></input>
    <section>
				<button type="submit" name="submit" class="docusub">Submit</button>
			</section>
			</form>

			<script type="text/javascript">
				const input = document.getElementById("q1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("otex");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

			</script>
				';
		}
		elseif ($docutype == "Certificate of Indigency") {
			$_SESSION['type'] = $docutype;
			echo '
			<h1>DOCUMENT REQUEST</h1>
			<form action="docreqadd" method="post" id="halo">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input id="w1" type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Reason for Indigency Request:</label>
				<label for="item2"></label>
	    		<select id="item2" name="reason" class="hehe" class="inputt" required>
			      <option>Presently confine at the hospital</option>
			      <option>Need burial assistance</option>
			    </select>
    		<br />
        <input id="boxc2" type="checkbox" class="check" name="otherrs2"></input>
    <label>Other:</label> <br>

    <input id="otex2" type="text" class="ohter" name="oth2" maxlength="150" pattern="[A-Za-z ]{1,150}" title="Only letters and spaces. Maximum of 150" placeholder="max. of 150 letters only" required disabled></input>
    <section>
				<button type="submit" name="submit1" class="docusub">Submit</button>
			</section>
			</form>
			<script type="text/javascript">
				const input = document.getElementById("w1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("otex2");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

			</script>
				';
				
		}
		elseif ($docutype == "Barangay Clearance") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input id="e1" type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Purok:</label>
				<label for="item"></label>
	    		<select id="item" name="purok" class="hehe" class="inputt" required>
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			    </select>
    		<br />
    		<label>Date of Birth:</label>
				<input type="date" name="dateofbirth" class="inputt" max="'; echo date("Y-m-d"); echo '" min="1934-12-31" step="1" required></input>
				<label>Place of Birth:</label>
				<input id="e2" type="text" name="placeofbirth" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="Address" required></input>
				<label>Height: (cm)</label>
				<input id="e3" type="text" name="height" class="inputt" minlength="1" maxlength="3" pattern="[0-9 ]{1,3}" placeholder="Please use the Centimeters" step="0.01" title="Numbers only" required></input>
				<label>Weight: (Kg)</label>
				<input id="e4" type="text" name="weight" class="inputt" minlength="1" maxlength="3" pattern="[0-9 ]{1,3}" placeholder="Please use the Kilograms" title="Numbers only"  step="0.01" required></input>
				<label>Purpose:</label><br />		
				<label for="items"></label>
			    <select id="items" name="purpose" class="hehe" class="inputt" required>
			      <option>Personal/Reference Purposes</option>
			      <option>Other</option>
			    </select>
   			 <br />
    <section>
				<button type="submit" name="submit3" class="docusub">Submit</button>
			</section>
			</form>
			<script type="text/javascript">
				const input = document.getElementById("e1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("e2");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

				const input3 = document.getElementById("e3");
				input3.addEventListener("keyup", () => {
				  input3.value = input3.value.replace(/ +/g, "");
				});

				const input4 = document.getElementById("e4");
				input4.addEventListener("keyup", () => {
				  input4.value = input4.value.replace(/ +/g, "");
				});

			</script>
				';
		}
		elseif ($docutype == "Kasunduan") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Borrower:</label>
				<input id="r1" type="text" name="BName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Lender:</label>
				<input id="r2" type="text" name="LName" class="inputt" minlength="4" maxlength="50"  pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Full Address:</label>
				<input id="r3" type="text" name="address" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="Address" required></input>
				<label>Money Borrowed:</label>
				<input id="r4" type="text" name="Money" class="inputt" minlength="1" maxlength="9" pattern="[0-9 ]{1,9}" placeholder="Php" title="Numbers only" required></input>
				<label>Borrower'; echo"'"; echo 's Agricultural Land Size: (Hectares)</label>
				<input id="r5" type="text" name="BAL" class="inputt" minlength="4" maxlength="50" pattern="[0-9. ]{4,50}" placeholder="Land you will lent to the Lender" step="0.001" required></input>
				<label>Borrower'; echo"'"; echo 's Agricultural Land Location:</label>
				<input id="r6" type="text" name="BALL" class="inputt" minlength="4" maxlength="50" placeholder="Address" required></input>    		
    <section>
				<button type="submit" name="submit4" class="docusub">Submit</button>
			</section>
			</form>
			<script type="text/javascript">
				const input = document.getElementById("r1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("r2");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

				const input3 = document.getElementById("r3");
				input3.addEventListener("keyup", () => {
				  input3.value = input3.value.replace(/  +/g, " ");
				});

				const input4 = document.getElementById("r4");
				input4.addEventListener("keyup", () => {
				  input4.value = input4.value.replace(/ +/g, "");
				});

				const input5 = document.getElementById("r5");
				input5.addEventListener("keyup", () => {
				  input5.value = input5.value.replace(/ +/g, "");
				});

				const input6 = document.getElementById("r6");
				input6.addEventListener("keyup", () => {
				  input6.value = input6.value.replace(/  +/g, " ");
				});

			</script>
				';
		}
		elseif ($docutype == "BARC") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .' Certification	" required readonly></input>
				<label>Full Name:</label>
				<input id="t1" type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Residing Barangay:</label>
				<input id="t2" type="text" name="rbrgy" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="e.g. Cavite" required></input>
				<label>Agricultural Land area: (sq.m. & hectares)</label><br>
				<input id="t3" type="text" name="sqm" class="inputt" minlength="1" maxlength="10" pattern="[0-9 ]{1,10}" placeholder="sq. m." step="0.01" title="Numbers only" style="width:49%;" required></input>
				<input id="t4" type="text" name="hectare" class="inputt" minlength="1" maxlength="10" pattern="[0-9 ]{1,10}" placeholder="Hectares" step="0.01" title="Numbers only" style="width:49%;" required></input><br>
				<label>Registered Owner of Agricultural Land:</label>
				<input id="t5" type="text" name="owner" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full Name" required></input>
   			 <br />
    <section>
				<button type="submit" name="submit5" class="docusub">Submit</button>
			</section>
			</form>
			<script type="text/javascript">
				const input = document.getElementById("t1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("t2");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

				const input4 = document.getElementById("t3");
				input4.addEventListener("keyup", () => {
				  input4.value = input4.value.replace(/ +/g, "");
				});

				const input5 = document.getElementById("t4");
				input5.addEventListener("keyup", () => {
				  input5.value = input5.value.replace(/ +/g, "");
				});

				const input6 = document.getElementById("t5");
				input6.addEventListener("keyup", () => {
				  input6.value = input6.value.replace(/  +/g, " ");
				});

			</script>
				';
		}
		elseif ($docutype == "Blotter") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>BLOTTER REQUEST</h1>
					<form action="docreqadd" method="post"">
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly hidden></input>
				<label>Nagreklamo:</label>
				<input id="y1" type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z., ]{4,50}" placeholder="Full name" required></input>
				<label>Inerereklamo:</label>
				<input id="y2" type="text" name="complained" class="inputt" pattern="[A-Za-z ]{2,32}" title="Please remove any special characters! max-length(32 letters)" maxlength="100" placeholder="Full name" required></input>
				<label>Location of Incident: (Purok)</label>
				<label for="item"></label>
	    		<select id="item" name="purok" class="hehe" class="inputt" required>
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			    </select>
    		<br />
    		
				
				<label>Phone Number:</label>
				<input id="y3" type="text" minlength="11" name="phonenum" class="inputt" pattern="\d*" title="Please Enter numbers only!" maxlength="11" placeholder="e.g. 09999999999" required></input>
				<label>Incident Type:</label>
				<input id="y4" type="text" name="incidenttype" class="inputt" pattern="[A-Za-z ]{2,64}" title="Please remove any special characters!" maxlength="100" placeholder="e.g. Assault" required></input>
				<label>Incident Details:</label>
				<textarea id="y5" rows="4" cols="50" type="text" name="incidentdetails" class="inputt" pattern="[A-Za-z ]{1,300}" title="Please remove any special characters!" maxlength="300" placeholder="Explain what happened (max. 300 letters)" required></textarea>



				<section>
				<button type="submit" name="submit2" class="docusub">Submit</button>
			</section>
			</form>
			<script type="text/javascript">
				const input = document.getElementById("y1");
				input.addEventListener("keyup", () => {
				  input.value = input.value.replace(/  +/g, " ");
				});

				const input2 = document.getElementById("y2");
				input2.addEventListener("keyup", () => {
				  input2.value = input2.value.replace(/  +/g, " ");
				});

				const input4 = document.getElementById("y3");
				input4.addEventListener("keyup", () => {
				  input4.value = input4.value.replace(/ +/g, "");
				});

				const input5 = document.getElementById("y4");
				input5.addEventListener("keyup", () => {
				  input5.value = input5.value.replace(/  +/g, " ");
				});

				const input6 = document.getElementById("y5");
				input6.addEventListener("keyup", () => {
				  input6.value = input6.value.replace(/  +/g, " ");
				});

			</script>
				';
		}
		else {
			echo '
			<form action="docreqadd" method="post" id="bye">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" required></input>
			
    <section>
				<button type="submit" name="submit2" class="docusub">Submit</button>
			</section>
			</form>
				';
			echo $docutype;
		}
		?>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	  	
document.getElementById("boxc").onchange = function() {
document.getElementById("otex").disabled = !this.checked;
document.getElementById("items").disabled = this.checked; 

};  
</script>
<script type="text/javascript">
	document.getElementById("boxc2").onchange = function() {
    document.getElementById("otex2").disabled = !this.checked;
   document.getElementById("item2").disabled = this.checked; 
}; 
</script>
<script type="text/javascript">
	var el = document.getElementById('hello');
	el.AddEventListener('submit', function() {
		return confirm('Are you sure you want to submit this form?');
	}, false);
</script >
<?php
include '../include/footer.php';
}
else {
	header('location:Homepage');
}
?>