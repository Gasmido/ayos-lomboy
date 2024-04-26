<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

                   ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
<div class="home-section">

	<div class="admin-home"> 
        
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="Household">
        <span class="closer">&times;</span>
    </a>
    <h2>Add New Household 
       

    </h2>

    <form method="post" action="HouseholdAdd2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">  

                <label>Household No.:</label><br>
                <input id="9" class="inpu" type="text" name="houseno" placeholder="Household no." onkeyup="saveValue(this);" required><br>
                <label>Street:</label><br>
                <input id="10" class="inpu" type="text" name="st" placeholder="Street" onkeyup="saveValue(this);" required><br>
                <label>Purok:</label><br>
                <select id="11" class="inpu" name="prk" placeholder="Purok" required><br>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                <label>Date Registered:</label><br>
                <input id="12" class="inpu" type="date" name="datereg" onkeyup="saveValue(this);" required><br>
                
            </div>
            <div class="inputpop2">
               
              <label for="">Inhabitants:</label>
                 <select name="inhabitant[]" id="input" class="form-control" required="required" multiple required>
                <?php
                    include_once "../include/db_conn.php";
                    $space = " ";
                    $sql = mysqli_query($connn, "SELECT firstname, middlename, lastname, extensionname FROM resident"); // SQL with parameters
                    while ($result2 = mysqli_fetch_array($sql)) {
                       ?>
                       <option value="<?php echo $result2['firstname'],$space, $result2['middlename'],$space,$result2['lastname'],$space,$result2['extensionname'];  ?>"><?php echo $result2['firstname'],$space, $result2['middlename'],$space,$result2['lastname'],$space,$result2['extensionname']; ?></option>
                       
                       <?php
                    }
                   
                
                ?>
                </select>
                     <button class="btndocu wer" name="submit" type="submit">Submit</button>  
              
            
        </div>  

      
    </div>
</form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('input')  // id
</script>
<script type="text/javascript">        
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

