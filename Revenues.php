<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
require_once "../include/db_conn.php";
?>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            REVENUES RECORD PAGE
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
                    <th>Transaction Date</th>
                    <th>Recipient</th>
                    <th>Details</th>
                    <th>Amount (P)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                  <?php
                    $sql = "SELECT * from revenues";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["datepick"] ."</td><td>". $row["fullname"] ."</td><td>". $row["docreq"] ."</td><td>". $row["amountpaid"] ."</td>
                                    <td>
                                        <a href='Revenuesmore.php?id=". $row['id'] ."'>
                                            <button class='editt'>MORE</button>
                                        </a>
                                        
                                    </td>
                                    </tr>";
                        }

                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no Successful transactions at the moment</p>";
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