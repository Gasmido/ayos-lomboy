<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

if (isset($_SESSION['iss'])) {
$idd = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: Blotter');            
}
elseif (isset($_POST['id'])) {
    
    $idd = $_POST['id'];
} 
else {
header('location: Blotter');
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
    ?>
    <button id="edi" class="edd" onclick="Edit()">EDIT BLOTTER</button> 

    <button id="edi2" class="edd2" onclick="cancel()">CANCEL</button> 
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM blotter WHERE id=". $idd;
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

                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                $connn-> close();
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="blotterSettled">
        <span class="closer">&times;</span>
    </a>
    <h2>Blotter Record Information</h2>
    <form method="post" action="Blottermore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Blotter No.:</label><br>
                <input id="bno" class="inpu" type="number" name="blotterno" value="<?= $blotterno ?>" readonly placeholder="Enter Blotter Number" required><br>
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
                
               
                <br />
               <input type="hidden" name="id" value="<?= $id ?>"/>
            </div>
            <div class="inputpop3">
                <label>Person-in-Charge:</label><br>
                <input id="pin" onkeyup="saveValue(this);" class="inpu" type="text" name="pin" placeholder="Enter Name" value="<?= $pin ?>" readonly required></input><br>
                <label>Status:</label>
                <label for="stat"></label>
                <select id="stat" name="status" value="Settled" class="inpu" disabled>
                  <option <?php if ($Status=="Active") echo 'selected="selected"';?> >Active</option>
                  <option <?php if ($Status=="Settled") echo 'selected="selected"';?> >Settled</option>
                </select>
                <br> 
                   <button id="editsub" class="btndocu wer" name="submitis" type="submit" hidden>Update</button> 

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
      let stat = document.getElementById("stat");
      let blotterin = document.getElementById("blotterin");
      let editsub = document.getElementById("editsub");
     
            bno.removeAttribute("readonly");
            pin.removeAttribute("readonly");
            bt.removeAttribute("readonly");
            cp.removeAttribute("readonly");
            cpd.removeAttribute("readonly");
            loi.removeAttribute("readonly");
            dof.removeAttribute("readonly");
            stat.removeAttribute("disabled");
            blotterin.removeAttribute("readonly");
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
