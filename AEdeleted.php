<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';

$_SESSION['dele'] = "nono";
if (isset($_SESSION['iss'])) {
$idd = $_SESSION['iss'];
}
elseif (!isset($_POST['submit'])) {
    header('location: Announcements');            
}
elseif (isset($_POST['ids'])) {
    
    $idd = $_POST['ids'];
} 
else {
header('location: Announcements');
}

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
        elseif (isset($_SESSION['statu'])) {
                        echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:red;' id='ha'>";
                        echo $_SESSION['statu']; echo "</p>";
                        unset($_SESSION['statu']);
        }
        elseif (isset($_SESSION['statuss'])) {
                echo "<p style='text-align:center;font-size:20px;font-weight:bold;padding-top:15px;color:green;' id='ha'>";
                echo $_SESSION['statuss']; echo "</p>";
                unset($_SESSION['statuss']);
        }

        $sql2 = "SELECT * FROM announcements WHERE id=".$idd;
                 $result2 = $connn-> query($sql2);
                 if ($result2-> num_rows > 0) {
                        while ($row = $result2-> fetch_assoc()) {
                            $id = $row['id'];
                            $eventTitle = $row['eventTitle'];
                            $eventDesc = $row['eventDesc'];
                            $eventPic = $row['eventPic'];
                            $curdate = $row['curdate'];
                            $updateddate = $row['updateddate'];
                        }
                    }
                    else {
                        header("Location: Announcements");
                    }
                $connn-> close();
    ?>
    <button class="addd" onclick="document.location='Announcements'">BACK</button> 

</div>      
<div class="admin-homes"> 
    <div class="admin-events">
        <form class="announceform" method="post" action="AEmore2" enctype="multipart/form-data">
            <input type="text" name="id" value="<?= $id ?>" hidden>
            <label for="da">Event's Upload Date:</label><br>
            <input id="da" type="date" value="<?php if ($updateddate) {echo $updateddate;} else echo $curdate; ?>" disabled></input><br><br>
            <label for="image">Cover Image:</label><br>
            <img src="image/<?= $eventPic ?>" width='400' height='300' id="output"><br><br>
            <input type="file" value="image/<?= $eventPic ?>" accept=".jpg, .jpeg, .png" name="image" id="image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> <br>
            <label for="title">Event's Title:</label><br>
            <input class="inpus" type="text" name="title" id="title" value="<?= $eventTitle ?>"><br><br>
            <label for="desc">Event's Description:</label><br>
            <textarea class="inpuers" name="desc" id="desc" rows="35" cols="100"><?php echo $eventDesc; ?></textarea>
            
            <section style="text-align:right">
                <button class="btndocu wer" name="submit" type="submit">Edit</button>
                <button class="btndocu wer" type="submit" name="jojo">Edit & Republish</button>
            </section>  
        </form>
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