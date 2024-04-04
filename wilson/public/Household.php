<?php
include '../include/headAdmin.php';
include '../include/topbarAdmin.php';
include '../include/sidebar.php';
?>
<div class="home-section">
<div class="admin-home-title">
        <h1>
            HOUSEHOLD PAGE
        </h1>
    </div>
 <div class="admin-home">   
    <div class="adddel">
    <button id="myBtn2" class="addd">ADD NEW HOUSEHOLD</button> 
      </div>     

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="closer">&times;</span>
    <h2>Add New Household</h2>

    <div class="modal-inside">
        <div class="models">
           
            <div class="inputpop">            
                <label>Full Name:</label><br>
                <input class="inpu" type="text" name="name" placeholder="Enter Fullname"><br>
                <label>Chairmansip:</label><br>
                <input class="inpu" type="text" name="chairmansip" placeholder="Enter Chairmanship"><br>
                <label>Position:</label><br>
                <input class="inpu" type="text" name="position" placeholder="Enter Position"><br>
                <label>Term Start:</label><br>
                <input class="inpu" type="date" name="tstart" placeholder="Enter Date"><br>
                <label>Term End:</label><br>
                <input class="inpu" type="date" name="tend" placeholder="Enter Date"><br>
                <label>Status:</label><br>
                <input class="inpu" type="text" name="status" placeholder="Enter Status"><br> 
            </div>

               
        </div>  

         <button class="btndocu wer">Submit</button>    
    </div>
  </div>
</div>


        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
             <thead>
                <tr>
                    <th>Household No.</th>
                    <th>Full Address</th>
                    <th>No. of Inhabitants</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>234-23423</td>
                    <td>2323,fwe st.,purok 2, Guimba</td>
                    <td>2</td>
                    <td>
                        <button class="editt">EDIT</button>
                        <button class="moree">MORE</button>
                         <button class="dell">DELETE</button>
                    </td>
                </tr>
               <tr>
                    <td>53452</td>
                    <td>2323,fwe st.,purok 2, Guimb</td>
                    <td>3</td>
                   <td>
                        <button class="editt">EDIT</button>
                        <button class="moree">MORE</button>
                         <button class="dell">DELETE</button>
                    </td>
                </tr>
                <tr>
                    <td>123443</td>
                    <td>2323,fwe st.,purok 2, Guimb</td>
                    <td>4</td>
                   <td>
                        <button class="editt">EDIT</button>
                        <button class="moree">MORE</button>
                         <button class="dell">DELETE</button>
                    </td>
                </tr><tr>
                    <td>234122134</td>
                    <td>2323,fwe st.,purok 2, Guimb</td>
                    <td>5</td>
                   <td>
                        <button class="editt">EDIT</button>
                        <button class="moree">MORE</button>
                         <button class="dell">DELETE</button>
                    </td>
                </tr>
            </tfoot>
        </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closer")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="../DataTables/js/jquery.js"></script>
<script src="../DataTables/js/jquery.dataTables.js"></script>
<script src="../DataTables/js/bootstrap.js"></script>
<script src="../DataTables/js/dataTables.bootstrap.js"></script>
<script src="../DataTables/js/script.js"></script>