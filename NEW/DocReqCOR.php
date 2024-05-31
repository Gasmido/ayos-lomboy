<?php
include 'headAdmin.php';
include 'topbarAdmin.php';
include 'sidebar.php';
require_once "db_conn.php";
unset($_SESSION['COR']);
unset($_SESSION['iss']);
unset($_SESSION['iiii']);
unset($_SESSION['iiiia']);
unset($_SESSION['iii']);
unset($_SESSION['iiiias']);
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
    <button class="addd" onclick="document.location='DocReq'">BACK</button>  
      </div>  
      <div class="admin-blotter">
         
</div>       
<h1 style="padding-left: 30px;padding-bottom: 20px;">Requested Certificate of Residency</h1>
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
                    $sql = "SELECT id, user_id, CURDATE, documentType, Status from docreq WHERE documentType = 'Certificate of Residency'";
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
                                        <form action='DocReqmoreCOR' method='POST'>
                                            <input name='id' value='". $row['id'] ."' hidden>
                                            <input name='cor' value='COR' hidden>
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
<script src="Datatables/js/jquery.js"></script>
<script src="Datatables/js/jquery.dataTables.js"></script>
<script src="Datatables/js/bootstrap.js"></script>
<script src="Datatables/js/dataTables.bootstrap.js"></script>
<script src="Datatables/js/script.js"></script>