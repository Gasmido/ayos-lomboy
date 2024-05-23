<?php
include 'headAdmin.php';
include 'topbarAdmin.php';
include 'sidebar.php';
include 'db_conn.php';
unset($_SESSION['iss']);
unset($_SESSION['dele']);
unset($_SESSION['statuss']);
unset($_SESSION['statusss']);

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
            <a href="Announcementsnews">
                <h2 >
                    Add News
                </h2>
               
            </a>
        </div>
     
        <div class="admin-home-boxex d">
            <a href="Announcementsevents">
                <h2 >
                    Add Events
                </h2>
              
            </a>
        </div>
    </div> 
<div class="news">
    <h1>Current Events</h1>
    <div class="Services2">
    <div class="servicescontent2">
             <?php
                    $sql = "SELECT id, eventTitle, eventDesc, eventPic from announcements where eventTitle != '' && removed IS NULL";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
                                                                    <div class="boximg2">
                                                                        <img width="160" height="130" src="image/'. $row['eventPic'] .'">
                                                                    </div>
                                                                    <div class="evedesc2">
                                                                        <h4>
                                                                            '. $row['eventTitle'] .'
                                                                        </h4>
                                                                    </div>
                                                                        <section class="boxbut2">
                                                                          
                                                                            <form action="AEmore" method="POST">
                                            <input name="ids" value="'. $row["id"] .'" hidden>
                                            <button class="btnservice" name="submit" type="submit">Edit</button>
                                        </form>
                                                                        </section>
                                                                </div>';
                        }
                    }
                    else {
                        echo "<p style='margin-bottom:50px;text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no Events at the moment</p>";
                    }
             
                   ?>   
            
        </div>
        </div>
<hr>
        <h1 style="margin-top: 30px;">Current News</h1>
    <div class="Services2">
    <div class="servicescontent2">
              <?php
                    $sql2 = "SELECT id, newsTitle, newsDesc, newsPic from announcements where newsTitle != '' && removed IS NULL";
                    $result2 = $connn-> query($sql2);

                    if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
                                                                    <div class="boximg2">
                                                                        <img width="160" height="130" src="image/'. $row['newsPic'] .'">
                                                                    </div>
                                                                    <div class="evedesc2">
                                                                        <h4>
                                                                            '. $row['newsTitle'] .'
                                                                        </h4>
                                                                    </div>
                                                                        
                                                                        <section class="boxbut2">
                                                                            <form action="ANmore" method="POST">
                                            <input name="ids" value="'. $row["id"] .'" hidden>
                                            <button class="btnservice" name="submit" type="submit">Edit</button>
                                        </form>
                                                                        </section>
                                                                
                                                                </div>';
                        }
                    }
                    else {
                        echo "<p style='margin-bottom:50px;text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no News at the moment</p>";
                    }
                    
                   ?>         
            
        </div>
        </div>
        <hr>
        <h1 style="margin-top: 30px;color:darkred;">Removed Events</h1>
    <div class="Services2">
    <div class="servicescontent2">
              <?php
                    $sql2 = "SELECT * from announcements where eventTitle != '' && removed = 1";
                    $result2 = $connn-> query($sql2);

                    if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
                                                                    <div class="boximg2">
                                                                        <img width="160" height="130" src="image/'. $row['eventPic'] .'">
                                                                    </div>
                                                                    <div class="evedesc2">
                                                                        <h4>
                                                                            '. $row['eventTitle'] .'
                                                                        </h4>
                                                                    </div>
                                                                        
                                                                        <section class="boxbut2">
                                                                            <form action="AEdeleted" method="POST">
                                            <input name="ids" value="'. $row["id"] .'" hidden>
                                            <button class="btnservice" name="submit" type="submit">Edit</button>
                                        </form>
                                                                        </section>
                                                                
                                                                </div>';
                        }
                    }
                    else {
                        echo "<p style='margin-bottom:50px;text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no deleted Events at the moment</p>";
                    }
                   ?>         
            
        </div>
        </div>
        <hr>
        <h1 style="margin-top: 30px;color:darkred;">Removed News</h1>
    <div class="Services2">
    <div class="servicescontent2">
              <?php
                    $sql2 = "SELECT * from announcements where newsTitle != '' && removed = 1";
                    $result2 = $connn-> query($sql2);

                    if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            echo '<div class="announceBox 1">
                                                                    <div class="boximg2">
                                                                        <img width="160" height="130" src="image/'. $row['newsPic'] .'">
                                                                    </div>
                                                                    <div class="evedesc2">
                                                                        <h4>
                                                                            '. $row['newsTitle'] .'
                                                                        </h4>
                                                                    </div>
                                                                        
                                                                        <section class="boxbut2">
                                                                            <form action="ANdeleted" method="POST">
                                            <input name="ids" value="'. $row["id"] .'" hidden>
                                            <button class="btnservice" name="submit" type="submit">Edit</button>
                                        </form>
                                                                        </section>
                                                                
                                                                </div>';
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding:10px;background-color:white;'>There are currently no deleted News at the moment</p>";
                    }
                    $connn-> close();
                   ?>         
            
        </div>
        </div>
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
<script src="Datatables/js/jquery.js"></script>
<script src="Datatables/js/jquery.dataTables.js"></script>
<script src="Datatables/js/bootstrap.js"></script>
<script src="Datatables/js/dataTables.bootstrap.js"></script>
<script src="Datatables/js/script.js"></script>