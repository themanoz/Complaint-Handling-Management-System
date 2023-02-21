<?php
include("db.php");
session_start();
// if($_SESSION['type']=='Admin')
// { $type=$_SESSION['type'];
// ?>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="admin.css">
	<!-- CSS only -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


	<div class="container-fluid">
		<div class="row" id="head">
			<div class="col-12">
				<h1 style="font-family:'Alata',sans-serif;">Complaint Handling Management System</h1>
				<!-- <?php echo $name; ?> -->
				<p style="font-family:'Alata',sans-serif;">Welcome  &nbsp <a href="login-user.php">Logout</a></p>
				<!-- <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button> -->
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div></div>
			   	<div>
							<select id="problem_type" name="problem_type" onchange="dept()">
								<option selected>All</option>
									<?php
										include("db.php");
										$probs=mysqli_query($con,"SELECT distinct(`department`) FROM departments");
											while($r1=mysqli_fetch_array($probs))
											{  
												$prob=$r1['department'];
												echo "<option >$prob</option>";
											}												
									?>
							</select>		
				</div>
			<div class=col-sm-1></div>
		</div>
	</div>
			<div class="table-wrapper-scroll-y my-custom-scrollbar" id="tabled">
     			  <table class="table" id="tabledata">
						<thead>
							<tr id="thead">
								<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp S.no</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEmail</th><th> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDepartemnt</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Days</th> <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDate</th> <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComplaint</th><th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStatus</th>
							</tr>
						</thead>											
						<tbody>
							<?php
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
							
							
									echo "<tr id='tdata'> <td>$sno</td><td>$send_by</td> <td>$dept</td> <td>$days</td><td>$date</td> <td><button type='button' onclick='view($sid)'  data-toggle='modal' data-target='#viewsModal' style='height:35px; width: 80px; border-style:none; border-radius:5px; color:white; background-color:rgba(37,98,255,1);'>View</button><td><button type='button' style='height:35px; width: 80px; border-style:none; border-radius:5px; color:white; background-color:rgba(37,98,255,1); onclick='status($sid)'  data-toggle='modal' data-target='#ssModal'>$status</button></td></tr>";
			
							}
							?>
						</tbody>
     			    </table>	
			</div>	
			<div class="container">
				<div class="modal fade" id="viewsModal" role="dialog">
					<div class="modal-dialog">
					
					<!-- Modal content-->
					<div class="modal-content">
							<div id="views"></div>
					</div>
					
					</div>
				</div>
			</div>

			<div class="container">
				<div class="modal fade" id="ssModal" role="dialog">
					<div class="modal-dialog">
					
					<!-- Modal content-->
					<div class="modal-content">
							<div id="statuss"></div>
					</div>
					
					</div>
				</div>
			</div>
			<!-- Modal -->
			<!-- <div class="modal fade" id="status_mes_Modal" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
							<div id="statuss">
								
							</div>
					</div>		
				</div>
			</div> -->

			<!-- <div class="modal fade" id="status_submit_Modal" role="dialog">
				<div class="modal-dialog" role="content">
					<div class="modal-content">
							<div id="status_sub">

							</div>
						
					</div>
				</div>
						</div> -->
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
		<?php

// else
// {
// 	header("location:home.php");
// }
?>