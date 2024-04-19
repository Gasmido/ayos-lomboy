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
    <a href="Blotter">
        <span class="closer">&times;</span>
    </a>
    <h2>Add Blotter Record</h2>
    <form method="post" action="BlotterAdd2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <?php 
                if (isset($_SESSION['sta'])) {
                        echo "<label>Blotter No.: <label id='ha' style='color:red;font-size:16px;height:12px;'>"; echo $_SESSION['sta']; echo "</label></label>";
                        unset($_SESSION['sta']);
                    }else { 
                        echo "<label>Blotter No.:</label>";
                    }

                     ?>
                    <br>
                <input id="bn" onkeyup="saveValue(this);" class="inpu" type="number" name="blotterno" placeholder="Enter Blotter Number" required></input><br>
                 <label>Blotter Type: (WHAT)</label><br>
                <input id="bt" onkeyup="saveValue(this);" class="inpu" type="text" name="name" placeholder="Enter Blotter Type" required></input><br>
                <label>Complainant: (NAGREKLAMO)</label><br>
                <input id="cm" onkeyup="saveValue(this);" class="inpu" type="text" name="complainant" placeholder="Enter Complainant" required></input><br>
                
               
            </div>
            <div class="inputpop2">
                <label>Complained: (WHO)</label><br>
                <input id="cmd" onkeyup="saveValue(this);" class="inpu" type="text" name="complained" placeholder="Enter Complained" required></input><br>
                <label>Location of Incident: (WHERE)</label><br>
                <input id="lois" onkeyup="saveValue(this);" class="inpu" type="text" name="Location" placeholder="Enter Location" required></input><br>
                <label>Date of Filing: (WHEN)</label><br>
                <input id="daf" class="inpu" type="date" name="DoF" placeholder="Enter Date" required></input><br>
                
                <br />
                <input type="hidden" name="status" value="Active"/>
               
            </div>
            <div class="inputpop3">
                <label>Person-in-Charge:</label><br>
                <input id="pin" onkeyup="saveValue(this);" class="inpu" type="text" name="pin" placeholder="Enter Name" required></input><br>
                <label>Status:</label>
                <label for="stat"></label>
                <select id="stat" name="status"  class="inpu" disabled>
                  <option value="Active">Active</option>
                  <option value="Settled">Settled</option>
                </select>
                <br>
                   <button class="btndocu wer" name="submit" type="submit">Submit</button>    
            </div>
        </div>  
<label for="blotterin" style="padding-left:20px">Blotter Information: (WHY)</label><br>
                <div style="text-align:center">
                
                <textarea class="inpuer" id="blotterin" onkeyup="saveValue(this);" name="BI" rows="35" cols="5" required></textarea>
      </div>
      
    </div>
</form>
  </div>
</div>
<script type="text/javascript">
            document.getElementById("bn").value = getSavedValue("bn"); 
            document.getElementById("pin").value = getSavedValue("pin");    
            document.getElementById("bt").value = getSavedValue("bt");
            document.getElementById("cm").value = getSavedValue("cm");
            document.getElementById("cmd").value = getSavedValue("cmd");
            document.getElementById("lois").value = getSavedValue("lois");
            document.getElementById("blotterin").value = getSavedValue("blotterin");

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

