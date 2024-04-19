<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
require_once "../include/db_conn.php";
unset($_SESSION['iss']);
?>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            DOCUMENT REQUESTS PAGE
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
    ?> 
      </div>    
      <div style="height: 20px;width: 100%;"></div>   
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Requester</th>
                    <th>Date Requested</th>
                    <th>Document</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT id, user_id, CURDATE, documentType, Status from docreq";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {

                            $sql2 = "SELECT user_email from users WHERE user_id =". $row["user_id"];
                            $result2 = $connn-> query($sql2);
                            if ($result2-> num_rows > 0) {
                                while ($row2 = $result2-> fetch_assoc()) {
                                    $email = $row2["user_email"];
                                }
                            }
                            echo "<tr><td>". $row["id"] ."</td><td>"; echo $email; echo "</td><td>". $row["CURDATE"] ."</td><td>". $row["documentType"] ."</td><td>". $row["Status"] ."</td>
                                    <td>
                                        <form action='DocReqmore' method='POST'>
                                            <input name='id' value='". $row['id'] ."' hidden>
                                            <button class='editt' name='submit' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no documents requested at the moment</p>";
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