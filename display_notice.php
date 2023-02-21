<table class="table" id="tabledata">
               <tr id="thead" style="th,td{ padding:10px;}">
						   	<th>S.no</th><th>Email</th><th>Departemnt</th><th>Days</th> <th>Date</th> <th>Complaint</th><th>Status</th>
					   	</tr>
<?php
if(isset($_POST['problem_type']))
{
      include("db.php");
      $problem_type=$_POST['problem_type'];
      if($problem_type=='All')
      {
      $q=mysqli_query($con,"SELECT * FROM  complaints order by sno desc");
      }
      else
      {
      $q=mysqli_query($con,"SELECT * FROM  complaints where `dept`='$problem_type' order by sno desc ");
      } 
      $sno=0;
      while($row=mysqli_fetch_array($q))
      {   $sno++;
            $dept=$row['dept'];
            $send_by=$row['email'];
            // $subdept=$row['subdept'];
            $sid=$row['sno'];
            $status=$row['status'];
              $d2=date('Y-m-j');
            $date=$row['date'];
            $d1=$row['date'];
            $date1=date_create($d1);
            $date2=date_create($d2);
            $dayc=date_diff($date1,$date2);
            $days=$dayc->format("%a");
            if($days==0)
            {
              $days="Today";
            }
            else if($days==1)
            {
            $days="$days day";
            }
            else
            {
              $days="$days days";
            }

            echo "<tr id='tdata'> <td>$sno</td><td>$send_by</td><td>$dept</td><td>$days</td><td>$date</td> <td><button type='button' onclick='view($sid)' class='btn btn-primary btn-md'    data-toggle='modal' data-target='#viewsModal' >View</button></td>   <td><button type='button' style='width:100px;' onclick='status($sid)' class='btn btn-primary btn-md'  data-toggle='modal' data-target='#statusModal'>$status</button></td></tr>";
      }

				echo"<div class='modal fade' id='viewsModal' role='dialog'>
					<div class='modal-dialog'>
					
					<!-- Modal content-->
					<div class='modal-content'>
							<div id='views'></div>
					</div>
					
					</div>
				</div>
			</div>";
  }

 else
 {
   header("location:admin.php");
 }
?>
</table>