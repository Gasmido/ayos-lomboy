<?php
include 'headAdmin.php';
include 'topbarAdmin.php';

unset($_SESSION['iiii']);
unset($_SESSION['iiiia']);
unset($_SESSION['iii']);
unset($_SESSION['iiiias']);

if (isset($_SESSION['iss'])) {
$idds = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: UserAcc');            
}
elseif (isset($_POST['id'])) {
    
    $idds = $_POST['id'];
    if (!isset($_SESSION['iss'])) {
    $_SESSION['iss'] = $_POST['id'];
    }
} 
else {
header('location: UserAcc');
}
include 'sidebar.php';
include 'db_conn.php';
                   ?>


<div class="home-section">	
    <div class="adddel">
        <?php
        if (isset($_SESSION['statu'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:green;' id='ha'>";
                        echo $_SESSION['statu']; echo "</p>";
                        unset($_SESSION['statu']);
                    }
    ?>
    <button id="edi" class="edd" onclick="Edit()">EDIT</button> 

    <button id="edi2" class="edd2" onclick="cancel()">CANCEL</button> 
      </div>

	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM users WHERE user_id=".$idds;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['user_id'];
                            $lastname = $row['Last_name'];
                            $firstname = $row['First_name'];
                            $middlename = $row['Middle_name'];
                            $extension = $row['Extension_name'];
                            $logdate = $row['logdate'];
                            $logtime = $row['logtime'];
                            $datereg = $row['dateReg'];
                            $Status = $row['Status'];
                            $email = $row['user_email'];
                            $sex = $row['sex'];
                            $purok = $row ['purok'];
                            $birth = $row['birthdate'];
                            $citizenship = $row['citizenship'];
                        }
                    }
                    else {
                        
                    }
                
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="UserAcc">
        <span class="closer">&times;</span>
    </a>
    <h2>User Account Information</h2>
    <form method="post" action="UserAccmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                 <label>Full Name:</label><br>
                <input class="inpu" type="text" name="name" value="<?= $firstname ?> <?= $middlename ?> <?= $lastname ?> <?= $extension ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Registered: (D-M-Y)</label><br>
                <input class="inpu" type="date" name="datereg" value="<?= $datereg ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Birth Date:</label><br>
                <input class="inpu" type="date" name="date" value="<?= $birth ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Address:</label><br>
                <input class="inpu" type="text" name="name" value="Ayos Lomboy, Purok <?= $purok ?>, Guimba, Nueva Ecija" readonly placeholder="Enter Blotter Type" required><br>
               
                 

            </div>
            <div class="inputpop2">
                <label>Last Log-in Date: (D-M-Y)</label><br>
                <input class="inpu" type="date" name="logdate" value="<?= $logdate ?>" readonly placeholder="Enter Complained" required><br>
                <label>Last Log-in Time:</label><br>
                <input  class="inpu" type="time" name="logtime" value="<?= $logtime ?>" readonly placeholder="Enter Complained" required><br>
                <label>Sex:</label><br>
                <input class="inpu" type="text" name="name" value="<?= $sex ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Citizenship:</label><br>
                <input class="inpu" type="text" name="name" value="<?= $citizenship ?>" readonly placeholder="Enter Blotter Type" required><br>
                
            </div>
            <div class="inputpop3">
                
                <label>E-mail:</label><br>
                <input class="inpu" type="text" name="email" value="<?= $email ?>" required readonly><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status"  class="inpu" style="margin-bottom: 20px;" disabled>
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Approved" <?php if ($Status=="Approved") echo 'selected="selected"';?>>Approved</option>
                            </select>
                            <button id="editsub" class="btndocu wer" name="submit" type="submit" hidden>Update</button>
                        
                
                       
                <input type="text" name="id" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>

  </div>
  <?php
      $sql2 = "SELECT * from resident WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' OR middlename LIKE '$middlename' AND lastname LIKE '$lastname' AND extensionname LIKE '$extension' AND firstname LIKE '%$firstname%'";
       $result8 = mysqli_query($connn, $sql2); 
         
                        if ($result8) 
                        { 
                            $res = mysqli_num_rows($result8); 
                            mysqli_free_result($result8); 
                        }  
  ?>
  <br><br>
  <hr>
  <div style="margin-top:30px;padding: px;overflow-x: auto;">
      <h2 style="padding: 10px;">Residents Record (<?= $res ?>)</h2>
       <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:95%;overflow-x: auto;">
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
                 $_SESSION['iss'] = $idds;
                    $sql = "SELECT * from resident WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' OR middlename LIKE '$middlename' AND lastname LIKE '$lastname' AND extensionname LIKE '$extension' AND firstname LIKE '%$firstname%'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                         echo "<p style='text-align:center;font-size:16px;padding-bottom:15px;color:grey'>Residents that has the same name.</p>";
                        while ($row = $result-> fetch_assoc()) {

                            if ($row["middlename"] != "") {
                                echo "<tr><td>". $row["firstname"] ." ". $row["middlename"] ." ". $row["lastname"] ." ". $row["extensionname"] ."</td>";
                            }   
                            else {
                                 echo "<tr><td>". $row["firstname"] ." ". $row["lastname"] ." ". $row["extensionname"] ."</td>";
                            }
                            echo "<td>". $row["sex"] ."</td><td>". $row["birthdate"] ."</td><td>". $row["street"] .", ". $row["purok"] .", ". $row["city"] .", ". $row["province"] ."</td><td>". $row["datereg"] ."</td>
                                    <td>
                                             <form action='Residentuser' method='POST'>
                                            <input name='ii' value='". $row['id'] ."' hidden>
                                            <button class='editt' name='more' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>This user is not found in residents database.</p>";
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

</div>
</div>
<script type="text/javascript">
     function Edit(){
      let bno = document.getElementById("stat");
    //  let bt = document.getElementById("bt");
    //  let cp = document.getElementById("cp");

        bno.removeAttribute("disabled");
    //    bt.removeAttribute("readonly");
    //    cp.removeAttribute("readonly");
        editsub.removeAttribute("hidden");
        document.getElementById("edi").style.display = "none";
        document.getElementById("edi2").style.display = "block";
    }
    function cancel() {
        location.reload();
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
  $("#stat").change(function() {
    $("#dp").prop("disabled", this.value != "Picked-up");
    $("#ap").prop("disabled", this.value != "Picked-up");  
  }).change();
});
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
