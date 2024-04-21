<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

                   ?>


<div class="home-section">

	<div class="admin-home"> 
        
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="ResidentRecord">
        <span class="closer">&times;</span>
    </a>
    <h2>Add New Resident 
       

    </h2>

    <form method="post" action="ResidentAdd2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">  

                <label>First Name:</label><br>
                <input id="9" class="inpu" type="text" name="fname" placeholder="First Name" onkeyup="saveValue(this);" required><br>
                <label>Middle Name:</label><br>
                <input id="10" class="inpu" type="text" name="mname" placeholder="Middle Name/Initial" onkeyup="saveValue(this);"><br>
                <label>Last Name:</label><br>
                <input id="11" class="inpu" type="text" name="lname" placeholder="Last Name" onkeyup="saveValue(this);" required><br>
                <label>Extension Name:</label><br>
                <input id="12" class="inpu" type="text" name="ename" placeholder="Extension Name" onkeyup="saveValue(this);"><br>
                 <label>Birthdate:</label><br>
                <input id="2" class="inpu" type="date" name="birth" max="<?php echo date("Y-m-d"); ?>" min="1930-12-31" step="1" onkeyup="saveValue(this);" required><br>
                
                
            </div>
            <div class="inputpop2">
               
                <label>Date Registered:</label><br>
                <input id="1" class="inpu" type="date" name="datereg" max="<?php echo date("Y-m-d"); ?>" min="1934-12-31" step="1" onkeyup="saveValue(this);" required><br>
                 <label>Sex:</label><br>
                <select class="inpu" name="sex" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <label>Citezenship:</label><br>
                <select class="inpu" name="citizenship" required>
                  <option value="Natural-Born-Citizen">Natural-Born-Citizen</option>
                  <option value="Naturalized-Citizen">Naturalized-Citizen</option>
                </select>
                <label>Civil Status:</label><br>
                <select class="inpu" name="civil" required>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Widowed</option>
                  <option>Divorced</option>
                </select>
                <?php
            if (isset($_SESSION['sta'])) {
                echo "<p id='ha' style='color:red;'>Resident Name "; echo $_SESSION['sta']; echo "</p>";
                unset($_SESSION['sta']);
            }
        ?>    
            </div>
            <div class="inputpop3">
                <label>Street:</label><br>
                <input class="inpu" type="text" name="brgy" placeholder="Street" onkeyup="saveValue(this);" required><br>
                <label>Purok:</label><br>
                <select class="inpu" name="purok" required>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
                <label>City:</label><br>
                <input class="inpu" type="text" name="city" placeholder="City" value="Guimba" onkeyup="saveValue(this);" required><br>
                <label>Province:</label><br>
                <input  class="inpu" type="text" name="province" placeholder="Province" value="Nueva Ecija" onkeyup="saveValue(this);" required><br>
                  <button class="btndocu wer" name="submit" type="submit">Submit</button>    
            </div>
        </div>  

      
    </div>
</form>
  </div>
</div>
<script type="text/javascript">
            document.getElementById("1").value = getSavedValue("1");  
            document.getElementById("2").value = getSavedValue("2");     
          
        
            document.getElementById("9").value = getSavedValue("9");
            document.getElementById("10").value = getSavedValue("10"); 
            document.getElementById("11").value = getSavedValue("11"); 
            document.getElementById("12").value = getSavedValue("12"); 

        function saveValue(e){
            var id = e.id;  
            var val = e.value; 
            localStorage.setItem(id, val); 
        }

 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
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
	</div>
</div>

