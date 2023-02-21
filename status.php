<?php
        session_start();
        if(isset($_POST['sno']))
        { 
           include("db.php");
           $status_no=$_POST['sno'];
           $q1=mysqli_query($con,"SELECT * FROM complaints WHERE `sno`='$status_no'");
           $r1=mysqli_fetch_array($q1);
           $status_msg=$r1['status_msg'];
           $status=$r1['status'];
           $_SESSION['status_no']=$status_no;
           echo "  
            <div class='modal-header'>
              <h3 class='modal-title' id='status_mes_Modal' style='text-align:center; font-family:'Alata',sans-serif;'>Update Status</h3>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                   <select class='form' id='status_type' name='status_type'>";
                    if($status=='pending')
                    {
                    echo " <option selected>$status</option>
                     <option>Accepted</option>
                     <option>Rejected</option>
                     <option>Completed</option>";
                    }
                    else if($status=='Accepted')
                    {
                     echo "<option selected>$status</option>
                     <option>Completed</option>";
                    }
                    else if($status=='Rejected')
                    {
                      echo "<option>$status</option>";
                    }
                    else
                    {
                     echo "<option selected>$status</option>";
                    }
                   
                      echo "  </select>
                   </div>
                  </div>
                  <div class='row'>
                      <div class='msg'>
                        Status Message
                      </div>
                      <div>";
                      if($status=='Rejected' || $status=='Accepted')
                      {
                      echo "<textarea class='form'>$status_msg</textarea>";
                      }
                      else
                      {
                      echo "<textarea class='form'>$status_msg</textarea>";
                      }
                      
                    echo "  
                     </div>
                    </div>
                  </div>
                  <div class='modal-footer'>";
                    if($status=='Rejected'||$status=='Completed')
                    {
                      echo " <button type='button' class='btn btn-success' disabled onclick='status_submit($status_no)' data-bs-dismiss='modal' data-toggle='modal' data-target='#status_submit_Modal'>Submit</button>";
                    }
                    else
                    {
                      echo " <button type='button' class='btn btn-success' onclick='status_submit($status_no)' data-dismiss='modal' data-toggle='modal' data-target='#status_submit_Modal'>Submit</button>";
                    }
                   
                  echo "
                    
                  </div>";
                  
                }
?>

