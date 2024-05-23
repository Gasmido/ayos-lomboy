<div class="sidebar">
		<div class="logo-details">
			<span>
			
			</span>
		</div>
		<ul class="nav-links">
        <li>
          <a href="home-section">
            <i class='bx bxs-home'></i>
            <span class="links_name">&nbsp;Home</span>
          </a>
        </li>
        <li>
            
            <!--
          <a href="OffStaff">
            <i class='bx bxs-briefcase'></i>
            <span class="links_name">&nbsp;Officials</span>
          </a>
          -->
          
          <a class="dropdown-btn" href="#">
              <i class='bx bxs-briefcase'></i>
              &nbsp;Officials&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <i id="uprow" class='bx bxs-up-arrow' style="display:none;"></i>
              <i id="downrow" class='bx bxs-down-arrow'></i>
          </a>
          
           </li>
          <div id="asdfs" class="dropdown-container">
            <a href="OffStaff">Barangay Officials</a>
            <a href="OffStaffCommittee">Barangay Commitees</a>
          </div>
       
		 <li>
          <a href="ResidentRecord">
           <i class='bx bx-body'></i>
            <span class="links_name">&nbsp;Residents Record</span>
          </a>
        </li>
       <li>
          <a href="Announcements">
            <i class='bx bxs-building-house' ></i>
            <span class="links_name">&nbsp;Announcements</span>
          </a>
        </li>
        <li>
          <a href="Household">
           <i class='bx bx-building-house'></i>
            <span class="links_name">&nbsp;Household</span>
          </a>
        </li>
         <li>
          <a href="Blotter">
            <i class='bx bxs-polygon'></i>
            <span class="links_name">&nbsp;Blotter Records</span>
          </a>
        </li>
         <li>
          <a href="DocReq">
            <i class='bx bxs-receipt'></i>
            <span class="links_name">&nbsp;Documents Requests</span>
          </a>
        </li>
         <li>
          <a href="Revenues">
            <i class='bx bxs-bank'></i>
            <span class="links_name">&nbsp;Revenues Record</span>
          </a>
        </li>
        <li>
          <a href="UserAcc">
            <i class='bx bxs-user-account'></i>
            <span class="links_name">&nbsp;User Accounts</span>
          </a>
        </li>
      </ul>
	</div>
	<script>
	    var dropdown = document.getElementsByClassName("dropdown-btn");
	    var arrow = document.getElementById("downrow");
	    var arrows = document.getElementById("uprow");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("actives");
    var dropdownContent = document.getElementById("asdfs");
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      arrow.style.display = "block";
      arrows.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
      arrow.style.display = "none";
      arrows.style.display = "block";
    }
  });
}
	</script>