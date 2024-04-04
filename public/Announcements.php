<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';


?>
<script type="text/javascript">
        localStorage.removeItem("title")
        localStorage.removeItem("desc")
</script>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            EVENTS AND NEWS PAGE
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
      </div> 
    <div class="admin-events">
         
        <div class="admin-home-boxex c">
            <a href="Announcementsnews.php">
                <h2 >
                    Add News
                </h2>
               
            </a>
        </div>
     
        <div class="admin-home-boxex d">
            <a href="Announcementsevents.php">
                <h2 >
                    Add Events
                </h2>
              
            </a>
        </div>
    </div> 
<div class="news">
    <h1>Current News and Events</h1>
</div>      
</div>
</div>
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