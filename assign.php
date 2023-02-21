<?php
        session_start();
        include("db.php");
        if(isset($_POST['sno']))
        { 
           $sno=$_POST['sno'];
           $q=mysqli_query($con,"SELECT *FROM  complaints where `sno`='$sno' ");
           $p=mysqli_fetch_array($q);
            $dept=$p['dept'];
            echo "<div class='modal-header'>
            <h4 class='modal-title'>Work Assign</h4>
            <button role='button' class='close' data-dismiss='modal'>&times;</button>
            </div>
           <div class='modal-body'>
             <div class='container'>
             <div class='row mb-3'>
             <div class='col-5'>Assign Work</div>
             <div class='col-12 col-sm-7'>
                   <select class='form-select form-control' id='assign_sid' name='assign_sid'>
                    <option selected>Select Person</option>";
                
           $q1=mysqli_query($con,"SELECT faculty.name,departments.fkey FROM faculty INNER JOIN departments on faculty.sno=departments.fkey WHERE departments.head=0 and departments.department='$dept'" );
           while($p1=mysqli_fetch_array($q1))
           {
            $aname=$p1['name'];
            $sid=$p1['fkey'];
            echo " <option value='$sid'>$aname</option>";
           }
        echo " 
               </select>
               </div>
              </div>
           </div>
          </div>
          <div class='modal-footer'>
          <button type='button' class='btn btn-success' onclick='assign_submit($sno)' data-dismiss='modal' data-toggle='modal' data-target='#status_submit_Modal'>submit</button>
         </div>
           ";
        }
  ?>