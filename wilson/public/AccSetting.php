<?php
include '../include/head.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
    header("Location: GoogleAccSettings.php");
    exit();
}
}
if (isset($_SESSION['ID'])){

?>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red"><img class="logoo3" src="image/logoo.png"><p>Barangay Ayos Lomboy</p></div>
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
	<div class="adddell">
        <?php
        if (isset($_SESSION['statu'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:green;' id='ha'>";
                        echo $_SESSION['statu']; echo "</p>";
                        unset($_SESSION['statu']);
                    }
    ?>

      </div>
	<div class="docu-home">
		<div class="docu-form" style="margin-top:0px;height:860px">
			
				
				
				<?php
				require_once '../include/db_conn.php';
					$sql1 = "SELECT * FROM users WHERE user_id=". $id;
                 	$result1 = $connn-> query($sql1);
                 	if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $f2name = $row['First_name'];
                            $m2name = $row['Middle_name'];
                            $l2name = $row['Last_name'];
                            $e2name = $row['Extension_name'];
                            $bday = $row['birthdate'];
                            $sex = $row['sex'];
                            $citi = $row['citizenship'];
                        }
                    }   
				?>
					<h1>ACCOUNT SETTING</h1>
					<div style="height:50px; text-align:right">
					<button id="edi2" class="edd2" onclick="cancel()">CANCEL</button> 
					<button id="edi" class="edd" onclick="Edit()">EDIT</button> 
					
    			</div>
					<form action="AccSettingedit.php" method="post">
					<label>First Name:</label>
				<input id="1" type="text" minlength="2" maxlength="20" name="fname" class="inputt" value="<?= $firstnames ?>"  pattern="[A-Za-z ]{1,32}" required readonly></input>
				<label>Middle Initial/Name:</label>
				<input id="2" type="text" minlength="1" maxlength="10" name="mname" class="inputt" value="<?= $middlename ?>" pattern="^[a-zA-Z\.]*$" required readonly></input>
				<label>Last Name:</label>
				<input id="4" type="text" minlength="2" maxlength="20" name="lname" class="inputt" value="<?= $lastname ?>" pattern="[A-Za-z ]{1,32}" required readonly></input>
				<label>Extension Name:</label>
				<input id="5" type="text" minlength="1" maxlength="10" name="ename" class="inputt" value="<?= $extensionname ?>" pattern="^[a-zA-Z\.]*$" required readonly></input>
				<label>Birth Date:</label>
				<input id="3" type="date" name="bday" class="inputt" value="<?= $bday ?>" max="<?php echo date("Y-m-d"); ?>" min="1934-12-31" required readonly></input>
				<label>Sex:</label>
				<select id="6" class="inputt" name="sex" required disabled>
                  <option <?php if ($sex=="Male") echo 'selected="selected"';?>>Male</option>
                  <option <?php if ($sex=="Female") echo 'selected="selected"';?>>Female</option>
                </select>
				<label>Citizenship:</label>
				<select id="7" class="inputt" name="citizenship" required disabled>
                  <option <?php if ($citi=="Natural-Born-Citizen") echo 'selected="selected"';?>>Natural-Born-Citizen</option>
                  <option <?php if ($citi=="Naturalized-Citizen") echo 'selected="selected"';?>>Naturalized-Citizen</option>
                </select>
               <input type="text" name="idd" value="<?= $id ?>" hidden></input>
				<section>
					

				<section>
				<button id="editsub" type="submit" name="submits" class="docusub" hidden>Submit</button>
				
			</section>
			</form>
		
	

		</div>

	</div>
</div>
<script type="text/javascript">
    function Edit(){
      let bno = document.getElementById("1");
      let pin = document.getElementById("2");
      let cpa = document.getElementById("5");
      let cp = document.getElementById("4");
       let cpe = document.getElementById("3");
        let cps = document.getElementById("6");
         let cpd = document.getElementById("7");

      
      let editsub = document.getElementById("editsub");

     
            bno.removeAttribute("readonly");
            pin.removeAttribute("readonly");
            cp.removeAttribute("readonly");
           	cpe.removeAttribute("readonly");
           	cps.removeAttribute("disabled");
           	cpd.removeAttribute("disabled");
            cpa.removeAttribute("readonly");
            editsub.removeAttribute("hidden");
               document.getElementById("edi").style.display = "none";
                document.getElementById("edi2").style.display = "block";
    }
    function cancel() {
        location.reload();
    }
</script>
<script type="text/javascript">
    window.onload = function() {
        timedHide(document.getElementById('ha'),3);
    }
    function timedHide(element, seconds) {
        if (element) {
            setTimeout(function() {
                element.style.display = 'none';
            }, seconds*1000);
        }
    }
</script>

<?php
include '../include/footer.php';
}
else {
	header('location:Homepage.php');
}
?>