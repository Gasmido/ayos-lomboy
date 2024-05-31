<?php
include 'headAdmin.php';
include 'topbarAdmin.php';

include 'db_conn.php';

if (!isset($_SESSION['iss'])) {
header('location: DocReqmore');
}
if (isset($_POST['more2'])) {
            $idd = $_POST['ii2'];
       if (!isset($_SESSION['iiiias'])) {
                $_SESSION['iiiias'] = $_POST['ii2'];
            }
        }
         elseif (isset($_SESSION['iiiias'])) {
            $idd = $_SESSION['iiiias'];
        }
        else {
            header('location: DocReqmore');
        }

include 'sidebar.php';

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
                         echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>Resident ";
                        echo $_SESSION['sta']; echo "</p>";
                        unset($_SESSION['sta']);
                    }
    ?>
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM resident WHERE id=".$idd;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $fname = $row['firstname'];
                            $mname = $row['middlename'];
                            $lname =$row['lastname'];
                            $ename = $row['extensionname'];
                            $phone =$row['phonenum'];
                            $datereg = $row['datereg'];
                            $birth = $row['birthdate'];
                            $sex = $row['sex'];
                            $citizenship = $row['citizenship'];
                            $civil = $row['civilstatus'];
                            $brgy = $row['street'];
                            $purok =$row['purok'];
                            $city = $row['city'];
                            $province = $row['province'];

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
    <a href="<?php if (isset($_SESSION['COR'])) { echo 'DocReqmoreCOR'; } else { echo 'DocReqmore';}?>">
        <span class="closer">&times;</span>
    </a>
    <h2>Resident Information</h2>
    
    <form method="post" action="Residentmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
               <label>First Name:</label><br>
                <input id="9" class="inpu" type="text" name="fname" value="<?= $fname ?>" pattern="[a-zA-Z-]+" placeholder="First Name" readonly><br>
                <label>Middle Initial/Name:</label><br>
                <input id="10" class="inpu" type="text" name="mname" value="<?= $mname ?>" placeholder="Middle Name" readonly><br>
                <label>Last Name:</label><br>
                <input id="11" class="inpu" type="text" name="lname" value="<?= $lname ?>" placeholder="Last Name" readonly><br>
                <label>Extension Name:</label><br>
                <input id="12" class="inpu" type="text" name="ename" value="<?= $ename ?>" placeholder="Extension Name" readonly><br>
           <!--     <label>Phone Number:</label><br>
                <input id="3" class="inpu" type="number" name="phone" value="<?= $phone ?>" placeholder="Phone Number" readonly><br>
               -->
                <label>Birthdate:</label><br>
                <input id="2" class="inpu" type="date" name="birth" value="<?= $birth ?>" max="<?php echo date("Y-m-d"); ?>" min="1930-12-31" step="1" readonly><br>
            </div>
            <div class="inputpop2">
                
                <label>Date Registered:</label><br>
                <input id="1" class="inpu" type="date" name="datereg" value="<?= $datereg ?>" max="<?php echo date("Y-m-d"); ?>" min="1934-12-31" step="1" readonly><br>
                 <label>Sex:</label><br>
                <select id="4" class="inpu" name="sex" disabled>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <label>Citezenship:</label><br>
                <select id="13" class="inpu" name="citizenship" disabled>
                  <option <?php if ($citizenship=="Natural-Born-Citizen") echo 'selected="selected"';?>>Natural-Born-Citizen</option>
                  <option <?php if ($citizenship=="Naturalized-Citizen") echo 'selected="selected"';?>>Naturalized-Citizen</option>
                </select>
                <label>Civil Status:</label><br>
                <select id="14" class="inpu" name="civil" disabled>
                  <option <?php if ($civil=="Single") echo 'selected="selected"';?>>Single</option>
                  <option <?php if ($civil=="Married") echo 'selected="selected"';?>>Married</option>
                  <option <?php if ($civil=="Widowed") echo 'selected="selected"';?>>Widowed</option>
                  <option <?php if ($civil=="Divorced") echo 'selected="selected"';?>>Divorced</option>
                </select>
               <input type="hidden" name="id" value="<?= $id ?>"/>
            </div>
            <div class="inputpop3">
                <label>Barangay:</label><br>
                <input id="5" class="inpu" type="text" name="brgy" value="<?= $brgy ?>" placeholder="Barangay" readonly><br>
                <label>Purok:</label><br>
                <select id="6" class="inpu" name="purok" required disabled>
                  <option <?php if ($purok=="1") echo 'selected="selected"';?>>1</option>
                  <option <?php if ($purok=="2") echo 'selected="selected"';?>>2</option>
                  <option <?php if ($purok=="3") echo 'selected="selected"';?>>3</option>
                  <option <?php if ($purok=="4") echo 'selected="selected"';?>>4</option>
                </select>
                <label>City:</label><br>
                <input id="7" class="inpu" type="text" name="city" value="<?= $city ?>" placeholder="City" readonly><br>
                <label>Province:</label><br>
                <input id="8" class="inpu" type="text" name="province" value="<?= $province ?>" placeholder="Province" readonly><br>
                  

            </div>
        </div>  

      
    </div>
</form>
  </div>
</div>

</div>
</div>
<script type="text/javascript">
    function Edit(){
      let bno = document.getElementById("1");
      let pin = document.getElementById("2");

      let cp = document.getElementById("4");
      let cpd = document.getElementById("5");
      let loi = document.getElementById("6");
      let dof = document.getElementById("7");
      let stat = document.getElementById("8");
      let blotterin = document.getElementById("9");
      let sd = document.getElementById("10");
      let aa = document.getElementById("11");
      let b = document.getElementById("12");
      let c = document.getElementById("13");
      let d = document.getElementById("14");
      let editsub = document.getElementById("editsub");

     
            bno.removeAttribute("readonly");
            pin.removeAttribute("readonly");
            cp.removeAttribute("disabled");
            c.removeAttribute("disabled");
            d.removeAttribute("disabled");
            cpd.removeAttribute("readonly");
            loi.removeAttribute("disabled");
            dof.removeAttribute("readonly");
            stat.removeAttribute("readonly");
            sd.removeAttribute("readonly");
            blotterin.removeAttribute("readonly");
            aa.removeAttribute("readonly");
            b.removeAttribute("readonly");
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
