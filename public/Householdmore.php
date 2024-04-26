<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

if (isset($_SESSION['iss'])) {
$idd = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: Household');            
}
elseif (isset($_POST['id'])) {
    
    $idd = $_POST['id'];
} 
else {
header('location: Household');
}

                   ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

<div class="home-section">
	
    <div class="adddel">
        <?php
        if (isset($_SESSION['statu'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:green;' id='ha'>";
                        echo $_SESSION['statu']; echo "</p>";
                        unset($_SESSION['statu']);
                    }
                    elseif (isset($_SESSION['sta'])) {
                         echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>Blotter number ";
                        echo $_SESSION['sta']; echo "</p>";
                        unset($_SESSION['sta']);
                    }
    ?>
    <button id="edi" class="edd" onclick="Edit()">EDIT HOUSEHOLD</button> 

    <button id="edi2" class="edd2" onclick="cancel()">CANCEL</button> 
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM household WHERE id=". $idd;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $Houseno = $row['HouseNo'];
                            $Street = $row['Street'];
                            $Purok = $row['Purok'];
                            $Municipality = $row['Municipality'];
                            $Province = $row['Province'];
                            $Barangay = $row['Barangay'];
                            $Datereg = $row['Datereg'];
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="Household">
        <span class="closer">&times;</span>
    </a>
    <h2>Blotter Record Information</h2>
    <form method="post" action="Householdmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Household No.:</label><br>
                <input id="9" class="inpu" type="text" name="houseno" placeholder="Household no." value="<?= $Houseno ?>" onkeyup="saveValue(this);" required readonly> <br>
                <label>Street:</label><br>
                <input id="10" class="inpu" type="text" name="st" placeholder="Street" value="<?= $Street ?>" onkeyup="saveValue(this);" readonly required><br>
                <label>Purok:</label><br>
                <select id="11" class="inpu" name="prk" placeholder="Purok" required disabled><br>
                    <option value="1" <?php if ($Purok=="1") echo 'selected="selected"';?>>1</option>
                    <option value="2" <?php if ($Purok=="2") echo 'selected="selected"';?>>2</option>
                    <option value="3" <?php if ($Purok=="3") echo 'selected="selected"';?>>3</option>
                    <option value="4" <?php if ($Purok=="4") echo 'selected="selected"';?>>4</option>
                </select>
                <label>Date Registered:</label><br>
                <input id="12" class="inpu" type="date" name="datereg" onkeyup="saveValue(this);" disabled><br>
                
            </div>
            <div class="inputpop2">
                 <label for="inhabitant[]">Inhabitants:</label>
                 <select name="inhabitant[]" id="input" class="form-control" required="required" multiple required disabled>
                <?php
                $inhabit = array();
                    $sql2 = mysqli_query($connn, "SELECT Inhabitants FROM household2 WHERE houseID ='". $Houseno ."'"); // SQL with parameters
                    while ($result2 = mysqli_fetch_array($sql2)) {
                       ?>
                     <!--  <option value="<?php //echo $result2['Inhabitants']; ?>" selected="selected"><?php //echo $result2['Inhabitants']; ?></option>

                     -->
                        
                       <?php
                       $inhabit[] = $result2['Inhabitants']; 
                    }

                    $inhabitss = implode(" ", $inhabit);
                    $space = " ";
                    $sql3 = mysqli_query($connn, "SELECT firstname, middlename, lastname, extensionname FROM resident"); // SQL with parameters
                    while ($result3 = mysqli_fetch_array($sql3)) {
                       ?>
                       <option value="<?php echo $result3['firstname'],$space, $result3['middlename'],$space,$result3['lastname'],$space,$result3['extensionname']; ?>" <?php if (str_contains($inhabitss, $result3['firstname']) && str_contains($inhabitss, $result3['lastname']) && str_contains($inhabitss, $result3['middlename']) && str_contains($inhabitss, $result3['extensionname'])) {
                            echo(" selected='selected'");
                        } ?>><?php echo $result3['firstname'],$space, $result3['middlename'],$space,$result3['lastname'],$space,$result3['extensionname']; ?></option>
                       
                       <?php
                    
                }
                
                   
                
                ?>
                </select>
               <textarea><?php echo $inhabitss; ?></textarea>
                <br>
               <input type="hidden" name="id" value="<?= $id ?>"/>
            </div>
            <div class="inputpop3">
               
                <br> 
                   <button id="editsub" class="btndocu wer" name="submit" type="submit" hidden>Update</button> 

            </div>
        </div>  
       
      </div>
    </div>
</form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('input')  // id
</script>
</div>
</div>

<script type="text/javascript">
    function Edit(){
      let bno = document.getElementById("9");
      let pin = document.getElementById("10");
      let bt = document.getElementById("11");
      let cp = document.getElementById("12");
      let cps = document.getElementById("input");
      
      let editsub = document.getElementById("editsub");
     
            bno.removeAttribute("readonly");
            pin.removeAttribute("readonly");
            bt.removeAttribute("disabled");
            cp.removeAttribute("disabled");
            cps.removeAttribute("disabled");
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
