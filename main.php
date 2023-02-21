<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <!-- <link rel="stylesheet" href="home.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Alata&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        /* background: #6665ee; */
        font-family: 'Alata', sans-serif;
    } 
    nav a.navbar-brand{
        color: #000;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h6{
        text-align: center;
        font-family: 'Alata',sans-serif;
    }
    h2{
        margin-top:300px;
    }
    h5{
        margin-left:35px;
        margin-top:10px;
    }
    .col-sm-4{
        /* top:15px; */
        left:285px;
    }
    .col-sm-4  #fm h6
    {
        text-align:center;
        font-weight:bold;
        margin-top: 16px;
        color:black;
    }
    .col-sm-8{
        margin-top:0px;
        padding:20px;
    }
    .col-sm-8 h2{
        margin-top:10px;
        font-weight: 300;
        font-style: normal;
        text-align: center;
        color: #2662ff;
    }
    select:hover,active{
        border:1px solid skyblue;
    }
    .col-sm-8 table tr{
        border:2px solid black;
    }
    .complaints h2{
        text-align: center;
        color: #2662ff;
    }
    .col-sm-4 #fm
    { 
        border-radius: 5px;
        width: 100%;
        /* margin-left: 25%; */
        height: 300px;
        border: 0.5pt solid  rgba(0, 0, 0, 0.2);
        margin-right:40%;
    }
    #problem_type{
        position: absolute;
        top: 80px;
        left: 35%;
        width: 100%;
        height: 48px;
        align-items: flex;
        padding-left: 18px;
        padding-right: 18px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        border: 1px solid rgba(88, 5, 243, 0.2);
        border-right: 1px solid rgba(88, 5, 243, 0.2);
        border-bottom: 1px solid rgba(88, 5, 243, 0.2);
        font-family: 'Alata',sans-serif;
    }
    .title input {
        position: absolute;
        top: 132px;
        left: 35%;
        width: 100%;
        height: 42px;
        align-items: flex;
        padding-left: 20px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        border: 1px solid rgba(88, 5, 243, 0.2);
        border-right: 1px solid rgba(88, 5, 243, 0.2);
        border-bottom: 1px solid rgba(88, 5, 243, 0.2);
        font-family: 'Alata',sans-serif;
    }
    .description textarea{
            position: absolute;
            top: 178px;
            left: 35%;
            width: 100%;
            height: 60px;
            padding-left: 20px;
            align-items: flex-end;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            border: 1px solid rgba(88, 5, 243, 0.2);
            border-right: 1px solid rgba(88, 5, 243, 0.2);
            border-bottom: 1px solid rgba(88, 5, 243, 0.2);   
            font-family: 'Alata',sans-serif;
    }
    .submit{
        position: absolute;
        top: 245px;
        width: 30%;
        height: 42px;
        padding: 10px;
        left: 105%;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        border: 1px solid rgba(88, 5, 243, 0.2);
        border-right: 1px solid rgba(88, 5, 243, 0.2);
        border-bottom: 1px solid rgba(88, 5, 243, 0.2);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.205);
        background-color: #2662ff;
        color: white;
        font-family: "Alata",sans-serif;
        font-size: 15px;
        cursor: pointer;
    }
    .col-sm-4  #fm {
        margin-bottom:230px;
        width: 600px;
        /* margin-left:0%; */
        height:300px;
        margin-left:0px;
    }
    .col-sm-4  #fm #message{
        margin-top: 34%;
        margin-left: 20%;
        font-family: 'Alata',sans-serif;
    }
    table{
        padding-top: 12%;
        /* margin-left:10%; */
        width: 100%;
        border-collapse: collapse;
    }
    #thead{
        color: black;
        font-weight: 200;
        font-size:16px;
        border-radius:5px;
        /* border:2px solid  #85e0e0; */
        text-align: center;
        font-family: 'Alata',sans-serif;
    }
    th,td{
        padding: 20px;
    }
    td{
        table-layout:fixed;
        top: 160px;
        width: 120px;
        text-align: center;
        font-family: 'Alata',sans-serif;
    }
    .my-custom-scrollbar {
        position: relative;
        height: 215px;
        overflow: auto;
        }
    .table-wrapper-scroll-y {
        display: block;
        /* margin-left:12.3% ; */
    }
    /* width */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        /* box-shadow: inset 0 0 5px grey; */
        border-radius: 10px;    
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: lightgrey;
        border-radius: 10px;
    }

    th {
        position: sticky;
        top: 0px; 
        color: black;
        background-color:rgba(37,98,255,0.1);
        backdrop-filter: blur(30px);
      }
        .container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .navbar{
        padding:0px;
        height:80px;
        background-color::rgba(37,98,255,0.1);
    }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">CHMS</a>
        <h5>Welcome <?php echo $fetch_info['name'] ?></h5>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    
    <div id="head">
		<!-- <p>Welcome <?php echo $fetch_info['name'] ?> </p> -->
	</div>
	<div class="container">
		<div class="row" id="contain">
			<div  class="col-sm-4" >
				<div id="fm">
					<h6>POST A COMPLAINT</h6>
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
				<div class="table-wrapper-scroll-y my-custom-scrollbar" style="top:10px;height=200px; overflow:auto;">
					<table class="table" >
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
						window.location="main.php";
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