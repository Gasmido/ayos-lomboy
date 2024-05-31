<?php
include 'db_conn.php';
if (isset($_SESSION['ID'])) {
if ($purokss == "" && $ciiit == "") {
	header("Location: GoogleAccSettings");
	exit();
}
}
$csstime = date ("Y-m-d\TH-i", filemtime($_SERVER["DOCUMENT_ROOT"] . '/CSS/style.css'));





?>
<!DOCTYPE html>
<!--oncontextmenu="return myRightClick();"
-->

<html lang="en" oncopy="return false;" oncut="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css<?='?'.$csstime ?>">   
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
<body>
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="Homepage">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="homepage">
	
	<div id="s" class="Committee">
		<div class="servtitle asdfff">
			<nav style="margin-top:30px">
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

		<div id="Finance">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Finance</h1></section><br>
      <div class="committeecontent">
			  <?php
$sql = "SELECT * from officials WHERE committee = 'Finance' AND position = 'Chairperson' OR committee = 'Finance' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
		</div>
  </div>
    <div id="LandTax" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Land Tax</h1></section><br>
      <div class="committeecontent">
        <?php
$sql = "SELECT * from officials WHERE committee = 'LandTax' AND position = 'Chairperson' OR committee = 'LandTax' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
    </div>
  </div>
    <div id="Peace" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Peace And Order</h1></section><br>
      <div class="committeecontent">
        <?php
$sql = "SELECT * from officials WHERE committee = 'PeaceAndOrder' AND position = 'Chairperson' OR committee = 'PeaceAndOrder' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }

      
        ?>
      </div>
      
    </div>
    <div id="Infra" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Infrastructure</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'Infrastructure' AND position = 'Chairperson' OR committee = 'Infrastructure' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
      </div>
    </div>
    <div id="Health" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Health</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'Health' AND position = 'Chairperson' OR committee = 'Health' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
      </div>
      <div class="committeecontent">
        <?php
$sql = "SELECT * from officials WHERE committee = 'Health' AND position = 'BHW'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
        
      </div>
    </div>
    <div id="Edu" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Education</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'Education' AND position = 'Chairperson' OR committee = 'Education' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
      </div>
    </div>
    <div id="Social" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Social Services</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'SocialServices' AND position = 'Chairperson' OR committee = 'SocialServices' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
      </div>
    </div>
    <div id="Agri" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Agriculture</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'Agriculture' AND position = 'Chairperson' OR committee = 'Agriculture' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
      </div>
    </div>
	
      <div id="SK" style="display:none">
      <section style="text-align:center;margin-top: 15px;font-size: 40px;"><h1>Sangguniang Kabataan</h1></section><br>
      <div class="committeecontent">
          <?php
$sql = "SELECT * from officials WHERE committee = 'SK' AND position = 'Chairperson' OR committee = 'SK' AND position = 'Co-Chairperson'";
                    $result = $connn-> query($sql);

                    if ($result-> num_rows > 0) {
                        while ($row = $result-> fetch_assoc()) {
                          echo '
                          <div class="gallery" style="border: none;background-color: #f5f5f5;">
                              <img src="image/'. $row["image"] .'" alt="picture" width="350" height="600" style="border-radius: 50%; display: block;margin-left: auto;margin-right: auto;">
                            <div class="desc">
                              <h3>'. $row["name"] .'</h3>
                              <p>'. $row["position"] .'</p>
                             
                            </div>
                          </div>
                          ';
                        }
                      }
        ?>
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
<?php
include 'footer.php';
?>