<?php
include 'headAdmin.php';
include 'topbarAdmin.php';

unset($_SESSION['iiii']);
unset($_SESSION['iiiia']);
unset($_SESSION['iii']);
unset($_SESSION['iiiias']);

    if (isset($_SESSION['iss'])) {
    $idd = $_SESSION['iss'];
    }
    elseif (!isset($_POST['submit'])) {
        header('location: Household');   
        exit();
    }
    elseif (isset($_POST['id'])) {
    $idd = $_POST['id'];
    if (!isset($_SESSION['iss'])) {
    $_SESSION['iss'] = $_POST['id'];
    }
    } 
    else {
    header('location: Household');
    exit();
    }
    include 'sidebar.php';
    include 'db_conn.php';
                   ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">

<div class="home-section">
	
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
        elseif (isset($_SESSION['sta'])) {
                echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
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
    <h2>Household Record Information</h2>
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
                <input id="12" class="inpu" type="date" name="datereg" value="<?= $Datereg ?>" onkeyup="saveValue(this);" disabled><br>
                
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
<?php



                $sql= "SELECT * FROM household2 WHERE houseID =". $Houseno;
                $result = mysqli_query($connn, $sql);

                $num_rows = mysqli_num_rows($result);

                
           
?>
<div style="margin-top:30px;padding: px;overflow-x: auto;">
      <h2 style="padding: 10px;">Residents Record (<?php echo $num_rows; ?>)</h2>
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
                    $sql3 = mysqli_query($connn, "SELECT * FROM resident"); // SQL with parameters
                    while ($result3 = mysqli_fetch_array($sql3)) {
                       ?>
                       <?php if (str_contains($inhabitss, $result3['firstname']) && str_contains($inhabitss, $result3['lastname']) && str_contains($inhabitss, $result3['middlename']) && str_contains($inhabitss, $result3['extensionname'])) {

                            if ($result3["middlename"] != "") {
                                echo "<tr><td>". $result3["firstname"] ." ". $result3["middlename"] ." ". $result3["lastname"] ." ". $result3["extensionname"] ."</td>";
                            }   
                            else {
                                 echo "<tr><td>". $result3["firstname"] ." ". $result3["lastname"] ." ". $result3["extensionname"] ."</td>";
                            }
                            echo "<td>". $result3["sex"] ."</td><td>". $result3["birthdate"] ."</td><td>". $result3["street"] .", ". $result3["purok"] .", ". $result3["city"] .", ". $result3["province"] ."</td><td>". $result3["datereg"] ."</td>
                                    <td>
                                             <form action='ResidentHousehold' method='POST'>
                                            <input name='ii' value='". $result3['id'] ."' hidden>
                                            <button class='editt' name='more' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }
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
  
  <br><br>
  <hr>
  
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
