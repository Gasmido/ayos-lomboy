<footer class="foot">
	<div class="conimg" style="border-top: 2px solid black">
		
		<div style="margin-top:30px;margin-bottom:40px;flex:3">
			<img width="180" height="180" src="image/logoo.png"><br>
		<h1>Barangay Ayos Lomboy</h1>
		<h3>Guimba, Nueva Ecija, Philippines</h3><br>
		<br>
		<?php if (isset($_SESSION['user_type'])) {
		    if ($_SESSION['user_type'] != "admin") { 
		    
		?>
		<p>Site Links:</p>
		<nav style="color:white;text-decoration:none">
			<a href="Homepage" style="color:lightblue;text-decoration: none;">Home </a>|
			<?php
			    if (!isset($_SESSION['ID'])) {
			        echo '<a href="login" style="color:lightblue;text-decoration: none;">Login </a>|
			<a href="register" style="color:lightblue;text-decoration: none;">Register </a>|';
			    }
			?>
			
			<a href="news" style="color:lightblue;text-decoration: none;">News </a>|
			<a href="events" style="color:lightblue;text-decoration: none;">Events </a>

		</nav>
        <?php 
		    }
		    }
		    else {
		        	?>
		<p>Site Links:</p>
		<nav style="color:white;text-decoration:none">
			<a href="Homepage" style="color:lightblue;text-decoration: none;">Home </a>|
            <a href="login" style="color:lightblue;text-decoration: none;">Login </a>|
			<a href="register" style="color:lightblue;text-decoration: none;">Register </a>|
			<a href="news" style="color:lightblue;text-decoration: none;">News </a>|
			<a href="events" style="color:lightblue;text-decoration: none;">Events </a>

		</nav>
        <?php 
		    }
        
        ?>
		</div>
		<div class="contactus">
		<h2>Our Contacts:</h2>
		<!--		<form>
				<label>Your Name:</label><br>
				<input type="text" name="name" placeholder="Your Name"> <br>
				<label>Your E-mail:</label><br>
				<input type="email" name="email" placeholder="Your E-mail"> <br>
				<label>Your Message:</label><br>
				<textarea name="message" placeholder="Your Message"></textarea>
				<section style="text-align: center;">
				<button name="submit" type="submit" class="btnlog">Submit</button>
				</section>
			</form>
			
	-->
        
        <p style="display:inline-block;font-weight:bold">Barangay Captain: </p><br>
        <i class='bx bxs-phone' style="display:inline-block"></i>
        <p style="display:inline-block">0929 233 3189</p><br><br><br> 
       
        <p style="display:inline-block;font-weight:bold">Barangay Secretary: </p><br>
         <i class='bx bxs-phone' style="display:inline-block"></i>
        <p style="display:inline-block">0947 292 5406</p><br><br><br>
        <p style="display:inline-block;font-weight:bold">Gmail: </p><br>
        <i class='bx bxs-envelope' style="display:inline-block"></i>
        <p style="display:inline-block">barangayayoslomboy@gmail.com</p><br><br><br> 
		</div>
		<div id="m" class="Map" style="margin-top:30px">
		<h2 style="margin-bottom: 30px;">How to Get There:</h2>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30728.7872056418!2d120.74988081179288!3d15.692927852037737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33912c5ab3e8dd89%3A0x3109bbaa68b7ceae!2sAyos%20Lomboy%2C%20Guimba%2C%20Nueva%20Ecija!5e0!3m2!1sen!2sph!4v1698208537197!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		
		</div>

	</div><hr>
	<section style="text-align:center;margin-top:10px;">
			<p style="font-size: 14px;">Copyright @ 2024 Barangay Ayos Lomboy</p>	
	<section style="text-align:left"> 
	<p style="font-size:14px;text-align:center;">Developed by: <a href="groupPage" style="text-decoration: none;color:lightblue;">JPCS Students Group5</a></p>
		</section>

</footer>

<script type="text/javascript" src="JS/jscode.js"></script>
</body>
</html>
