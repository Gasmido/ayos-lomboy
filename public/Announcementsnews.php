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
        } elseif (isset($_SESSION['wrong'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['wrong']; echo "</p>";
                        unset($_SESSION['wrong']);
        } elseif (isset($_SESSION['wrongs'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['wrongs']; echo "</p>";
                        unset($_SESSION['wrongs']);
        }
         elseif (isset($_SESSION['big'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['big']; echo "</p>";
                        unset($_SESSION['big']);
        }
        elseif (isset($_SESSION['title'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['title']; echo "</p>";
                        unset($_SESSION['title']);
        }
        elseif (isset($_SESSION['desc'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['desc']; echo "</p>";
                        unset($_SESSION['desc']);
        }
    ?>
    <button class="addd" onclick="document.location='Announcements.php'">BACK</button> 
</div>		
<div class="admin-homes"> 
    <div class="admin-events">
        <form class="announceform" method="post" action="Announcementsnewsadd.php" enctype="multipart/form-data">
            <label for="image">Cover Image:</label>
            <input type="file" accept=".jpg, .jpeg, .png" name="image" id="image"> <br>
            <label for="title">News' Title:</label><br>
            <input class="inpus" type="text" name="title" id="title" onkeyup="saveValue(this);"><br><br>
            <label for="desc">News' Description:</label><br>
            <textarea class="inpuers" name="desc" id="desc" rows="35" cols="100" onkeyup="saveValue(this);"></textarea>
            <section style="text-align:right">
                <button class="btndocu wer" name="submit" type="submit">Submit</button>
            </section>
        </form>
    </div> 
      
</div>
</div>
<script type="text/javascript">
            document.getElementById("title").value = getSavedValue("title");    
            document.getElementById("desc").value = getSavedValue("desc");

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
<script src="../DataTables/js/jquery.js"></script>
<script src="../DataTables/js/jquery.dataTables.js"></script>
<script src="../DataTables/js/bootstrap.js"></script>
<script src="../DataTables/js/dataTables.bootstrap.js"></script>
<script src="../DataTables/js/script.js"></script>