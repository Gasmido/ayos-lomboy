<?php
include 'headAdmin.php';
include 'topbarAdmin.php';


if (isset($_SESSION['iss'])) {
$idd = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: Revenues');            
}
elseif (isset($_POST['id'])) {
    
    $idd = $_POST['id'];
    if (!isset($_SESSION['iss'])) {
    $_SESSION['iss'] = $_POST['id'];
    }
} 
else {
header('location: Revenues');
}
include 'sidebar.php';
include 'db_conn.php';
                   ?>


<div class="home-section">	
    
	<div class="admin-home-blot">

        <?php
            $sql3 = "SELECT * FROM revenues WHERE id=".$idd;
                 $result3 = $connn-> query($sql3);
                 if ($result3-> num_rows > 0) {
                        while ($row = $result3-> fetch_assoc()) {
                            $id = $row['id'];
                            $documenttype = $row['docreq'];
                            $fullname = $row['fullname'];
                            $Curdate = $row['datepick'];
                            $dateRFP = $row['datereq'];
                            $pay = $row['amountpaid'];

                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no blotter records at the moment</p>";
                    }
                $connn-> close();
        ?>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr3">
    <a href="Revenues">
        <span class="closer">&times;</span>
    </a>
    <h2>Transaction Information</h2>
    <form method="post" action="Revenuesmore2.php">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">            
                 <label>Recipient:</label><br>
                <input id="bt" class="inpu" type="text" name="name" value="<?= $fullname ?>" readonly placeholder="Enter Blotter Type" required><br>
                <label>Date Requested:</label><br>
                <input id="cp" class="inpu" type="text" name="daterequest" value="<?= $dateRFP ?>" readonly placeholder="Enter Complainant" required><br>
                <label>Document Requested:</label><br>
                <input id="cpd" class="inpu" type="text" name="Docutype" value="<?= $documenttype ?>" readonly placeholder="Enter Complained" required><br>

            </div>
            <div class="inputpop2">
                <label>Date Picked Up:</label><br>
                <input id="dp" class="inpu" type="date" name="Datepicked" value="<?= $Curdate ?>" required readonly><br>
                <label>Amount Paid:</label><br>
                <input id="ap" class="inpu" type="number" name="Amountpaid" value="<?= $pay ?>" required readonly><br>
 <input type="text" name="id" value="<?= $id ?>" hidden>
                
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
      let bno = document.getElementById("bno");
      let bt = document.getElementById("bt");
      let cp = document.getElementById("cp");
      let cpd = document.getElementById("cpd");
      let loi = document.getElementById("loi");
      let dof = document.getElementById("dof");
      let stat = document.getElementById("stat");
      let blotterin = document.getElementById("blotterin");
      let editsub = document.getElementById("editsub");
     
            bno.removeAttribute("readonly");
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
