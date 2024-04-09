<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

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
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM docreq WHERE id=".$_GET['id'];
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $documenttype = $row['documentType'];
                            $fullname = $row['Fullname'];
                            $dateOfResidence = $row['DateofResidence'];
                            $purok = $row['purok'];
                            $CORPurpose = $row['CORPurpose'];
                            $COIReason = $row['COIReason'];
                            $Status = $row['Status'];
                            $Curdate = $row['CURDATE'];
                            $dateRFP = $row['dateRFP'];
                            $datePickedup = $row['datePickedup'];
                            $pay = $row['amountpaid'];
                            $userid = $row['user_id'];
                            //clearance
                            $dateofBirth = $row['dateOfBirth'];
                            $placeOfBirth = $row['placeOfBirth'];
                            $height = $row['height'];
                            $weight = $row['weight'];
                            $BCpurpose = $row['BCpurpose'];
                            //kasunduan
                            $Bname = $row['Bname'];
                            $Lname = $row['Lname'];
                            $kaddress = $row['Kaddress'];
                            $Kmoney = $row['Kmoney'];
                            $KBAL = $row['KBAL'];
                            $KBALL = $row['KBALL'];
                            //barc
                            $BarcRBrgy = $row['BarcRBrgy'];
                            $BarcALAsqm = $row['BarcALAsqm'];
                            $BarcALAhectare = $row['BarcALAhectare'];
                            $BarcOwner = $row['BarcOwner'];
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                $sql22 = "SELECT user_email FROM users WHERE user_id=".$userid;
                 $result22 = $connn-> query($sql22);
                 if ($result22-> num_rows > 0) {
                        while ($row2 = $result22-> fetch_assoc()) {
                            $useremail = $row2["user_email"];
                        }
                    }
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="DocReq.php">
        <span class="closer">&times;</span>
    </a>
    <h2>Document Request Information</h2>
    <?php
        if ($documenttype =="Certificate of Residency") {
    ?>
    <form method="post" action="DocReqmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">        
            <input type="text" name="email" value="<?= $useremail ?>" hidden>    
                 <label>Full Name:</label><br>
                <input id="bt" class="inpu" type="text" name="name" value="<?= $fullname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest" value="<?= $Curdate ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>
                <label>Date of Residence:</label><br>
                            <input id="dof" class="inpu" type="text" name="dof" value="<?= $dateOfResidence ?>" readonly placeholder="Enter Date" required><br>
                  <?php
                    if ($documenttype == "Certificate of Residency") {
                        echo '
                            <label>Purok:</label><br>
                            <input id="dof" class="inpu" type="text" name="purok" value="'. $purok .'" readonly placeholder="Enter Date" required><br>
                           
                        ';
                    }

                ?>

            </div>
            <div class="inputpop2">
                <label for="blotterin">Purpose:</label><br>
                <textarea class="inpuer" id="blotterin" name="BI" rows="35" cols="5" readonly required><?php if ($documenttype == "Certificate of Residency") {echo $CORPurpose; } 
                    else {
                        echo $COIReason;
                    }?></textarea>
                <br> 
                 <?php
                    if ($documenttype == "Certificate of Residency") {
                        echo '
                  
                             ';
                    }

                ?>
            </div>
            <div class="inputpop3">
                <?php 
                    if (($Status == "Picked-up") || ($Status == "Cancelled") || ($Status == "Denied")) {
                ?>
                              <label style="color:red;">Date Picked Up:</label><br>
                <input class="inpu" type="date" name="Datepicked" value="<?= $datePickedup ?>" required disabled><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input class="inpu" type="number" name="Amountpaid" value="<?= $pay ?>" required disabled><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status" disabled class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                                <option value="Cancelled" <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                            </select>
                            <br /> 

                            <button id="editsub" class="btndocu wer" name="submit" type="submit" hidden>Update</button>
                          <!--  <a href="asdf.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>  -->
                        <?php 
                            } else {
                        ?>       
                <label style="color:red;">Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="Datepicked" value="<?= $datePickedup ?>" required><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="Amountpaid" value="<?= $pay ?>" required><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status"  class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                            </select>
                            <br /> 

                           
                            <button id="editsub" class="btndocu wer" name="submit" type="submit" >Update</button>
                         <!--    <a href="asdf.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a> -->
                        <?php 
                            }
                        ?> 
                <input type="text" name="id" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>
<?php 
    } elseif ($documenttype == "Certificate of Indigency") {
?>
<form method="post" action="DocReqmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">   
            <input type="text" name="email" value="<?= $useremail ?>" hidden>         
                 <label>Full Name:</label><br>
                <input id="bt" class="inpu" type="text" name="name2" value="<?= $fullname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest2" value="<?= $Curdate ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype2" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>

            </div>
            <div class="inputpop2">
                <label for="blotterin">Purpose:</label><br>
                <textarea class="inpuer" id="blotterin" name="BI2" rows="35" cols="5" readonly required><?php echo $COIReason; ?></textarea>
                <br> 
            </div>
            <div class="inputpop3">
                 <?php 
                    if (($Status == "Picked-up") || ($Status == "Cancelled") || ($Status == "Denied")) {
                ?>
                 <label style="color:red;">Date Picked Up:</label><br>
                <input class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required disabled><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required disabled><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2" disabled class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                                <option value="Cancelled" <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                            </select>
                            <br /> 
                        <!--    <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                            <button id="editsub" class="btndocu wer" name="submit2" type="submit" hidden>Update</button>

                        <?php
                            } else {
                        ?>
                            <label style="color:red;">Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2"  class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                            </select>
                            <br />  
                       <!--     <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                    <button id="editsub" class="btndocu wer" name="submit2" type="submit" >Update</button>
                            <?php
                                }
                            ?>
                <input type="text" name="id2" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>

<?php 
} elseif ($documenttype == "Kasunduan") {
?>
<form method="post" action="DocReqmore2.php">
    <input type="text" name="email" value="<?= $useremail ?>" hidden>
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                <label>Borrower:</label><br>
                <input  class="inpu" type="text" name="Bname" value="<?= $Bname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Lender:</label><br>
                <input  class="inpu" type="text" name="Lname" value="<?= $Lname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Full Address:</label><br>
                <input  class="inpu" type="text" name="address" value="<?= $kaddress ?>" readonly placeholder="Enter Blotter Type" required><br>
                 <label>Money Borrowed (Total Amount):</label><br>
                <input  class="inpu" type="text" name="money" value="<?= $Kmoney ?>" readonly placeholder="Enter Blotter Type" required><br>
                

            </div>
            <div class="inputpop2">
                <label>Borrower's Agricultural Land Size: (Hectares)</label><br>
                <input  class="inpu" type="text" name="BAL" value="<?= $KBAL ?>" readonly placeholder="Enter Blotter Type" required><br>
                 <label>Borrower's Agricultural Land Location:</label><br>
                <input  class="inpu" type="text" name="BALL" value="<?= $KBALL ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest2" value="<?= $Curdate ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype2" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>
                <br> 
            </div>
            <div class="inputpop3">
                 <?php 
                    if (($Status == "Picked-up") || ($Status == "Cancelled") || ($Status == "Denied")) {
                ?>
                 <label style="color:red;">Date Picked Up:</label><br>
                <input class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required disabled><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required disabled><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2" disabled class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                                <option value="Cancelled" <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                            </select>
                            <br /> 
                        <!--    <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                            <button id="editsub" class="btndocu wer" name="submit3" type="submit" hidden>Update</button>

                        <?php
                            } else {
                        ?>
                            <label style="color:red;">Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2"  class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                            </select>
                            <br />  
                       <!--     <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                    <button id="editsub" class="btndocu wer" name="submit3" type="submit" >Update</button>
                            <?php
                                }
                            ?>
                <input type="text" name="id2" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>

<?php 
} elseif ($documenttype == "Barangay Clearance") {
?>
<form method="post" action="DocReqmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">    
                <input type="text" name="email" value="<?= $useremail ?>" hidden>
             <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype2" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>        
                <label>Full Name:</label><br>
                <input  class="inpu" type="text" name="fname" value="<?= $fullname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Purok:</label><br>
                <input  class="inpu" type="text" name="purok" value="<?= $purok ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date of Birth:</label><br>
                <input  class="inpu" type="text" name="dob" value="<?= $dateofBirth ?>" readonly placeholder="Enter Blotter Type" required><br>
                 <label>Place of Birth:</label><br>
                <input  class="inpu" type="text" name="pob" value="<?= $placeOfBirth ?>" readonly placeholder="Enter Blotter Type" required><br>
                
                

            </div>
            <div class="inputpop2">
                <label>Height: (cm)</label><br>
                <input  class="inpu" type="text" name="height" value="<?= $height ?>" readonly placeholder="Enter Blotter Type" required><br>
                 <label>Weight: (kg)</label><br>
                <input  class="inpu" type="text" name="weight" value="<?= $weight ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest2" value="<?= $Curdate ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Purpose:</label><br>
                <input  class="inpu" type="text" name="purpose" value="<?= $BCpurpose ?>" readonly placeholder="Enter Blotter Type" required><br>
                <br> 
            </div>
            <div class="inputpop3">
                 <?php 
                    if (($Status == "Picked-up") || ($Status == "Cancelled") || ($Status == "Denied")) {
                ?>
                 <label style="color:red;">Date Picked Up:</label><br>
                <input class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required disabled><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required disabled><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2" disabled class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                                <option value="Cancelled" <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                            </select>
                            <br /> 
                        <!--    <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                            <button id="editsub" class="btndocu wer" name="submit4" type="submit" hidden>Update</button>

                        <?php
                            } else {
                        ?>
                            <label style="color:red;">Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2"  class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                            </select>
                            <br />  
                       <!--     <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                    <button id="editsub" class="btndocu wer" name="submit4" type="submit" >Update</button>
                            <?php
                                }
                            ?>
                <input type="text" name="id2" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>

<?php 
} else {
?>
<form method="post" action="DocReqmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">    
                <input type="text" name="email" value="<?= $useremail ?>" hidden>
             <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype2" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>        
                <label>Full Name:</label><br>
                <input  class="inpu" type="text" name="fname" value="<?= $fullname ?>" readonly placeholder="Fullname" required><br>
                <label>Residing Barangay:</label><br>
                <input  class="inpu" type="text" name="rbrgy" value="<?= $BarcRBrgy ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest2" value="<?= $Curdate ?>" readonly placeholder="Enter Complainant" required><br>
                
                
                

            </div>
            <div class="inputpop2">
                <label>Agricultural Land Area: (sq.m.)</label><br>
                <input  class="inpu" type="text" name="sqm" value="<?= $BarcALAsqm ?>" readonly placeholder="Enter Blotter Type" required><br>
                 <label>Agricultural Land Area: (Hectares)</label><br>
                <input  class="inpu" type="text" name="hectare" value="<?= $BarcALAhectare ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Registered Owner of Agricultural Land:</label><br>
                <input  class="inpu" type="text" name="owner" value="<?= $BarcOwner ?>" readonly placeholder="Enter Blotter Type" required><br>
                 
                <br> 
            </div>
            <div class="inputpop3">
                 <?php 
                    if (($Status == "Picked-up") || ($Status == "Cancelled") || ($Status == "Denied")) {
                ?>
                 <label style="color:red;">Date Picked Up:</label><br>
                <input class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required disabled><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required disabled><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2" disabled class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                                <option value="Cancelled" <?php if ($Status=="Cancelled") echo 'selected="selected"';?>>Cancelled</option>
                            </select>
                            <br /> 
                        <!--    <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                            <button id="editsub" class="btndocu wer" name="submit5" type="submit" hidden>Update</button>

                        <?php
                            } else {
                        ?>
                            <label style="color:red;">Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="datepicked2" value="<?= $datePickedup ?>" required><br>
                <label style="color:red;">Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="amountpaid2" value="<?= $pay ?>" required><br>
                 <label style="color:red;">Status:</label>
                            <label for="stat"></label>
                           <select id="stat" name="status2"  class="inpu" style="margin-bottom: 80px;">
                               <option value="Processing" <?php if ($Status=="Processing") echo 'selected="selected"';?>>Processing</option>
                              <option value="Denied" <?php if ($Status=="Denied") echo 'selected="selected"';?>>Denied</option>
                               <option value="Ready-for-pick-up" <?php if ($Status=="Ready-for-pick-up") echo 'selected="selected"';?>>Ready-for-pick-up</option>
                               <option value="Picked-up" <?php if ($Status=="Picked-up") echo 'selected="selected"';?>>Picked-up</option>
                            </select>
                            <br />  
                       <!--     <a href="asdfff.htm" style="font-size: 40px;margin-left: 50px; padding-top: 15px;"><i class='bx bx-printer'></i></a>    -->
                    <button id="editsub" class="btndocu wer" name="submit5" type="submit" >Update</button>
                            <?php
                                }
                            ?>
                <input type="text" name="id2" value="<?= $id ?>" hidden>
                    

            </div>
        </div>  

      
    </div>
</form>

<?php 
}
 $sql = "SELECT id, blotter_no, complainant, complained, dateOfFiling, Status, personInCharge from blotter WHERE complainant = '$fullname' AND blotter_status = 'Approved' OR complained = '$fullname' AND blotter_status = 'Approved'";
                     $result8 = mysqli_query($connn, $sql); 
         
                        if ($result8) 
                        { 
                            $blotternum = mysqli_num_rows($result8); 
                            mysqli_free_result($result8); 
                        }  

    $sql6 = "SELECT * FROM users WHERE user_id = '$userid'";
                 $result4 = $connn-> query($sql6);
                 if ($result4-> num_rows > 0) {
                        while ($row = $result4-> fetch_assoc()) {
                            $lastname2 = $row['Last_name'];
                            $firstname2 = $row['First_name'];
                        }
                    }
                    $sql4 = "SELECT * from resident WHERE firstname = '$firstname2' OR lastname = '$lastname2'";
                     $result2 = mysqli_query($connn, $sql4); 

                    if ($result2) 
                        { 
                            $residentnum = mysqli_num_rows($result2); 
                            mysqli_free_result($result2); 
                        } 
 ?>
  </div>
  <br><br><br>
  <hr>

  <div style="margin-top:30px;padding: px;width: 100%;overflow-x: auto;">
      <h2 style="padding: 10px;">Blotter Record (<?= $blotternum ?>)</h2>
