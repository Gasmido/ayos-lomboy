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
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
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
				';
		}
		elseif ($docutype == "Certificate of Indigency") {
			echo '
			<h1>DOCUMENT REQUEST</h1>
			<form action="docreqadd" method="post" id="halo">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
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
				';
				
		}
		elseif ($docutype == "Barangay Clearance") {
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="#" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
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
				<input type="text" name="placeofbirth" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="Address" required></input>
				<label>Height: (cm)</label>
				<input type="text" name="height" class="inputt" minlength="1" maxlength="3" pattern="[0-9 ]{1,3}" placeholder="Please use the Centimeters" step="0.01" title="Numbers only" required></input>
				<label>Weight: (Kg)</label>
				<input type="text" name="weight" class="inputt" minlength="1" maxlength="3" pattern="[0-9 ]{1,3}" placeholder="Please use the Kilograms" title="Numbers only"  step="0.01" required></input>
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
				';
		}
		elseif ($docutype == "Kasunduan") {
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Borrower:</label>
				<input type="text" name="BName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
				<label>Lender:</label>
				<input type="text" name="LName" class="inputt" minlength="4" maxlength="50"  pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
				<label>Full Address:</label>
				<input type="text" name="address" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="Address" required></input>
				<label>Money Borrowed:</label>
				<input type="text" name="Money" class="inputt" minlength="1" maxlength="9" pattern="[0-9 ]{1,9}" placeholder="Php" title="Numbers only" required></input>
				<label>Borrower'; echo"'"; echo 's Agricultural Land Size: (Hectares)</label>
				<input type="text" name="BAL" class="inputt" minlength="4" maxlength="50" pattern="[0-9. ]{4,50}" placeholder="Land you will lent to the Lender" step="0.001" required></input>
				<label>Borrower'; echo"'"; echo 's Agricultural Land Location:</label>
				<input type="text" name="BALL" class="inputt" minlength="4" maxlength="50" placeholder="Address" required></input>    		
    <section>
				<button type="submit" name="submit4" class="docusub">Submit</button>
			</section>
			</form>
				';
		}
		elseif ($docutype == "BARC") {
					echo '
					<h1>DOCUMENT REQUEST</h1>
					<form action="docreqadd" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .' Certification	" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
				<label>Residing Barangay:</label>
				<input type="text" name="rbrgy" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z0-9 ]{4,50}" placeholder="e.g. Cavite" required></input>
				<label>Agricultural Land area: (sq.m. & hectares)</label>
				<input type="text" name="sqm" class="inputt" minlength="1" maxlength="10" pattern="[0-9 ]{1,10}" placeholder="sq. m." step="0.01" title="Numbers only" style="width:49%;" required></input>
				<input type="text" name="hectare" class="inputt" minlength="1" maxlength="10" pattern="[0-9 ]{1,10}" placeholder="Hectares" step="0.01" title="Numbers only" style="width:49%;" required></input>
				<label>Registered Owner of Agricultural Land:</label>
				<input type="text" name="owner" class="inputt" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full Name" required></input>
   			 <br />
    <section>
				<button type="submit" name="submit5" class="docusub">Submit</button>
			</section>
			</form>
				';
		}
		elseif ($docutype == "Blotter") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>BLOTTER REQUEST</h1>
					<form action="docreqadd" method="post"">
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly hidden></input>
				<label>Nagreklamo:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" pattern="[A-Za-z ]{4,50}" placeholder="Full name" required></input>
				<label>Inerereklamo:</label>
				<input type="text" name="complained" class="inputt" pattern="[A-Za-z ]{2,32}" title="Please remove any special characters! max-length(32 letters)" maxlength="100" placeholder="Full name" required></input>
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
				<input type="text" minlength="11" name="phonenum" class="inputt" pattern="\d*" title="Please Enter numbers only!" maxlength="11" placeholder="e.g. 09999999999" required></input>
				<label>Incident Type:</label>
				<input type="text" name="incidenttype" class="inputt" pattern="[A-Za-z ]{2,64}" title="Please remove any special characters!" maxlength="100" placeholder="e.g. Assault" required></input>
				<label>Incident Details:</label>
				<textarea rows="4" cols="50" type="text" name="incidentdetails" class="inputt" pattern="[A-Za-z ]{1,300}" title="Please remove any special characters!" maxlength="300" placeholder="Explain what happened (max. 300 letters)" required></textarea>



				<section>
				<button type="submit" name="submit2" class="docusub">Submit</button>
			</section>
			</form>
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