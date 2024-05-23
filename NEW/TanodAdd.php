<?php
include 'headAdmin.php';
include 'topbarAdmin.php';

include 'db_conn.php';

$query6 = "SELECT * FROM officials WHERE committee='Tanod'";
        $result6 = mysqli_query($connn, $query6); 
         
        if ($result6) 
        { 
            $male = mysqli_num_rows($result6); 
            mysqli_free_result($result6); 
        }
        if ($male >= 20) {
            $_SESSION['statu'] = "Tanod is limited to 20 members";
            header("location: OffStaff");
        }

        include 'sidebar.php';
 ?>

<div class="home-section">	
   
	<div class="admin-home">
        <div style="width: 100%;text-align: center;margin-bottom: 20px;height: 50px;">
            <?php
                    if (isset($_SESSION['wrongs'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['wrongs']; echo "</p>";
                        unset($_SESSION['wrongs']);
                    }
                    elseif (isset($_SESSION['wrong'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['wrong']; echo "</p>";
                        unset($_SESSION['wrong']);
                    }
                     elseif (isset($_SESSION['big'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['big']; echo "</p>";
                        unset($_SESSION['big']);
                    }
                ?>
        </div>
		
        <div id="myModalblot" class="modal4">

  <!-- Modal content -->
  <div class="modal-contentRr2">
    <a href="OffStaff">
        <span class="closer">&times;</span>
    </a>
    <h2>Add Tanod</h2>
    
    <form method="post" action="TanodAdd2.php" enctype="multipart/form-data">
    <div class="modal-inside">
        <div class="models">
            <div class="inputpop">
            <label>Official Photo:
                
            </label>            
                <img src="officials/0.png" style="width: 250px;height: 240px;" id="output">
               <input type="file" accept=".jpg, .jpeg, .png" name="image" id="imagea" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> <br>
            </div>
            <div class="inputpop2">
                <label>Fullname:</label><br>
                <input id="bt" class="inpu" type="text" name="name" onkeyup="saveValue(this);" placeholder="Enter Fullname" required><br>
                <label>Position:</label><br>
                <input class="inpu" type="text" name="position" value="Tanod" disabled><br>
            </div>
            <div class="inputpop3">
               <label>Term Start:</label><br>
                <input id="loi" class="inpu" type="date" name="termstart" onchange="saveValue(this);" placeholder="Enter Location" required><br>
                <label>Term End:</label><br>
                <input id="dof" class="inpu" type="date" name="termend" onchange="saveValue(this);" placeholder="Enter Date" required><br>
                   <button id="editsub" class="btndocu wer" name="submit" type="submit">ADD</button> 

            </div>
        </div>  

      
    </div>
</form>
  </div>
</div>

</div>
</div>
<script type="text/javascript">
            document.getElementById("bt").value = getSavedValue("bt"); 
            document.getElementById("loi").value = getSavedValue("loi");    
            document.getElementById("dof").value = getSavedValue("dof");

        function saveValue(e){
            var id = e.id;  
            var val = e.value; 
            localStorage.setItem(id, val); 
        }

 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
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
