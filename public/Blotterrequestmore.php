<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

if (isset($_SESSION['iss'])) {
$id = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: BlotterRequest');            
}
elseif (isset($_POST['id'])) {
    
    $id = $_POST['id'];
} 
else {
header('location: blotterRequest');
}
                   ?>


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

                     $sql2 = "SELECT * FROM blotter WHERE id=". $id;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $blotterno = $row['blotter_no'];
                            $blotter_type = $row['blotter_type'];
                            $complainant = $row['complainant'];
                            $complained = $row['complained'];
                            $locationOfIncident = $row['locationOfIncident'];
                            $dateOfFiling = $row['dateOfFiling'];
                            $Status = $row['Status'];
                            $blotter_info = $row['blotter_info'];
                            $pin = $row['personInCharge'];
                            $asdf = "Active";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                $connn-> close();

   
      ?>
       </div>
	<div class="admin-home-blot">

        <?php
           
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="blotterRequest">
        <span class="closer">&times;</span>
    </a>
    <h2>Blotter Report Information</h2>
    
    <form method="post" action="Blotterrequestmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Blotter No.:</label><p pattern="[0-9]" style="display:inline;color: red;font-size: 19px;">*</p><br>
                <input id="bno" class="inpu" type="number" name="blotterno" value="<?= $blotterno ?>" placeholder="Enter Blotter Number" required><br>
                 <label>Blotter Type: (WHAT)</label><br>
                <input id="bt" class="inpu" type="text" name="name" value="<?= $blotter_type ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Complainant: (NAGREKLAMO)</label><br>
                <input id="cp" class="inpu" type="text" name="complainant" value="<?= $complainant ?>" readonly placeholder="Enter Complainant" required><br>
                
               
            </div>
            <div class="inputpop2">
                <label>Complained: (WHO)</label><br>
                <input id="cpd" class="inpu" type="text" name="complained" value="<?= $complained ?>" readonly placeholder="Enter Complained" required><br>
                <label>Location of Incident: (WHERE)</label><br>
                <input id="loi" class="inpu" type="text" name="Location" value="<?= $locationOfIncident ?>" placeholder="Enter Location" readonly required><br>
                <label>Date of Filing: (WHEN)</label><br>
                <input id="dof" class="inpu" type="date" name="DoF" value="<?= $dateOfFiling ?>" readonly placeholder="Enter Date" required><br>
                
               
               <input type="hidden" name="id" value="<?= $id ?>"/>
            </div>
            <div class="inputpop3">
                <?php
                if ($Status == "Processing") {
                    echo '
                    <label>Person-in-Charge:</label><p id="sds" style="display:inline;color: red;font-size: 19px;">*</p><br>
                <input id="pin" onkeyup="saveValue(this);" class="inpu" type="text" name="pin" placeholder="Enter Name" required></input><br>
              ';
                }
                elseif ($Status == "Approved") {
                      echo '
                      <label>Person-in-Charge:</label><p id="sds" style="display: none;color: red;font-size: 19px;">*</p><br>
                <input id="pin" onkeyup="saveValue(this);" class="inpu" type="text" name="pin" placeholder="Enter Name" readonly required></input><br>
              <label>Status:</label>
                <label for="stat"></label>
                <select id="stat" name="status" value="Active" class="inpu" disabled>
                  <option'; echo '>Settled</option>
                  <option selected="selected"'; echo '>Active</option>
                </select>';
                }else { ?>
                  <label>Report Status:</label><br>
                <select class="inpu" name="ss" disabled>
                  <option <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                  <option <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                </select>
                <?php }
               ?>
                <br />
                <br> 
                   <button id="editsub" class="btndocu wer" name="submit" type="submit" hidden>Approve</button> 
                   <?php
                if ($Status == "Processing") {
                    echo '
                    
                     <br> 
                   <button id="sdfd" class="btndocu wer" name="submit" type="submit">Take Action</button>
                    ';
                }
                    ?>

            </div>
        </div>  
 <label for="blotterin" style="padding-left:20px">Blotter Information: (WHY)</label><br>
                <div style="text-align:center">
                
                <textarea class="inpuer" id="blotterin" name="BI" rows="35" cols="5" readonly required><?php echo $blotter_info; ?></textarea>
      </div>
      
    </div>
</form>
  </div>
</div>

</div>
</div>
<script type="text/javascript">
    function Edit(){
      let bno = document.getElementById("bno");
      let pin = document.getElementById("pin");
      let bt = document.getElementById("bt");
      let cp = document.getElementById("cp");
      let cpd = document.getElementById("cpd");
      let loi = document.getElementById("loi");
      let dof = document.getElementById("dof");
      let blotterin = document.getElementById("blotterin");
      let editsub = document.getElementById("editsub");
     
            bno.removeAttribute("readonly");
            pin.removeAttribute("readonly");
            bt.removeAttribute("readonly");
            cp.removeAttribute("readonly");
            cpd.removeAttribute("readonly");
            loi.removeAttribute("readonly");
            dof.removeAttribute("readonly");
            blotterin.removeAttribute("readonly");
            editsub.removeAttribute("hidden");
               document.getElementById("edi").style.display = "none";
                document.getElementById("sdfd").style.display = "none";
                document.getElementById("edi2").style.display = "block";
                 document.getElementById("sd").style.display = "inline-block";
                  document.getElementById("sds").style.display = "inline-block";
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
