<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>AJAX PHP</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Days</th>
                                    <th>Date</th>
                                    <th>Complaint</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="studentdata">
                            <?php
                                include("db.php");
                                $q=mysqli_query($con,"SELECT * FROM complaints order by sno desc ");
                                $sno=0;
                                while($row=mysqli_fetch_array($q))
                                { 
                                    $sno++;
                                    $dept=$row['dept'];
                                    $send_by=$row['email'];
                                    //    $subdept=$row['subdept'];
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
                                
                                        // echo "<tr id='tdata'> <td>$sno</td><td>$send_by</td><td>$dept</td><td>$days</td><td>$date</td> <td><button type='button' onclick='view($sid)' class='btn btn-primary btn-md'   data-toggle='modal' data-target='#viewsModal'>View</button></td>  <td><button type='button' onclick='details($sid) class='btn btn-primary btn-md'  data-toggle='modal' data-target='#detailsModal''>Details</button></td>  <td><button type='button' style='width:80px;' onclick='status_msg($sid)'class='btn btn-primary btn-md'  data-toggle='modal' data-target='#status_mes_Modal'>$status</button></td></tr>";
                                        echo "<tr id='tdata'> <td>$sno</td><td>$send_by</td> <td>$dept</td> <td>$days</td><td>$date</td> <td><button type='button' onclick='view($sid)' class='btn btn-primary btn-md'   data-toggle='modal' id='viewsModal' >view</button></td>  <td><button type='button' onclick='details($sid)' class='btn btn-primary btn-md'  data-toggle='modal' data-target='#detailsModal'>details</button> </td>  <td><button type='button' style='width:100px;' onclick='status_mes($sid)' class='btn btn-primary btn-md'  data-toggle='modal' data-target='#status_mes_Modal'>$status</button></td></tr>";
                                }
							?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Open modal for @mdo</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
        </div>
    </div>
    </div> -->
    <div class="modal fade" id="viewsModal" role="dialog">
    <div class="modal-dialog" role="content">
        <div class="modal-content">
				<div id="views">

				</div> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function (){
            getdata();
        });
        function getdata()
            {
                $.ajax({
                    type: "method",
                    url: "display_notice.php",
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
    </script>
    <script type="text/javascript">
		function dept()
		{
			var problem_type=$('#problem_type').val();
			 datastring='problem_type='+problem_type;
			 $.ajax({
   	     		type:"POST",
   	     		url:"display_notice.php",
   	     		data:datastring,
   	     		beforeSend:function(){
   	     			$('#message').html("<p style='color:white;font-size:20px;'>processing...<p>");
   	     		},
   	     		success:function(data){
   	     			//alert(data);
   	     			if(data=="invalid")
   	     			{
   	     				$('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
   	     			}
   	     			else
   	     			{
   	     				//window.location="student.php";
   	     				$('#tabledata').html(data);
   	     			}
   	     		}
   	     	})	
		}
		function details(sno)
		{
			datastring='sno='+sno;
            $.ajax({
             type:"POST",
             url:"details.php",
             data:datastring,
             success:function(data){
              if(data=="invalid")
              {
                $('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
              }
              else
              {
                $('#detailss').html(data);
              }
            }
          })

		}
		function view(sno)
		{
			datastring='sno='+sno;
            $.ajax({
             type:"POST",
             url:"view.php",
             data:datastring,
             success:function(data){
              if(data=="invalid")
              {
                $('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
              }
              else
              {
                $('#views').html(data);
              }
            }
          })

		}
		function status(sno)
		{
			datastring='sno='+sno;
            $.ajax({
             type:"POST",
             url:"status.php",
             data:datastring,
             success:function(data){
              if(data=="invalid")
              {
                $('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
              }
              else
              {
                $('#statuss').html(data);
              }
            }
          })

		}
		function status_submit(sno){
		 var status_type=$('#status_type').val();
		 var status_msg=$('#status_msg').val();
		 datastring='sno='+sno+'&status_type='+status_type+'&status_msg='+status_msg;
		 $.ajax({
             type:"POST",
             url:"status_submit.php",
             data:datastring,
             success:function(data){
              if(data=="invalid")
              {
                $('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
              }
              else
              {
                $('#status_sub').html(data);
              }
            }
          })
		}
		function status_msg(sid)
		{   var datastring="sno="+sid;
			$.ajax({
				type:"POST",
				url:"status_msg.php",
				data:datastring,
				success:function(data)
				{ 
					$("#status_mess").html(data);

				}
			})
			
		}
	</script>
  </body>
</html>