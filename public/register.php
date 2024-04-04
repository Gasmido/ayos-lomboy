<?php
unset($_SESSION['otp']);

session_start();

    if (isset($_SESSION['ID'])) {
        header("Location: Homepage.php");
        exit();
    }
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
        localStorage.removeItem("txt5")
		localStorage.removeItem("txt6")
		localStorage.removeItem("txt00")
	</script>
	</head>	
	<body class="signbod">
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
		<div class="signmain" style="padding-bottom: 50px;"">
			<div class="signin">
				<div style="width: 100%; flex-basis:100% ;">
					<h1 class="ttle">REGISTER</h1>
					<p style="color:gray; ">(Only barangay residents can use system's services)</p>
				</div>
				<div class="loginspace">
							<?php
								if (isset($_GET["error"])) {
									if ($_GET["error"] == "Empty_input") {
										echo "<p class='example'>Fill in all required fields!</p>";
									}
									else if ($_GET["error"] == "Invalid_E-mail") {
										echo "<p class='example'>Invalid E-mail</p>";
									}
									else if ($_GET["error"] == "Password_not_identical") {
										echo "<p class='example'>Password doesn't match!</p>";
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
									else if ($_GET["error"] == "First_too_long") {
										echo "<p class='example'>First name is too long!</p>";
									}
									else if ($_GET["error"] == "Last_too_long") {
										echo "<p class='example'>Last name is too long!</p>";
									}
									else if ($_GET["error"] == "Middle_too_long") {
										echo "<p class='example'>Middle initial is too long!</p>";
									}
									else if ($_GET["error"] == "Extension_too_long") {
										echo "<p class='example'>Extension name is too long!</p>";
									}
									else if ($_GET["error"] == "Email_alreadytaken") {
										echo "<p class='example'>Email already in use!</p>";
									}
									else if ($_GET["error"] == "Name_alreadytaken") {
										echo "<p class='example'>Name already registered!</p>";
									}
									else if ($_GET["error"] == "stmtfailed") {
										echo "<p class='example'>Something went wrong, try again!</p>";
									}
									else if ($_GET["error"] == "none") {
										echo "<p class='example'>Sign-up successful!</p>";
									}
								}
							?>
				</div>
			
				<div class="inputsr">
					<div class="inn">
					<form action="sign_process.php" method="post">
					<p>Email:</p>
						<input id ="txt1" type="text" name="user" onkeyup="saveValue(this);" placeholder="Enter your email" maxlength="50"></input>
					<p>Password:</p>
						<input id="txt2" type="password" name="pass" onkeyup="saveValue(this);" placeholder="Enter your password" maxlength="60"></input>
						<p>Birth Date:</p>
						<input id="txt3" type="date" name="birthdate" onkeyup="saveValue(this);" max="<?php echo date("Y-m-d"); ?>" min="1934-12-31"></input>
					<p>Purok:</p>
                <select name="purok">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
                <p>Sex:</p>
						<select name="sex">
                  <option>Male</option>
                  <option>Female</option>
                </select>
					</div>
					<div class="inn">
						<p>Last Name:</p>
						<input minlength="2" maxlength="80" id ="txt4" type="text" name="lastname" pattern="[A-Za-z ]{1,32}" title="e.g. Dela Cruz" onkeyup="saveValue(this);" placeholder="Enter your last name"></input>
						<p>First Name:</p>
						<input minlength="2" maxlength="80" id ="txt7" type="text" name="firstname" pattern="[A-Za-z ]{1,32}" title="e.g. Christian Jao" onkeyup="saveValue(this);" placeholder="Enter your first name"></input>
						<p>Middle Initial: (optional)</p>
						<input id ="txt8" maxlength="6" type="text" name="middleinitial" pattern="[A-Za-z .]{1,10}" title="e.g. A." onkeyup="saveValue(this);" placeholder="Enter your middile initial"></input>
						<p>Extension Name: (optional)</p>
						<input id ="txt9" maxlength="20" type="text" name="extensionname" pattern="[A-Za-z .]{1,32}" title="e.g. Jr." onkeyup="saveValue(this);" placeholder="Enter your extension name"></input>
						 <p>Citizenship:</p>
						<select name="citizenship">
                  <option>Natural-Born-Citizen</option>
                  <option>Naturalized-Citizen</option>
                </select>
					</div>
				</div>
				<section class="loginbtn">
					<button class="btnlog" type="submit" name="submit">REGISTER</button>
				</section>

				<br />
					<p style="text-align: center;color: #C7DAD4;">Already have an account? <a href="login.php" style="color:#00FFFF">Sign-in</a></p>
					
					</form>
				</div>
			

			</div>
	
  <script type="text/javascript">
        document.getElementById("txt1").value = getSavedValue("txt1");     
				document.getElementById("txt2").value = getSavedValue("txt2");
				document.getElementById("txt3").value = getSavedValue("txt3");
				document.getElementById("txt4").value = getSavedValue("txt4");
				document.getElementById("txt7").value = getSavedValue("txt7");
				document.getElementById("txt8").value = getSavedValue("txt8");
				document.getElementById("txt9").value = getSavedValue("txt9");

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