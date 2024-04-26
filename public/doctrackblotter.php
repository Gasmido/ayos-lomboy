<?php
session_start();
if (isset($_SESSION['ID'])){
    require_once "../include/db_conn.php";
    $id = $_SESSION['ID'];
    $stata = $_SESSION['status'];
    if ($stata == "Approved") {
?>
<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../DataTables/css/bootstrap.css"> 
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
    function myRightClick() {
      alert("Right click is not allowed.");
      return false;
    }

    document.onkeydown = function(e) {
      if(event.keyCode == 123) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
    }
  </script>
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>

<div class="docmain">
<div class="adddel2">
   
    <button class="addd" onclick="document.location='doctrack'">DOCUMENT REQUESTS</button> 
      </div> 
  <div class="docbod">

  <div>
<h1 class="docttle">Blotter Reports</h1>
</div>

 <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Complained Individual</th>
                    <th>Date Requested</th>
                    <th>Incident Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
                   <?php
                    $sql = "SELECT id, complained, dateOfFiling, blotter_type, Status from blotter WHERE user_id= $id";
                    $result = $connn-> query($sql);
                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["complained"] ."</td><td>". $row["dateOfFiling"] ."</td><td>". $row["blotter_type"] ."</td><td>". $row["Status"] ."</td>
                                    
                                   ";

                                 /*  if ($row['Status'] == 'Active') {
                                        echo "
                                        </a>
                                        <a>
                                        <button class='cancelled'></button>
                                        </a>
                                            ";

                                    }

                                    elseif ($row['Status'] == 'Settled') {
                                        echo "
                                        </a>
                                        <a>
                                        <button class='donee'></button>
                                        </a>
                                            ";

                                    }

                                    else {
                                        
                                    echo "
                                        <button class='donee'></button>
                                            ";
                                    } 
                                    */
                                        echo"
                                        </a>
                                        </td>
                                        </tr>";
                        }
                      
                    }
                    else {
                        echo "<p style='text-align:center;font-size:25px;padding-bottom:15px;'>You have currently no blotter reports at the moment</p>";
                    }
                    $connn-> close();

                    if (isset($_SESSION['statusss'])) {
                        echo "<p id='ha' style='text-align:center;font-size:20px;padding-bottom:20px;color:green;'>";
                        echo $_SESSION['statusss']; echo "</p>";
                        unset($_SESSION['statusss']);
                    }
                    elseif (isset($_SESSION['statuss'])) {
                        echo "<p id='ha' style='text-align:center;font-size:20px;padding-bottom:20px;color:red;'>";
                        echo $_SESSION['statuss']; echo "</p>";
                        unset($_SESSION['statuss']);
                    }
                   ?>
                    
                         
                    
                
           
        </tbody>
        </table>
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
</body>
</html>
<?php
}elseif ($stata == "Denied") {
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../DataTables/css/bootstrap.css"> 
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element">
    <div class="red">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="docmain">
  <div class="docbod">
  <div>
<h1 class="docttle">Blotter Reports</h1>
</div>

 <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 style="text-align: center; padding: 40px;">Sorry but your account have been denied access in this page.</h1>
                </div>
            </div>
        </div>

  </div>

<script src="../DataTables/js/jquery.dataTables.js"></script>
<script src="../DataTables/js/bootstrap.js"></script>
<script src="../DataTables/js/dataTables.bootstrap.js"></script>
<script src="../DataTables/js/script.js"></script>
</body>
</html>
<?php
}else {
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../DataTables/css/bootstrap.css"> 
    <link rel="stylesheet" href="../DataTables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element">
    <div class="red">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="docmain">
  <div class="docbod">
  <div>
<h1 class="docttle">Blotter Reports</h1>
</div>

 <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 style="text-align: center; padding: 40px;">Sorry but your account have not been approved yet.</h1>
                </div>
            </div>
        </div>

  </div>



<script src="../DataTables/js/jquery.js"></script>
<script src="../DataTables/js/jquery.dataTables.js"></script>
<script src="../DataTables/js/bootstrap.js"></script>
<script src="../DataTables/js/dataTables.bootstrap.js"></script>
<script src="../DataTables/js/script.js"></script>
</body>
</html>
<?php
} 
}else {
 header("location:Homepage");
}
?>