<?php
session_start();
if (isset($_SESSION['otp'])) {


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
      <li><a class="ac" href="../public/register.php">Back to Register</a></li>
   
  </ul>
</nav>
    </div>
  </div>
</div>
<div class="loginmain">
  <div class="login">
  <div>
<h1 class="ttle">Email Verification</h1>
</div>
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"] == "wrong_input") {
			echo "<p class='example'>Wrong OTP!</p>";
		}
		else if ($_GET["error"] == "empty_input") {
			echo "<p class='example'>Please Enter OTP!</p>";
		}
		
	/*	else if ($_GET["error"] == "none") {
			echo "<p style='color:white; background: #8b0f0f;padding:5px;border-style:solid;border-width:2px;border-color:rgba(253, 114, 146, 1);'>Log-in successful!</p>";
		} */
	}
?>

<div class="inputs">
  <form action="register3.php" method="post">
  <p>Enter OTP:</p>
  <input class="inppp" id="txt00" type="number" name="otp" onkeyup="saveValue(this);" placeholder="We have send an OTP to your email" maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></input>
  <input type="text" name="send" value="<?php echo $_SESSION['otp']; ?>" hidden>
  </div>
  <section class="loginbtn">
				<button class="btnlog" type="submit" name="submitv" >VERIFY</button>

		</section>
		<br />
  </form>
  </div>
  </div>
   <script type="text/javascript">
        document.getElementById("txt00").value = getSavedValue("txt00"); 
		
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
  header("location: register.php");
}
?>