<?php
session_start();
if (isset($_SESSION['ID'])) {
        header("Location: Homepage");
        exit();
    }

if (isset($_SESSION['otps'])) {

$csstime = date ("Y-m-d\TH-i", filemtime($_SERVER["DOCUMENT_ROOT"] . '/CSS/style.css'));
?>

<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css<?='?'.$csstime ?>">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     

<!--	<script type="text/javascript">
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
-->
   </head>
<body class="loginbod">
<div class="float-parent-element">
  <div class="float-child-element">
    <div class="red"><img class="logoo3" src="image/logoo.png">Barangay Ayos Lomboy</div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
         <nav>
  <ul>
      <li><a class="ac" href="login">Back to Login</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="loginmain">
  <div class="login">
  <div>
<h1 class="ttle">Login Verification</h1>
</div>
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "Empty_input") {
			echo "<p class='example'>Fill in Fields!</p>";
		}
     elseif ($_GET["error"] == "acc") {
      echo "<p class='example'>Our system detected unusual login!</p>";
      echo "<p class='example'>Please verify yourself by entering OTP</p>";
    }
    elseif ($_GET["error"] == "Empty_input") {
      echo "<p class='example'>Fill in Fields!</p>";
    }
    else if ($_GET["error"] == "wrong_input") {
      echo "<p class='example'>Wrong OTP!</p>";
    }
		
	/*	else if ($_GET["error"] == "none") {
			echo "<p style='color:white; background: #8b0f0f;padding:5px;border-style:solid;border-width:2px;border-color:rgba(253, 114, 146, 1);'>Log-in successful!</p>";
		} */
	}
?>
<form action="loginWeb2.php" method="POST">
<div class="inputs">
  
  <p>Enter OTP:</p>
  <input class="inppp" id="txt000" type="number" name="otp" onkeyup="saveValue(this);" placeholder="Check your email for the OTP" maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="text-align:center;font-size:24px"></input>
  <input type="text" name="send" value="<?php echo $_SESSION['otps']; ?>" hidden>
  </div>
  <section class="loginbtn">
				<button class="btnlog" type="submit" name="submitv" >SUBMIT</button>

		</section>
		<br>
  </form>
  </div>
  </div>
  <script type="text/javascript">
                const input = document.getElementById("txt1");
                input.addEventListener("keyup", () => {
                  input.value = input.value.replace(/ +/g, "");
                });

    </script>
   <script type="text/javascript">
        document.getElementById("txt1").value = getSavedValue("txt1"); 
		
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
</body>
</html>
<?php
} else {
  header("location: login");
}
?>