<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
include '../include/db_conn.php';
unset($_SESSION['iss']);
?>
<script type="text/javascript">
    localStorage.removeItem("selectedtem")
    localStorage.removeItem("bt")
    localStorage.removeItem("loi")
    localStorage.removeItem("dof")
    localStorage.removeItem("poss")

</script>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            BARANGAY COMMITTEES PAGE
        </h1>
    </div>
    <div class="admin-home">	
     <div class="adddel" style="text-align: center;justify-content: center;">
<nav style="margin-top:30px;">
      <a class="comt" href="#" onclick="Function1();">Finance </a>|
      <a class="comt" href="#" onclick="Function2();">Land Tax </a>|
      <a class="comt" href="#" onclick="Function3();">Peace & Order </a>|
      <a class="comt" href="#" onclick="Function4();">Infrastructure </a>|
      <a class="comt" href="#" onclick="Function5();">Health </a>|
      <a class="comt" href="#" onclick="Function6();">Education </a>|
      <a class="comt" href="#" onclick="Function7();">Social Services </a>|
      <a class="comt" href="#" onclick="Function8();">Agriculture </a>|
      <a class="comt" href="#" onclick="Function9();">SK </a>

      </nav>
      </div> 

<div style="height: 20px;width: 100%;"></div>
<div id="Finance" style="width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Finance</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">    
       
        <button class="addd" onclick="document.location='OffStaffCommitteeAdd'" style="height:100%">ADD STAFF</button>

        </div>
      
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" name="example" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'Finance'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>

    <div id="LandTax" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Land Tax</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddL'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example1" name="example1" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'LandTax'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Peace" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Peace & Order</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddP'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example2" name="example2" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'PeaceAndOrder'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Infra" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Infrastructure</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddI'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example3" name="example3" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'Infrastructure'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Health" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Health</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddH'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example4" name="example4" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'Health'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Edu" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Education</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddE'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example5" name="exampl5" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'Education'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Social" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Social Services</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddS'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example6" name="example6" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'SocialServices'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="Agri" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Agriculture</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddA'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example7" name="example7" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'Agriculture'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
        </div>
    </div>
    <div id="SK" style="display:none;width: 100%;">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Sangguniang Kabataan</h1></section><br>
      <div style="text-align: right;width: 100%;height: 50px; margin-bottom: 20px;padding-right: 20px;">
        <button class="addd" onclick="document.location='OffStaffCommitteeAddSK'" style="height:100%">ADD STAFF</button>
        </div>
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example8" name="example8" class="table table-striped table-bordered" style="width:100%">
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
                    $sql = "SELECT * from officials WHERE committee = 'SK'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                            echo "<tr><td>". $row["name"] ."</td><td>". $row["position"] ."</td>
                            <td>". $row["status"] ."</td>
                                    <td>
                                        <form action='OffStaffCommitteemore' method='POST'>
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
</div>
<script type="text/javascript">
  function Function1() {
  var x = document.getElementById("Finance");
  var a = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
 
    if (x.style.display === "none") {
        x.style.display = "block";
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        e.style.display = "none";
        f.style.display = "none";
        g.style.display = "none";
        h.style.display = "none";
      } 
    
}
function Function2() {
  var a = document.getElementById("Finance");
  var x = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 

}
function Function3() {
  var a = document.getElementById("Finance");
  var b = document.getElementById("LandTax");
  var x = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function4() {
  var a = document.getElementById("Finance");
  var c = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var x = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function5() {
  var a = document.getElementById("Finance");
  var d = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var x = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function6() {
  var a = document.getElementById("Finance");
  var e = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var x = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function7() {
  var a = document.getElementById("Finance");
  var f = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var x = document.getElementById("Social");
  var g = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function8() {
  var a = document.getElementById("Finance");
  var g = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var x = document.getElementById("Agri");
  var h = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
function Function9() {
  var a = document.getElementById("Finance");
  var g = document.getElementById("LandTax");
  var b = document.getElementById("Peace");
  var c = document.getElementById("Infra");
  var d = document.getElementById("Health");
  var e = document.getElementById("Edu");
  var f = document.getElementById("Social");
  var h = document.getElementById("Agri");
  var x = document.getElementById("SK");
  if (x.style.display === "none") {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
    f.style.display = "none";
    g.style.display = "none";
    h.style.display = "none";
  } 
}
</script>
