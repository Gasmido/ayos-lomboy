<?php
include 'headAdmin.php';
include 'topbarAdmin.php';



if (isset($_SESSION['iss'])) {
$ids = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: OffStaffCommittee');            
}
elseif (isset($_POST['id'])) {
    
    $ids = $_POST['id'];
    if (!isset($_SESSION['iss'])) {
    $_SESSION['iss'] = $_POST['id'];
    }
} 
else {
header('location: OffStaffCommittee');
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
        } elseif (isset($_SESSION['wrong'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['wrong']; echo "</p>";
                        unset($_SESSION['wrong']);
        } elseif (isset($_SESSION['big'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['big']; echo "</p>";
                        unset($_SESSION['big']);
        }
    ?>
    <button id="edi" class="edd" onclick="Edit()">EDIT</button> 

    <button id="edi2" class="edd2" onclick="cancel()">CANCEL</button> 
      </div>
	<div class="admin-home-blot">

        <?php
            $sql2 = "SELECT * FROM officials WHERE id=".$ids;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $position = $row['position'];
                            $termstart = $row['termstart'];
                            $termend = $row['termend'];
                            $image = $row['image'];
                            $Status= $row['status'];
                            $com = $row['committee'];


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
    <a href="OffStaffCommittee">
        <span class="closer">&times;</span>
    </a>
    <h2>Edit Staff Information</h2>
    <?php
        if (isset($_POST['com'])) {
            $coom = $_POST['com'];
            $_SESSION['coom'] = $coom;
        }
        elseif (isset($_SESSION['coom'])) {
            $coom = $_SESSION['coom'];
        }
    ?>
    <form method="post" action="OffStaffCommitteemore2.php" enctype="multipart/form-data">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">
            <label>Official Photo:</label>            
                <img src="image/<?= $image ?>" style="width: 250px;height: 240px;" id="output">
               <input type="file" accept=".jpg, .jpeg, .png" name="image" id="image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" disabled> <br>
            </div>
            <div class="inputpop2">
                <label>Fullname:</label><br>
                <input id="bt" class="inpu" type="text" name="name" value="<?= $name ?>" readonly placeholder="Fullname" required><br>
                <label>Position:</label><br>
                    <select id="po" class="inpu" name="position" placeholder="position" disabled required><br>
                    <option id="select" value="select" disabled="" selected="">Please Select Position</option>
                    <option <?php if ($position=="Chairperson") echo 'selected="selected"';?> value="Chairperson">Chairperson</option>
                    <option <?php if ($position=="Co-Chairperson") echo 'selected="selected"';?> value="Co-Chairperson">Co-Chairperson</option>
                     <?php if ($coom == "Health") {
                        echo '<option '; if ($position=="BHW") {echo 'selected="selected"';} echo 'value="BHW">BHW</option>';}  ?>
                </select>
                <br>
                 <label>Status:</label>
                        <label for="stat"></label>
                        <select id="stat" name="status"  class="inpu" style="margin-bottom: 20px;" disabled>
                            <option value="Active" <?php if ($Status=="Active") echo 'selected="selected"';?>>Active</option>
                            <option value="Inactive" <?php if ($Status=="Inactive") echo 'selected="selected"';?>>Inactive</option>
                           
                        </select>
            </div>
            <div class="inputpop3">
                <input name='com' value='<?= $com ?>' hidden>
                <input name='position2' value='<?= $position ?>' hidden>
               <label>Term Start:</label><br>
                <input id="loi" class="inpu" type="date" name="termstart" value="<?= $termstart ?>" placeholder="Enter Location" readonly required><br>
                <label>Term End:</label><br>
                <input id="dof" class="inpu" type="date" name="termend" value="<?= $termend ?>" readonly placeholder="Enter Date" required><br>
               <input type="hidden" name="id" value="<?= $id ?>"/>
                   <button id="editsub" class="btndocu wer" name="submit" type="submit" hidden>Update</button> 

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
        let im = document.getElementById("image");
      let bt = document.getElementById("bt");
      let loi = document.getElementById("loi");
      let dof = document.getElementById("dof");
      let po = document.getElementById("po");
      let stat = document.getElementById("stat");
      let editsub = document.getElementById("editsub");
            po.removeAttribute("disabled");
            stat.removeAttribute("disabled");
            im.removeAttribute("disabled");
            bt.removeAttribute("readonly");
            loi.removeAttribute("readonly");
            dof.removeAttribute("readonly");
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
