<?php
include 'headAdmin.php';
include 'topbarAdmin.php';
include 'sidebar.php';
require_once "db_conn.php";
unset($_SESSION['iss']);
unset($_SESSION['iiii']);
unset($_SESSION['iiiia']);
unset($_SESSION['iii']);
unset($_SESSION['iiiias']);
?>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            USER ACCOUNTS PAGE
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
                    <th>Full Name</th>
                    <th>Date Registered</th>
                    <th>Email</th>
                    <th>Account Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    $sql = "SELECT user_id, user_email, Last_name, First_name, Middle_name, Extension_name, Status, dateReg from users WHERE NOT user_id = 5";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["First_name"] ." ". $row["Middle_name"] ." ". $row["Last_name"] ." ". $row["Extension_name"] ."</td><td>". $row["dateReg"] ."</td><td>". $row["user_email"] ."</td><td>". $row["Status"] ."</td>
                                    <td>
                                        <form action='UserAccmore' method='POST'>
                                            <input name='id' value='". $row['user_id'] ."' hidden>
                                            <button class='editt' name='submit' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }

                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no registered users at the moment</p>";
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
<script src="Datatables/js/jquery.js"></script>
<script src="Datatables/js/jquery.dataTables.js"></script>
<script src="Datatables/js/bootstrap.js"></script>
<script src="Datatables/js/dataTables.bootstrap.js"></script>
<script src="Datatables/js/script.js"></script>