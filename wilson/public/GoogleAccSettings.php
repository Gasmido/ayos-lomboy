<?php
include '../include/head.php';
require_once "../include/db_conn.php";

if (isset($_SESSION['ID']) && (isset($_SESSION['user_token']))){

?>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red"><img class="logoo3" src="image/logoo.png"><p>Barangay Ayos Lomboy</p></div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/logout.php">Log-out</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>

<div class="homepage docud">
  <div class="adddell">
        

      </div>
  <div class="docu-home">
    <div class="docu-form" style="margin-top:0px;height:950px">
      
        
        
        <?php
          $sql1 = "SELECT * FROM users WHERE user_id=". $id;
                  $result1 = $connn-> query($sql1);
                  if ($result1-> num_rows > 0) {
                        while ($row = $result1-> fetch_assoc()) {
                            $f2name = $row['First_name'];
                            $m2name = $row['Middle_name'];
                            $l2name = $row['Last_name'];
                            $e2name = $row['Extension_name'];
                            $bday = $row['birthdate'];
                            $sex = $row['sex'];
                            $citi = $row['citizenship'];
                        }
                    }   
        ?>
          <h1>ACCOUNT SETTING</h1>
          <div style="height:50px; text-align:center">
          <h3 style="color:grey">(Please fill up form before continuing)</h3>
          
          </div>
          <form action="AccSettingedit2.php" method="post">
          <label>First Name:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
        <input id="1" type="text" minlength="2" maxlength="20" name="fname" class="inputt" value="<?= $firstnames ?>"  pattern="[A-Za-z ]{1,32}" title="Only letters" placeholder="e.g. Juan" required></input>
        <label>Middle Initial/Name:</label>
        <input id="2" type="text" minlength="1" maxlength="10" name="mname" class="inputt" value="<?= $middlename ?>" pattern="^[a-zA-Z\.]*$" title="Only letters and periods" placeholder="e.g. S. or Santiago"></input>
        <label>Last Name:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
        <input id="4" type="text" minlength="2" maxlength="20" name="lname" class="inputt" value="<?= $lastname ?>" pattern="[A-Za-z ]{1,32}" title="Only letters" placeholder="e.g. Natividad" required></input>
        <label>Extension Name:</label>
        <input id="5" type="text" minlength="1" maxlength="10" name="ename" class="inputt" value="<?= $extensionname ?>" pattern="^[a-zA-Z\.]*$" title="Only letters" placeholder="e.g. Jr."></input>
        <label>Birth Date:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
        <input id="3" type="date" name="bday" class="inputt" value="<?= $bday ?>" max="<?php echo date("Y-m-d"); ?>" min="1934-12-31" required></input>
        <label>Sex:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
        <select id="6" class="inputt" name="sex" required>
                  <option <?php if ($sex=="Male") echo 'selected="selected"';?>>Male</option>
                  <option <?php if ($sex=="Female") echo 'selected="selected"';?>>Female</option>
                </select>
        <label>Citizenship:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
        <select id="7" class="inputt" name="citizenship" required>
                  <option <?php if ($citi=="Natural-Born-Citizen") echo 'selected="selected"';?>>Natural-Born-Citizen</option>
                  <option <?php if ($citi=="Naturalized-Citizen") echo 'selected="selected"';?>>Naturalized-Citizen</option>
                </select>
                <label>Purok:</label><label style="color:red;font-size: 18px;font-weight: 500;"> *</label>
                <select class="inputt" name="purok" required>
                  <option <?php if ($purokss=="1") echo 'selected="selected"';?>>1</option>
                  <option <?php if ($purokss=="2") echo 'selected="selected"';?>>2</option>
                  <option <?php if ($purokss=="3") echo 'selected="selected"';?>>3</option>
                  <option <?php if ($purokss=="4") echo 'selected="selected"';?>>4</option>
                </select>
               <input type="text" name="idd" value="<?= $id ?>" hidden></input>
        <section>
          
    </section>
        <section>
        <button id="editsub" type="submit" name="submits" class="docusub">Submit</button>
        
      </section>
      </form>
    


    </div>

  </div>
</div>
 

<?php
include '../include/footer.php';
}
else {
  header('location:Homepage.php');
}
?>