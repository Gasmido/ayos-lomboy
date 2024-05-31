<?php
include 'headAdmin.php';
include 'topbarAdmin.php';
include 'sidebar.php';
include 'db_conn.php';
unset($_SESSION['iss']);
unset($_SESSION['iiii']);
unset($_SESSION['iiiia']);
unset($_SESSION['iii']);
unset($_SESSION['iiiias']);
?>
<?php
$query6 = "SELECT * FROM resident WHERE sex='Male'";
        $result6 = mysqli_query($connn, $query6); 
         
        if ($result6) 
        { 
            $male = mysqli_num_rows($result6); 
            mysqli_free_result($result6); 
        }
        $query7 = "SELECT * FROM resident WHERE sex='Female'";
        $result7 = mysqli_query($connn, $query7); 
         
        if ($result7) 
        { 
            $female = mysqli_num_rows($result7); 
            mysqli_free_result($result7); 
        }
        $query8 = "SELECT * FROM resident";
        $result8 = mysqli_query($connn, $query8); 
         
        if ($result8) 
        { 
            $pop = mysqli_num_rows($result8); 
            mysqli_free_result($result8); 
        }  

       
        $maleratio =$male / $pop;
        $maleper=$maleratio * 100;
        $femaleratio =$female / $pop;
        $femaleper=$femaleratio * 100;
        $dataPoints = array( 

        
        array("label"=>"Male", "y"=>$maleper),
        array("label"=>"Female", "y"=>$femaleper)

)
?>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Male and Female Percentage"
    },
    subtitles: [{
        text: ""
    }],
    data: [{
        type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
<div class="home-section">
    <div class="admin-home-title">
        <h1>
            HOME PAGE
        </h1>
    </div>
<div class="admin-home">
    <?php
        $query = "SELECT id FROM blotter"; 
        $result = mysqli_query($connn, $query); 
          
        if ($result) 
        { 
            $blotter = mysqli_num_rows($result); 
            mysqli_free_result($result); 
        }
        $query2 = "SELECT id FROM docreq WHERE Status = 'Processing'"; 
        $result2 = mysqli_query($connn, $query2); 
          
        if ($result2) 
        { 
            $docreq = mysqli_num_rows($result2); 
            mysqli_free_result($result2); 
        } 
        $query3 = mysqli_query($connn, 'SELECT SUM(amountpaid) AS value_sum FROM revenues'); 
        $row = mysqli_fetch_assoc($query3); 
        $sum = $row['value_sum'];

        $query4 = "SELECT * FROM users WHERE NOT user_id=5";
        $result4 = mysqli_query($connn, $query4); 
         
        if ($result4) 
        { 
            $users = mysqli_num_rows($result4); 
            mysqli_free_result($result4); 
        }   
        $query5 = "SELECT id FROM officials WHERE status='Active'"; 
        $result5 = mysqli_query($connn, $query5); 
          
        if ($result5) 
        { 
            $officials = mysqli_num_rows($result5); 
            mysqli_free_result($result5); 
        } 
        
       mysqli_close($connn); 
    ?>

<a href="ResidentRecord">
    <div class="admin-home-box">
        <h2>
            Population
        </h2>

        <p>

             <?php
                echo $pop;
            ?>
        </p>
    </div>
    </a>
    <a href="ResidentRecord">
<!--    <div class="admin-home-box">
        <h2>
            No. of Male Residents
        </h2>
        <p>

            <?php
             //   echo $male;
            ?>
        </p>
    </div>
    </a>
    <a href="ResidentRecord">
    <div class="admin-home-box">
        <h2>
             No. of Female Residents
        </h2>
        <p>
             <?php
              //  echo $female;
            ?>
        </p>
    </div>
    </a>    -->
<a href="Blotter">
    <div class="admin-home-box">
        <h2>
            No. of Blotter
        </h2>
        <p>
            <?php
                echo $blotter;
            ?>
        </p>
    </div>
    </a>
    <a href="UserAcc">
     <div class="admin-home-box">
        <h2>
            No. of Registered Users
        </h2>
        <p>
            <?php
                echo $users;
            ?>
        </p>
    </div>
    </a>
    <a href="OffStaff">
    <div class="admin-home-box">
        <h2>
            No. of Active Officials
        </h2>
        <p>
           <?php
                echo $officials;
            ?>
        </p>
    </div>
    </a>
    <a href="DocReq">
    <div class="admin-home-box">
        <h2>
            No. Document Requests
        </h2>
        <p>

            <?php
                echo $docreq;
            ?>
        </p>
    </div>
    </a>
    <a href="Revenues">
      <div class="admin-home-box">
        <h2>
            Revenue
        </h2>
        <p>
            &#8369; 
             <?php
             if (isset($sum)) {
                echo $sum;
            }
            else {
                echo "0";
            }
            ?>
        </p>
    </div>
    </a>
    
    <div id="chartContainer" style="height: 200px; width: 39%; box-shadow: 0 5px 10px black; margin-left:20px; margin-top: 30px;border-radius: 20px;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


</div>
 <!--
<div class="query">
    <div class="asdfq">
        <h1>QUERY</h1>
    </div>
    <button>SEARCH</button>
   <label for="items"></label>
    <select id="items">
      <option value="volvo">List of Registered Voters</option>
      <option value="saab">List of Filed to Action Blotters</option>
      <option value="opel">List of Senior Citizen Registered in the Barangay</option>
      <option value="audi">List of Male Residents</option>
      <option value="audi">List of Female Residents</option>
    </select>
</div>
 <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Civil Status</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tfoot>
        </tbody>
        </table>
                </div>
            </div>
        </div>
        <div class="spacer">
            
        </div>

</div>
-->

<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<script src="Datatables/js/jquery.js"></script>
<script src="Datatables/js/jquery.dataTables.js"></script>
<script src="Datatables/js/bootstrap.js"></script>
<script src="Datatables/js/dataTables.bootstrap.js"></script>
<script src="Datatables/js/script.js"></script>