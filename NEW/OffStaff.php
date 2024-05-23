<?php
include 'headAdmin.php';
include 'topbarAdmin.php';
include 'sidebar.php';
include 'db_conn.php';
unset($_SESSION['iss']);
?>
<script type="text/javascript">
        localStorage.removeItem("bt")
        localStorage.removeItem("loi")
        localStorage.removeItem("dof")
    </script>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            OFFICIALS PAGE
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

<div style="height: 70px;width: 100%;padding:10px;padding-left:20px">
    <h1>
        Barangay Officials
    </h1>
    
</div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
             <thead>
                <tr>
                    <th>Name</th>
                    <th>Chairmanship</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                    $sql = "SELECT * from officials WHERE committee = 'Official'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["chairmanship"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffmore' method='POST'>
                                            <input name='id' value='". $row['id'] ."' hidden>
                                            <button class='editt' name='submit' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no officials data at the moment</p>";
                    }

                   ?>

            
        </tbody>
        </table>
                </div>
            </div>
             <hr style="margin-top:50px">
             <div style="height: 70px;width: 100%;padding:10px;padding-left:20px;display:flex;margin-bottom:20px">
                <h1 style="width:50%">
                    Barangay Tanod
                </h1>
                <div style="display:;width:50%; text-align:right;height:60px;float:right;" >
                    <button class="addd" onclick="document.location='TanodAdd'" style="height:100%">ADD TANOD</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
             <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                 <?php
                    $sql = "SELECT * from officials WHERE position = 'Tanod'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='TanodStaffmore' method='POST'>
                                            <input name='id' value='". $row['id'] ."' hidden>
                                            <button class='editt' name='submit' type='submit'>MORE</button>
                                        </form>
                                    </td>
                                    </tr>";
                        }
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>There are currently no tanod information at the moment</p>";
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
<script type="text/javascript">// Get the modal
var modal = document.getElementById("myModal");
var modal1 = document.getElementById("myModal1");
var modal2 = document.getElementById("myModal2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closer")[0];
var span1 = document.getElementsByClassName("closer1")[0];
var span2 = document.getElementsByClassName("closer2")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal1.style.display = "block";
}
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal1.style.display = "none";
}
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
