<?php
        session_start();
        include("db.php");
        // if(isset($_POST['sno']))
        if(isset($_POST['sno']) && isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['email']) && isset($_POST['password']))
        { 
           $sno=$_POST['sno'];
           $q=mysqli_query($con,"SELECT `email` FROM complaints where `sno`='$sno' ");
           $p1=mysqli_fetch_array($q);
           $u=$p1['email'];
           $sid=mysqli_query($con,"SELECT * FROM faculty where `email`='$u'");
           $p=mysqli_fetch_array($sid);
           $name=$p['name'];
           $dept=$p['department'];
           $phno=$p['phno'];
           $email=$p['email'];
           echo "<div class='modal-header'>
           <h4 class='modal-title'>Details</h4>
           <button role='button' class='close' data-dismiss='modal'>&times;</button>
           </div>
          <div class='modal-body'>
            <div class='container'>
            <div class='row mb-3'>
            <div class='col-5'>Name</div>
            <div class='col-7'>$name</div>
            </div>
            <div class='row mb-3'>
            <div class='col-5'>Department</div>
            <div class='col-7'>$dept</div>
            </div>
            <div class='row mb-3'>
            <div class='col-5'>Phone Number</div>
            <div class='col-7'>$phno</div>
            </div>
            <div class='row mb-3'>
            <div class='col-5'>Email</div>
            <div class='col-7'>$email</div>
            </div>
           </div>
          </div>";
        }
  ?>

  
