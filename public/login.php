<?php
    require_once 'GoogleAPI/vendor/autoload.php';
    require_once "config.php";

    session_start();

    if (isset($_SESSION['ID'])) {
        header("Location: Homepage.php");
        exit();
    }
    else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <script type="text/javascript">
        localStorage.removeItem("txt1")
		localStorage.removeItem("txt3")
		localStorage.removeItem("txt2")
    localStorage.removeItem("txt4")
    localStorage.removeItem("txt7")
    localStorage.removeItem("txt8")
    localStorage.removeItem("txt9")
</script>
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element asdffd">
    
    <div class="red"> <img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="../public/Homepage.php">Back to Home</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="loginmain">
  <div class="login">
  <div>
<h1 class="ttle">LOGIN</h1>
</div>
<div class="loginspace">
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "Empty_input") {
			echo "<p class='example'>Fill in all fields!</p>";
		}
		else if ($_GET["error"] == "User_not_found") {
			echo "<p class='example'>Wrong e-mail or password!</p>";
		}
    else if ($_GET["error"] == "Success") {
      echo "<p id='ha' class='example2'>Registered Successfully!</p>";
    }
		
	/*	else if ($_GET["error"] == "none") {
			echo "<p style='color:white; background: #8b0f0f;padding:5px;border-style:solid;border-width:2px;border-color:rgba(253, 114, 146, 1);'>Log-in successful!</p>";
		} */
	}
?>
</div>
<div class="inputs">
  <form action="login_process.php" method="post">
  <p>E-mail:</p>
  <input id="txt5" type="text" name="user1" onkeyup="saveValue(this);" placeholder="Enter E-mail"></input>
   <p>Password:</p>
  <input id="txt6" type="password" name="pass" onkeyup="saveValue(this);" maxlength="60" placeholder="Enter password"></input>
  </div>
  <section class="loginbtn">
				<button class="btnlog" type="submit" name="submit">LOGIN</button>

		</section>
		<br />
		<p style="text-align: center;color:#C7DAD4;">Don't have an account? <a href="register.php" style="color:#00FFFF">Sign-up</a></p>
  </form>
   
      
    <!--      <div style="width: 100%; height: 16px; border-bottom: 1px solid grey; text-align: center; margin-top: 10px;">
  <span style="font-size: 20px; padding: 0px 10px; color: grey;background-color: #2F414F;">
    O
  </span>
</div>

 <section style="text-align:center;margin-top: 10px;">
    <?php
   //  echo "<a href='".$client->createAuthUrl()."'>";
     ?>
        <input type="submit" name="google" value="Login with Google" class=btnlog2>
        </a>
    </section>
    -->
  </div>
  </div>
   <script type="text/javascript">
        document.getElementById("txt5").value = getSavedValue("txt5"); 
        document.getElementById("txt6").value = getSavedValue("txt6");  
		
        function saveValue(e){
            var id = e.id;  
            var val = e.value; 
            localStorage.setItem(id, val);
        }

        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
        }
</script>
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
</body>
</html>
<?php
}
?>