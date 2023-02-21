<?php
include("db.php");
session_start();
global $email;
if(!isset($email)){
	// $email= $_POST['email'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
	
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap" rel="stylesheet">
	<title>CHMS</title>
    <link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1./css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="head">
		<h2>CHMS</h2>
		<p>Welcome &nbsp <a href="logout.php">Logout</a> </p>
	</div>
	<div class="container">
		<div class="row" id="contain">
			<div  class="col-sm-4" >
				<div id="fm">
					<h4>POST A COMPLAINT</h4>
					<div class="form-group">
						<!-- <label for="exampleInputEmail1">Select Department</label> -->
						<select id="problem_type" name="problem_type" onchange="depts()">
						<option selected class="dropdown" >Select Department</option>
						<!-- <option>IT infra</option> -->
						<?php
							include("db.php");
							$dept=mysqli_query($con,"SELECT distinct(`department`) FROM departments");
							while($r1=mysqli_fetch_array($dept))
							{  
								$prob=$r1['department'];
								echo "<option>$prob</option>";
							}
						?>
						</select>
					</div>
					<div class="title">
						<!-- <label for="title" style="font-weight:bold;font-size:18px;">Title</label> -->
						<input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
					</div>
					<div class="description">
						<!-- <label for="description" style="font-weight:bold;font-size:18px;">Description</label> -->
						<textarea class="form-control"  name="description" id="description" placeholder="Enter Description" ></textarea>
					</div>
					<input type="submit" value="Submit" class="submit" onclick="submit()">
				  <div id="message"></div>
				</div>
			 </div>
		 </div>
		</div>
		
  		<div>
    		<div class="complaints">
    			<h2>Recent Complaints</h2>
				<div class="table-wrapper-scroll-y my-custom-scrollbar" style="height=200px; overflow:auto;">
					<table class="table table-bordered table-striped mb-0" >
						<thead class="header">
							<tr id="thead"><th>S.no</th><th>Department	</th> <th>Title</th> <th>Date</th> <th>Description</th><th>Status</th></tr>
						</thead>
						<tbody>
							<?php 
							include("db.php");
							$sno=0;
							// $email = $row['email'];
							$select = "SELECT * FROM complaints where `email`='$email' order by sno desc";
							$q=mysqli_query($con,$select);
							while($row=mysqli_fetch_array($q))
							{ 
								$sno++;
								// $email=$row['email'];
								$problem_type=$row['dept'];
								$title=$row['title'];
								$date=$row['date'];
								$description=$row['description'];
								$status=$row['status'];
								$sid=$row['sno'];
								echo "<tr id='tdata'><td>$sno</td><td>$problem_type</td> <td>$title</td><td>$date</td><td>$description</td><td><button type= 'button' 'class='btn btn-primary btn-md' onclick='status_mes($sid)' data-toggle='modal' data-target='#status_mes_Modal' style='width: 80px; height: 30px; border-radius:3px; border: 0.2px solid rgba(88, 5, 243, 0.2); '>$status</button></td></tr>";
								
							}
					
							?>		
						</tbody>
					</table>
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
	    var sd=0;
    	function submit()
    	{
    		var title=$('#title').val();
    		var description=$('#description').val();
    		var dept=$('#problem_type').val();
			var sd=$('#sd').val();
			var subdept="";

			if(dept=="Select Department")
			{
				$('#message').html("<p style='font-size:15px;color:red;'>Select department <p>");
			}
    		else if(title=="")
   	    	{
            	$('#message').html("<p style='font-size:15px;color:red;'>Fill the title <p>");
   	     	}
   	     	else if(description=="")
   	     	{
            	$('#message').html("<p style='font-size:15px;color:red;'>Fill the description <p>");
   	     	}
   	     	else
   	     	{
   	     		var datastring="title="+title+"&description="+description+"&dept="+dept+"&subdept="+subdept;
   	     		 $.ajax({
   	     		type:"POST",
   	     		url:"post_complaint.php",
   	     		data:datastring,
   	     		beforeSend:function(){
   	     			$('#message').html("<p style='color:white;font-size:1x0px;'>processing...<p>");
   	     		},
   	     		success:function(data){
				//    alert(data);
   	     			if(data=="invalid")
   	     			{
   	     				$('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
   	     			}
   	     			else
   	     			{
					   $('#message').html("<font style='color:green;font-weight:bold;font-size:15px;'>Successfully submitted</font>");
					   setTimeout(() => {
						window.location="dashboard.php";
					   }, 1000);
						
   	     			}
   	     		}
   	     	})
   	     	}
    	}
		function status_mes(sid)
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
