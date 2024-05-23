<?php
session_start();
if (isset($_SESSION['ID']) || !isset($_SESSION['uuusss'])) {
        header("Location: Homepage");
        exit();
    }
$sdf = $_SESSION['emais'];

?>

<!DOCTYPE html>
<html lang="en" oncopy="return false;" oncontextmenu="return myRightClick();" oncut="return false;" onpaste="return false;">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript">
     localStorage.removeItem("txt1")
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
  <div class="float-child-element">
    <div class="red">Barangay Ayos Lomboy</div>
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
<h1 class="ttle">Password Reset</h1>
</div>
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "Empty_input") {
			echo "<p class='example'>Fill in Fields!</p>";
		}
		else if ($_GET["error"] == "Password_too_short") {
      echo "<p class='example'>Password length shouldn't be less than 6</p>";
    }
    else if ($_GET["error"] == "Password_too_long") {
      echo "<p class='example'>Password length shouldn't be more than 16</p>";
    }
    else if ($_GET["error"] == "Password_strength") {
        echo "<p class='example'>Password should contain numbers</p>";
    }
     else if ($_GET["error"] == "change") {
        echo "<p class='example2'>Please enter new password.</p>";
    }
		
	/*	else if ($_GET["error"] == "none") {
			echo "<p style='color:white; background: #8b0f0f;padding:5px;border-style:solid;border-width:2px;border-color:rgba(253, 114, 146, 1);'>Log-in successful!</p>";
		} */
	}
?>

<div class="inputs">
  <form action="loginforgot2" method="post">
  <label>Password:</label><br>
  <input id ="txt111" type="text" name="userss" onkeyup="saveValue(this);" placeholder="Enter your new Password" maxlength="50"></input><br>
  <input type="text" name="emails" value="<?= $sdf ?>" hidden>
  </div>
  <section class="loginbtn">
				<button class="btnlog" type="submit" name="submitss" >SUBMIT</button>

		</section>
		<br />
  </form>
  </div>
  </div>
  <script type="text/javascript">
                const input = document.getElementById("txt111");
                input.addEventListener("keyup", () => {
                  input.value = input.value.replace(/ +/g, "");
                });

    </script>
   <script type="text/javascript">
        document.getElementById("txt111").value = getSavedValue("txt111"); 
		
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
