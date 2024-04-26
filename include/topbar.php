
<body style="background-color: #f5f5f5;">



    <div class="float-parent-element">
  <div class="float-child-element asdffd">
    <div class="red"> <img class="logoo3" src="image/logoo.png"><p>Barangay Ayos Lomboy</p></div>
  </div>
  <div class="float-child-element">
    <div class="yellow">
      <nav>
  <ul>
    <li><a href="#" onclick="Scrollh();return false;">Home</a></li>
    <li><a href="#" onclick="Scrolla();return false;">About Us</a></li>
    <li><a href="#" onclick="Scrolls();return false;">Services</a></li>
    <li> <a>More</a>
    <ul style="min-width:140x;transform: translateX(-23px);">
      <li><a class='ac' href="../public/news">News</a></li>
      <li><a class='ac' href="../public/events">Events</a></li>
       <?php 
          if (isset($_SESSION['ID'])) {
              echo "
      <li><a class='ac' href='../public/doctrack'>Requests</a></li>
      ";
          }
          ?>
    </ul>
    </li>
    <li><a><i class='bx bx-cog'></i></a>
      <ul>
       <!-- <li><a class="ac" href="#">Settings</a></li> -->
       <?php 
          if (isset($_SESSION['ID'])) {
            echo "<li><a class='ac' href='../public/AccSetting'>Setting</a></li>";
            echo "<li><a class='ac' href='../public/logout'>Log-Out</a></li>";
          }
          else {
            echo "<li><a class='ac' href='../public/login'>Log-In</a></li>";
            echo "<li><a class='ac' href='../public/register'>Sign-Up</a></li>";
          }
       ?>
        
      </ul>
    </li>
  </ul>
</nav>
</div>
</div>
</div>

