<?php
include '../include/head.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings.php");
	exit();
}
}
if (isset($_POST["submit"])) {
	$docutype = $_POST["cor"];
} elseif (isset($_POST["submit2"])) {
	$docutype = $_POST["bc"];
} elseif (isset($_POST["submit3"])) {
	$docutype = $_POST["blotter"];
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
      <li><a class="ac" href="../public/Homepage.php">Back to Home</a></li>
   
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
					<form action="docreqadd.php" method="post"">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" required></input>
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
			<form action="docreqadd.php" method="post" id="halo">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" required></input>
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
		elseif ($docutype == "Blotter") {
			$_SESSION['type'] = $docutype;
					echo '
					<h1>BLOTTER REQUEST</h1>
					<form action="docreqadd.php" method="post"">
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly hidden></input>
				<label>Nagreklamo:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" minlength="4" maxlength="50" required></input>
				<label>Inerereklamo:</label>
				<input type="text" name="complained" class="inputt" pattern="[A-Za-z ]{2,32}" title="Please remove any special characters! max-length(32 letters)" maxlength="100" placeholder="e.g. Juan D. Cinense" required></input>
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
			<form action="docreqadd.php" method="post" id="bye">
					<label>Document Requesting:</label>
				<input type="text" name="docutype" class="inputt" value="'. $docutype .'" required readonly></input>
				<label>Full Name:</label>
				<input type="text" name="fName" class="inputt" value="'. $firstnames," ", $middlename, " ", $lastname, " ", $extensionname .'" required></input>
			
    <section>
				<button type="submit" name="submit2" class="docusub">Submit</button>
			</section>
			</form>
				';
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
	header('location:Homepage.php');
}
?>