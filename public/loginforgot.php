<?php
if (isset($_SESSION['ID'])) {
        header("Location: Homepage");
        exit();
    }


?>

<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/style.css">   
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
      <li><a class="ac" href="../public/login">Back to Login</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="loginmain">
  <div class="login">
  <div>
<h1 class="ttle">Password Reset</h1>
</div>
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "Empty_input") {
			echo "<p class='example'>Fill in Fields!</p>";
		}
		else if ($_GET["error"] == "Invalid_E-mail") {
			echo "<p class='example'>Invalid E-mail!</p>";
		}
    else if ($_GET["error"] == "noE-mail") {
      echo "<p class='example'>User does not exists!</p>";
    }
    else if ($_GET["error"] == "wrongf") {
      echo "<p class='example'>Please verify reCAPTCHA!</p>";
    }
    else if ($_GET["error"] == "wrong") {
      echo "<p class='example'>reCAPTCHA verification failed!</p>";
    }
		
	/*	else if ($_GET["error"] == "none") {
			echo "<p style='color:white; background: #8b0f0f;padding:5px;border-style:solid;border-width:2px;border-color:rgba(253, 114, 146, 1);'>Log-in successful!</p>";
		} */
	}
?>
<form action="loginforgot2" method="POST">
<div class="inputs">
  
  <label>Email:</label><br>
  <input id ="txt1" type="text" name="user" onkeyup="saveValue(this);" placeholder="Enter your email" maxlength="50"></input><br>
  </div>
    <div class="form-input" style="text-align:center;">
        <!-- Google reCAPTCHA box -->
        <div class="g-recaptcha" data-sitekey="6LdC5r4pAAAAAPW8GIo3MuebpQWE9RDrxO7jg-Ua" style="display: inline-block;margin-top: 20px;"></div>
    </div>
  <section class="loginbtn">
				<button class="btnlog" type="submit" name="submitv" >SUBMIT</button>

		</section>
		<br>
  </form>
  </div>
  </div>
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
