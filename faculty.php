<?php
 include("db.php");
 session_start();
if($_SESSION['type']=='faculty')
{ 
    $name=$_SESSION['name'];
    $username=$_SESSION['username'];
?>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	 <title>cms</title>
    <style>
    	body {
    		background-image: url("nice3.jpg");
    		background-repeat: no-repeat;
    		background-size:cover;
    		background-attachment: fixed;
    	}
    	option{
    		color:gray;
    	}
    	#head
    	{
    		border:2px solid white;
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
    	

    	.col-sm-4 #fm
    	{ 
    		border:2px solid green;
    		border-radius:10px;
    		padding:20px;
    		margin-top:50px;
    		margin-bottom:40px;
    	}
    	.col-sm-4  #fm h4
    	{
    		text-align:center;
    		font-weight:bold;
    		margin-bottom: 40px;
    		color:#ac7339;
    	}
    	.col-sm-8{
    		
    		margin-top:0px;
    		padding:20px;
    	}
    	.col-sm-8 h2{
    		text-align: center;
    		color: #b300b3;
    	}
    	select:hover,active{
    		border:2px solid skyblue;
    	}
    	/*.col-sm-8 table{
    		border:2px solid black;
    	}*/
    	#thead{
    		color: #000099;
    		font-weight:bold;
    		font-size:20px;
    		background-image: linear-gradient(to bottom, #afedac, #7ee3c3, #5fd5d7, #61c4e1, #7ab1dc);
    		border-radius:5px;
    		border:2px solid  #85e0e0;
    	}
    	#tdata{
    		background-color:#d1e0e0;
    		border:2px solid #e6e6e6;
    	}
    </style>
</head>
<body>
	<div id="head">
		<h1>Maintenance Cell Nuzvid</h1>
		<p>Welcome <?php echo $name; ?>&nbsp <a href="logout.php">Logout</a></p>
	</div>
	<div class="container">
  		<div class="row">
    		<div class="col-sm-8">
    			<h2>Recent Complaints</h2>
				<div class="table-responsive">
    			<table class="table">
    				<tr id="thead"><td>S.no</td><td>Problem Type</td> <td>Title</td> <td>Date</td><td>Status</td></tr>
    				<?php
    				 $sno=0;
    				 $q=mysqli_query($con,"SELECT * FROM cmscomplaints where `username`='$username' order by sno desc");
    				 while($row=mysqli_fetch_array($q))
    				 { 
    				 	$sno++;
    				 	$problem_type=$row['dept'];
						$title=$row['title'];
    				 	$date=$row['date'];
    				 	$status=$row['status'];
						$sid=$row['sno'];
    				 	echo "<tr id='tdata'><td>$sno</td><td>$problem_type</td> <td>$title</td><td>$date</td><td><button class='btn btn-info' onclick='status_mes($sid)' data-toggle='modal' data-target='#status_mes_Modal' style='width:150px'>$status</button></td></tr>";
    				 }
    				?>
    			</table>
			</div>
    		</div>
    		<div class="col-sm-4">
    			
			   	<div id="fm"style="background-color:pink">
			   		<h4>POST A COMPLAINT</h4>
     	     	       <div id="message"></div>
			   		<!-- radio box  -->
			   		<div class="form-group">
			   		<label for="exampleInputEmail1" style="font-weight:bold;font-size:18px;">
			   		Select Department
			   		</label>
			   		<select class="form-select form-control" aria-label="Default select example" id="problem_type" name="problem_type" onchange="depts()">
					   <option selected>select department</option>
						<?php
							 $dept=mysqli_query($con,"SELECT distinct(`department`) FROM cmsdepartments");
							 while($r1=mysqli_fetch_array($dept))
							 {  
								 $prob=$r1['department'];
								echo "<option>$prob</option>";
							 }
						?>
				   </select>
					</div>
					<!-- radio box  -->
		            <div id="sub1">

					</div>
				
					<div class="form-group">
						<label for="title" style="font-weight:bold;font-size:18px;">Title</label>
					    <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
					</div>
					<div class="form-group">
					    <label for="description" style="font-weight:bold;font-size:18px;">Description</label>
					    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" ></textarea>
					</div>
					<button type="submit" class="btn btn-primary btn-lg" style="padding:4px 20px;"onclick="submit()">Submit</button>
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
			if(sd)
			{
				subdept=$('#subdept').val();
			}
			if(dept=="select department")
			{
				$('#message').html("<p style='font-size:20px;color:red;'>please select department <p>");
			}
			else if(subdept=="select subdepartment")
			{
				$('#message').html("<p style='font-size:20px;color:red;'>please select sub department <p>");
			}
    		else if(title=="")
   	    	{
            	$('#message').html("<p style='font-size:20px;color:red;'>please fill the title <p>");
   	     	}
   	     	else if(description=="")
   	     	{
            	$('#message').html("<p style='font-size:20px;color:red;'>please fill the description <p>");
   	     	}
   	     	else
   	     	{
   	     		var datastring="title="+title+"&description="+description+"&dept="+dept+"&subdept="+subdept;
   	     		 $.ajax({
   	     		type:"POST",
   	     		url:"post_complaint.php",
   	     		data:datastring,
   	     		beforeSend:function(){
   	     			$('#message').html("<p style='color:white;font-size:20px;'>processing...<p>");
   	     		},
   	     		success:function(data){
				   // alert(data);
   	     			if(data=="invalid")
   	     			{
   	     				$('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>Something wrong</font>");
   	     			}
   	     			else
   	     			{
					   $('#message').html("<font style='color:red;font-weight:bold;font-size:15px;'>submit successfully!</font>");
						window.location="faculty.php";
   	     			}
   	     		}
   	     	})
   	     	}
    	}
		function depts() {
			var p=$('#problem_type').val();
			var datastring="subdept="+p;
			$.ajax({
				type:"POST",
				url:"subdept.php",
				data:datastring,
				success:function(data)
				{ 
					$("#sub1").html(data);

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