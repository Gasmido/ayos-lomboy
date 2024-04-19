<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';


?>
<script type="text/javascript">
        localStorage.removeItem("bn")
        localStorage.removeItem("bt")
        localStorage.removeItem("cm")
        localStorage.removeItem("cmd")
        localStorage.removeItem("lois")
        localStorage.removeItem("blotterin")
    </script>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            BLOTTER RECORDS PAGE
        </h1>
    </div>		
<div class="admin-home"> 
 <div class="adddel">
    <?php
        if (isset($_SESSION['statu'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['statu']; echo "</p>";
                        unset($_SESSION['statu']);
        }
        elseif (isset($_SESSION['statuss'])) {
                echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:green;' id='ha'>";
                echo $_SESSION['statuss']; echo "</p>";
                unset($_SESSION['statuss']);
        }
    ?>
    <button class="addd" onclick="document.location='Blotter'">BACK</button> 

      </div> 

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-contentb">
    <span class="closer">&times;</span>
    <h2>Add New Blotter</h2>
    <form method="post" action="BlotterAdd2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Blotter No.:</label><br>
                <input class="inpu" type="number" name="blotterno" placeholder="Enter Blotter Number" required><br>
                 <label>Blotter Type: (WHAT)</label><br>
                <input class="inpu" type="text" name="name" placeholder="Enter Blotter Type" required><br>
                <label>Complainant: (NAGREKLAMO)</label><br>
                <input class="inpu" type="text" name="complainant" placeholder="Enter Complainant" required><br>
                <label>Complained: (WHO)</label><br>
                <input class="inpu" type="text" name="complained" placeholder="Enter Complained" required><br>
                <label>Location of Incident: (WHERE)</label><br>
                <input class="inpu" type="text" name="Location" placeholder="Enter Location" required><br>
                <label>Date of Filing: (WHEN)</label><br>
                <input class="inpu" type="date" name="DoF" placeholder="Enter Date" required><br>
                <label>Status:</label>
                <label for="stat"></label>
                <select id="stat" name="status"  class="inpu" disabled>
                  <option value="Active">Active</option>
                  <option value="Settled">Settled</option>
                </select>
                <br />
                <input type="hidden" name="status" value="Active"/>
                <label for="blotterin">Blotter Information: (WHY)</label><br>
                <textarea class="inpuer" id="blotterin" name="BI" rows="35" cols="5" required></textarea>
                <br> 
                 <button type="submit" name="submit" class="btndocu wer">ADD</button>
            </div>

               
        </div>  

            
    </div>
    </form>
  </div>
</div>

      <div class="admin-blotter">
         
</div>       
<h1 style="padding-left: 30px;padding-bottom: 20px;">Blotter Request</h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Complainant</th>
                    <th>Complained</th>
                    <th>Incident Type</th>
                    <th>Date of Filing</th>
                    <th>Report Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                    $sql = "SELECT id, blotter_type, complainant, complained, dateOfFiling, Status from blotter where Status = 'Processing' ";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["complainant"] ."</td><td>". $row["complained"] ."</td><td>". $row["blotter_type"] ."</td><td>". $row["dateOfFiling"] ."</td><td>". $row["Status"] ."</td>
                                    <td>
                                        <a href='Blotterrequestmore.php?row_id=".$row['id']. " '>
                                            <button class='editt'>MORE</button>
                                        </a>
                                         
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter filing records at the moment</p>";
                    }
                   
                   ?>

              
        </tbody>
        </table>
                </div>
            </div>
        </div>
<!--
<h1 style="padding-left: 30px;padding-bottom: 20px; padding-top: 30px;">Cancelled/Denied Blotter Request</h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Complainant</th>
                    <th>Complained</th>
                    <th>Incident Type</th>
                    <th>Date of Filing</th>
                    <th>Report Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                    $sql = "SELECT id, blotter_type, complainant, complained, dateOfFiling, blotter_status from blotter where blotter_status = 'Denied' OR blotter_status = 'Cancelled' ";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["complainant"] ."</td><td>". $row["blotter_type"] ."</td><td>". $row["complained"] ."</td><td>". $row["dateOfFiling"] ."</td><td>". $row["blotter_status"] ."</td>
                                    <td>
                                        <a href='Blotterrequestmore.php?row_id=".$row['id']. " '>
                                            <button class='editt'>MORE</button>
                                        </a>
                                         
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no cancelled/denied blotter reports at the moment</p>";
                    }
                   
                   ?>

              
        </tbody>
        </table>
                </div>
            </div>
        </div>
      
-->
      
    </div>
</div>
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
<script type="text/javascript">// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closer")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="../DataTables/js/jquery.js"></script>
<script src="../DataTables/js/jquery.dataTables.js"></script>
<script src="../DataTables/js/bootstrap.js"></script>
<script src="../DataTables/js/dataTables.bootstrap.js"></script>
<script src="../DataTables/js/script.js"></script>