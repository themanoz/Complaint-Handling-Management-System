<?php
        session_start();
        include("db.php");
        if(isset($_POST['sno']))
        { 
           $sno=$_POST['sno'];
           $q=mysqli_query($con,"SELECT * FROM complaints where `sno`='$sno' ");
           $p=mysqli_fetch_array($q);
            $title=$p['title'];
            $desc=$p['description'];
            echo "<div class='modal-header'>
                    <h3 class='modal-title'><center><b>View Complaint</b></center></h3>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <div class='modal-body'>
                    <div class='container'>
                        <div class='row mb-3'>
                          <div class='col-3'><h4><b style='font-family:'Lucida Console', 'Courier New', monospace;'>Tilte</b></h4></div>
                          <div class='col-5'>$title</div>
                        </div>
                        <div class='row mb-3'>
                          <div class='col-3'><h4><b style='font-family:'Lucida Console', 'Courier New', monospace;'>Description</b></h4></div>
                          <div class='col-5'>$desc</div>
                        </div>
                      </div>
                  </div>";
          }
  ?>