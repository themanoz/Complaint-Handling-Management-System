<?php
include("db.php");
session_start();
if($_SESSION['type']=='admin')
{ $name=$_SESSION['username'];
?>
<html>
<head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CHMS</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		body {
        background-image: url("bg1.jpg");
        background-repeat: no-repeat;
        background-size:cover;
        /* background-attachment: fixed; */
       }
		#head
    	{
    		border-bottom: 2px solid white;
        width:100%;
    	}
    	#head h1
    	{
    		color: #b30059;
    		text-align:center;
    		text-shadow:1px 1px  #ffccff;
    		padding-top:10px;
    	}
    	#head p
    	{
    		color:white;
    		text-align:center;
    	}
    	#head p a
    	{
    		color: #ffcc00;
    		text-align:right;
    		text-decoration: none;
    	}
    	select:hover,active{
    		border-color:orange;

    	}
    	option{
    		color:gray;
    	}
    	#thead
    	{
    		background-image: linear-gradient(to bottom, #dc9ef6, #bdb3ff, #a8c3ff, #a4d0f9, #b1d8ed);
    		border:2px solid   #ffe699;
    		color:#888844;
    		font-weight:bold;
    		font-size:20px;
    	}
    	#tdata
    	{
    		border:2px solid white;
    		background-color:   #ffffcc;
    	}
    	#pop{
    		background-color:   #ffffcc;
    	    }
	</style>
</head>
<body>
 <div class="container-fluid">
		<div class="row" id="head">
				<div class="col-12">
					<h1>Maintenance Cell Nuzvid</h1>
					<p>Welcome <?php echo $name; ?>&nbsp <a href="logout.php">Logout</a></p>
				</div>
		</div>
 </div>
 <div class="container-fluid">
		<div class="row">
				<div class=col-sm-9></div>
			   	<div class=col-sm-2>
					<div style="margin:10px">
							<div class="form-group">
								<select class="form-select form-control" aria-label="Default select example" id="problem_type" name="problem_type" style="width:300px" onchange="dept()">
									<option selected>All</option>
									<?php
											$probs=mysqli_query($con,"SELECT distinct(`department`) FROM departments");
												while($r1=mysqli_fetch_array($probs))
												{  
													$prob=$r1['department'];
													echo "<option >$prob</option>";
												}
									?>
								</select>
							</div>
						</div>
				   </div>
					<div class=col-sm-1></div>
		</div>
</div>
<div class="container-fluid">
   <div class="row"> 
	   <div class="col-12">
              <div class="table-responsive">
     			  <table class="table" id="tabledata">
						<tr id="thead">
							<td>S.no</td><td>Departemnt</td> <td>Sub Departemnt</td> <td>Days</td> <td>Date</td> <td>Complaint</td><td>Details</td><td>Status</td>
						</tr>
     	
						<?php
						$q=mysqli_query($con,"SELECT * FROM cmscomplaints order by sno desc ");
						$sno=0;
						while($row=mysqli_fetch_array($q))
						{  $sno++;
						   $dept=$row['dept'];
						   $send_by=$row['username'];
						   $subdept=$row['subdept'];
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
					
							echo "<tr id='tdata'> <td>$sno</td><td>$dept</td> <td>$subdept</td> <td>$days</td><td>$date</td> <td><button type='button' onclick='view($sid)' class='btn btn-primary btn-md'   data-toggle='modal' data-target='#viewsModal'>view</button></td>  <td><button type='button' onclick='details($sid)' class='btn btn-primary btn-md'  data-toggle='modal' data-target='#detailsModal'>details</button> </td>  <td><button type='button' style='width:100px;' onclick='status_mes($sid)' class='btn btn-primary btn-md'  data-toggle='modal' data-target='#status_mes_Modal'>$status</button></td></tr>";
						}
						?>

     			    </table>
                </div>
         </div>
	 </div>
 </div>

  <div class="modal fade" id="detailsModal" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <div class="modal-content">
				<div id="detailss">

				</div>
             
        </div>
    </div>
</div>

<div class="modal fade" id="viewsModal" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <div class="modal-content">
				<div id="views">

				</div>
             
        </div>
    </div>
</div>

<div class="modal fade" id="statusModal" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <div class="modal-content">
				<div id="statuss">

				</div>
             
        </div>
    </div>
</div>
<div class="modal fade" id="status_submit_Modal" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <div class="modal-content">
				<div id="status_sub">

				</div>
             
        </div>
    </div>
</div>
<div class="modal fade" id="status_mes_Modal" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <div class="modal-content">
				<div id="status_mess">
					

				</div>
             
          </div>
       </div>
   </div>
<script src="popper.min.js"></script>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
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
		 var status_mes=$('#status_mes').val();
		 datastring='sno='+sno+'&status_type='+status_type+'&status_mes='+status_mes;
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
		function status_mes(sid)
		{   var datastring="sno="+sid;
			$.ajax({
				type:"POST",
				url:"status_mes.php",
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
<?php
}
else
{
	header("location:index.php");
}
?>