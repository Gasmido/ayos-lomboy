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
    <button class="addd" onclick="document.location='BlotterAdd.php'">ADD BLOTTER</button> 
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
         
          <div class="admin-home-box c">
            <a href="blotterRequest.php">
        <h2>
            Blotter Filing Requests
        </h2>
        <p style="height:120px;">
            <?php
                $sql= "SELECT Status FROM blotter WHERE Status ='Processing'";
                $result = mysqli_query($connn, $sql);

                $num_rows = mysqli_num_rows($result);

                echo $num_rows;
            ?>
        </p>
        </a>
    </div>
     
    <div class="admin-home-box a">
        <h2>
            Active Cases
        </h2>
        <p style="height:120px;">
            <?php
                $sql= "SELECT Status FROM blotter WHERE Status='Active'";
                $result = mysqli_query($connn, $sql);

                $num_rows = mysqli_num_rows($result);

                echo $num_rows;


            ?>
        </p>
    </div>
    <div class="admin-home-box b">
        <h2>
            Settled Cases
        </h2>
        <p style="height:120px;">
            <?php
                $sql2= "SELECT Status FROM blotter WHERE Status='Settled'";
                $result2 = mysqli_query($connn, $sql2);

                $num_rows2 = mysqli_num_rows($result2);

                echo $num_rows2;
            ?>
        </p>
    </div>
</div>       
<h1 style="padding-left: 30px;padding-bottom: 20px;">Blotter Records</h1>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Blotter No.</th>
                    <th>Complainant</th>
                    <th>Complained</th>
                    <th>Date of Filing</th>
                    <th>Person in Charge</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                    $sql = "SELECT id, blotter_no, complainant, complained, dateOfFiling, Status, personInCharge from blotter where Status = 'Active' OR Status = 'Settled' ";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["blotter_no"] ."</td><td>". $row["complainant"] ."</td><td>". $row["complained"] ."</td><td>". $row["dateOfFiling"] ."</td><td>". $row["personInCharge"] ."</td><td>". $row["Status"] ."</td>
                                    <td>
                                        <a href='Blottermore.php?row_id=".$row['id']. " '>
                                            <button class='editt'>MORE</button>
                                        </a>
                                         
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                    $connn-> close();
                   ?>

              
        </tbody>
        </table>
                </div>
            </div>
        </div>
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