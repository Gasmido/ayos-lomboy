<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';
?>
<script type="text/javascript">
        localStorage.removeItem("1")
        localStorage.removeItem("2")
        localStorage.removeItem("5")
        localStorage.removeItem("6")
        localStorage.removeItem("7")
        localStorage.removeItem("8")
        localStorage.removeItem("9")
        localStorage.removeItem("10")
        localStorage.removeItem("11")
        localStorage.removeItem("12")
    </script>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            RESIDENT RECORDS PAGE
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
    <button onclick="document.location='ResidentAdd.php'" class="addd">ADD NEW RESIDENT</button> 
      </div>    

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-contentRr">
    <span class="closer">&times;</span>
    <h2>Add New Resident</h2>
    <div class="modal-inside">
        <div class="models">
            <div class="img">
                <div class="imgs">
                    <center>img</center>
                </div>
                <div class="choose">
                    <input type="file" name="image"></input>
                </div>
                <br>
                <label>Date Registered:</label>
                <input class="" type="date" name="datee" placeholder="Date"><br>
                <label>Phone Number:</label>
                <input type="text" name="fName" class="inpu" pattern="[09][0-9]{10}" title="ex. 09111111111" placeholder="(e.g. 09123456789)" required></input>
            </div> 
            <div class="inputpop">            
                <label>First Name:</label><br>
                <input class="inpu" type="text" name="name" placeholder="First Name"><br>
                <label>Middle Name:</label><br>
                <input class="inpu" type="text" name="name" placeholder="Middle Name"><br>
                <label>Last Name:</label><br>
                <input class="inpu" type="text" name="name" placeholder="Last Name"><br>
                <label>Extension Name:</label><br>
                <input class="inpu" type="text" name="name" placeholder="Extension Name"><br>
                <label>Civil Status:</label><br>
                <select class="inpu">
                  <option>Single</option>
                  <option>Married</option>
                  <option>Widowed</option>
                  <option>Divorced</option>
                </select>
                <label>Citezenship:</label><br>
                <select class="inpu">
                  <option>Natural-Born Citizen</option>
                  <option>Naturalized-Citizen</option>
                </select>
            </div>
            <div class="inputpop2">
                <label>Sex:</label><br>
                <select class="inpu">
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <label>Religion:</label><br>
                <input class="inpu" type="text" name="chairmansip" placeholder="Religion"><br>
                <label>Birthdate:</label><br>
                <input class="inpu" type="date" name="position" placeholder="Date"><br>
                <label>Birth Place:</label><br>
                <input class="inpu" type="text" name="tstart" placeholder="Birth Place"><br>
                <label>Profession/Occupation:</label><br>
                <input class="inpu" type="text" name="tstart" placeholder="Profession/Occupation"><br>
                
               
            </div>
            <div class="inputpop3">
                <label>Street:</label><br>
                <input class="inpu" type="text" name="chairmansip" placeholder="Street"><br>
                <label>Barangay:</label><br>
                <input class="inpu" type="text" name="position" placeholder="Barangay"><br>
                <label>City:</label><br>
                <input class="inpu" type="text" name="tstart" placeholder="City"><br>
                <label>Province:</label><br>
                <input class="inpu" type="text" name="tend" placeholder="Province"><br>
            </div>
        </div>  

         <button class="btndocu wer">Submit</button>    
    </div>
  </div>
</div>

<div style="height: 20px;width: 100%;"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Birth Date</th>
                    <th>Full Address</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    $sql = "SELECT * from resident";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            if ($row["middlename"] != "") {
                                echo "<tr><td>". $row["firstname"] ." ". $row["middlename"] ." ". $row["lastname"] ." ". $row["extensionname"] ."</td>";
                            }   
                            else {
                                 echo "<tr><td>". $row["firstname"] ." ". $row["lastname"] ." ". $row["extensionname"] ."</td>";
                            }
                            echo "<td>". $row["sex"] ."</td><td>". $row["birthdate"] ."</td><td>". $row["street"] .", ". $row["purok"] .", ". $row["city"] .", ". $row["province"] ."</td><td>". $row["datereg"] ."</td>
                                    <td>
                                        <a href='Residentmore.php?row_id=".$row['id']. " '>
                                            <button class='editt'>MORE</button>
                                        </a>
                                        
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no Residents at the moment</p>";
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

<script type="text/javascript">// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

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