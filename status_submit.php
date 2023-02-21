<?php
        session_start();
        include("db.php");
        if(isset($_POST['sno']))
        { 
           $sno=$_POST['sno'];
           $status_type=$_POST['status_type'];
           $status_msg=$_POST['status_msg'];
           $q=mysqli_query($con,"UPDATE complaints SET `status`='$status_type',`status_msg`='$status_msg' where `sno`='$sno' ");
           if($q)
           {
               echo "
               <div class='modal-header'>
					<h4 class='modal-title' style='color:green;'>Successfully updated</h4>
                    <button role='button' class='close' data-dismiss='modal'>&times;</button>
				</div>";

            
           }
           else
           {
            echo "<div class='modal-header'>
            <h4 class='modal-title' style='color:green;'>Something went wrong!</h4>
            <button role='button' class='close' data-dismiss='modal'>&times;</button>
            </div>";
           }
        }
  ?>
