<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';






//NOT USED LOL
                   ?>


<div class="home-section">	
    <div class="adddel">
    <button class="addd" onclick="document.location='Blottermore.php'">Back</button> 
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT blotter_no, blotter_type, complainant, complained, locationOfIncident, dateOfFiling, Status, blotter_info FROM blotter WHERE id=".$_GET['row_id'];
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $blotterno = $row['blotter_no'];
                            $blotter_type = $row['blotter_type'];
                            $complainant = $row['complainant'];
                            $complained = $row['complained'];
                            $locationOfIncident = $row['locationOfIncident'];
                            $dateOfFiling = $row['dateOfFiling'];
                            $Status = $row['Status'];
                            $blotter_info = $row['blotter_info'];

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
    <a href="Blotter.php">
        <span class="closer">&times;</span>
    </a>
    <h2>Edit Blotter Record</h2>
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Blotter No.:</label><br>
                <input class="inpu" type="number" name="blotterno" value="<?= $blotterno ?>" placeholder="Enter Blotter Number" required><br>
                 <label>Blotter Type: (WHAT)</label><br>
                <input class="inpu" type="text" name="name" value="<?= $blotter_type ?>" placeholder="Enter Blotter Type" required><br>
                <label>Complainant: (NAGREKLAMO)</label><br>
                <input class="inpu" type="text" name="complainant" value="<?= $complainant ?>" placeholder="Enter Complainant" required><br>
                <label>Complained: (WHO)</label><br>
                <input class="inpu" type="text" name="complained" value="<?= $complained ?>" placeholder="Enter Complained" required><br>
               
            </div>
            <div class="inputpop2">
                <label>Location of Incident: (WHERE)</label><br>
                <input class="inpu" type="text" name="Location" value="<?= $locationOfIncident ?>" placeholder="Enter Location" required><br>
                <label>Date of Filing: (WHEN)</label><br>
                <input class="inpu" type="date" name="DoF" value="<?= $dateOfFiling ?>" placeholder="Enter Date" required><br>
                <label>Status:</label>
                <label for="stat"></label>
                <select id="stat" name="status" value="Settled" class="inpu">
                  <option <?php if ($Status=="Active") echo 'selected="selected"';?> >Active</option>
                  <option <?php if ($Status=="Settled") echo 'selected="selected"';?> >Settled</option>
                </select>
                <br />
               
            </div>
            <div class="inputpop3">
               <label for="blotterin">Blotter Information: (WHY)</label><br>
                <textarea class="inpuer" id="blotterin" name="BI" rows="35" cols="5" required><?php echo $blotter_info; ?></textarea>
                <br> 
                   <button class="btndocu wer">Submit</button>    
            </div>
        </div>  

      
    </div>
  </div>
</div>

	</div>
</div>

