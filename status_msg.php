<?php
         session_start();
        include("db.php");
        if(isset($_POST['sno']))
        { 
           $sno=$_POST['sno'];
           $q=mysqli_query($con,"SELECT * FROM complaints WHERE `sno`='$sno'");
           $r=mysqli_fetch_array($q);
           $status=$r['status'];
           $status_msg=$r['status_msg'];
           echo "
           <div class='modal-header'>
           <button type='button' class='close' data-dismiss='modal'>&times;</button>
           </div>
           <div class='modal-body'>
            <div class='container'>
            <div class='row mb-3'>
               <div class='col-5'>Status</div>
               <div class='col-7'>$status</div>
            </div>
            <div class='row mb-3'>
               <div class='col-5'>Message</div>
               <div class='col-7'>$status_msg</div>
            </div>
         </div>
           </div>";
        }
  ?>