<div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:95%; overflow-x: auto;">
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
                    $sql = "SELECT id, blotter_no, complainant, complained, dateOfFiling, Status, personInCharge, blotter_status from blotter WHERE complainant = '$fullname' AND blotter_status = 'Approved' OR complained = '$fullname' AND blotter_status = 'Approved' ";
 
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                         echo "<p style='text-align:center;font-size:16px;padding-bottom:15px;color:grey'>Blotters that has the same complainant or complained name.</p>";
                        while ($row = $result-> fetch_assoc()) {
                            
                            echo "<tr><td>". $row["blotter_no"] ."</td><td>". $row["complainant"] ."</td><td>". $row["complained"] ."</td><td>". $row["dateOfFiling"] ."</td><td>". $row["personInCharge"] ."</td><td>". $row["Status"] ."</td>
                                    <td>
                                    <form action='Blotterdocreq.php?row_id=".$row['id']. " ' method='POST'>
                                       
                                            <button class='editt' type='submit' name='more'>MORE</button>
                                            <input name='ii' type='text' value='" .$_GET['id']. "' hidden>
                                    </form>
                                    </td>
                                    </tr>";
                        }
                    }

                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>This person currently have not been involved in blotter reports</p>";
                    }

                
                   ?>

              
        </tbody>
        </table>
                </div>
            </div>
        </div>
  </div>
  <br>
  <hr>
  <div style="margin-top:30px;padding: px;width:100%;overflow-x: auto;">
      <h2 style="padding: 10px;">Residents Record (<?= $residentnum ?>)</h2>
       <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:95%; overflow-x: auto;">
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
                 $sql3 = "SELECT * FROM users WHERE user_id = '$userid'";
                 $result3 = $connn-> query($sql3);
                 if ($result3-> num_rows > 0) {
                        while ($row = $result3-> fetch_assoc()) {
                            $lastname = $row['Last_name'];
                            $firstname = $row['First_name'];
                        }
                    }
                    $sql = "SELECT * from resident WHERE firstname = '$firstname' OR lastname = '$lastname' ";
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
                                       <form action='Residentdocreq.php?row_id=".$row['id']. " ' method='POST'>
                                       
                                            <button class='editt' type='submit' name='more2'>MORE</button>
                                            <input name='ii2' type='text' value='" .$_GET['id']. "' hidden>
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
    window.onload = function() {
   sessionStorage.setItem("favoriteMovie", "Shrek");
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
<script type="text/javascript">
    $(document).ready(function() {
  $("#stat").change(function() {
    $("#dp").prop("disabled", this.value != "Picked-up");
    $("#ap").prop("disabled", this.value != "Picked-up");  
  }).change();
});
</script>
