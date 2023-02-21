<?php
session_start();
if(isset($_POST['title']))
{   include("db.php");
	echo $title=mysqli_real_escape_string($con,$_POST['title']);
	echo $description=mysqli_real_escape_string($con,$_POST['description']);
	echo $dept=mysqli_real_escape_string($con,$_POST['dept']);
	// echo $subdept=mysqli_real_escape_string($con,$_POST['subdept']);
	echo $email = mysqli_real_escape_string($con,$POST['email']);
	echo $date=date("Y-m-j");
    $username=$_SESSION['email'];
	$ins=mysqli_query($con," INSERT INTO complaints (`email`,`dept`,`title`,`description`,`date`) values('$username','$dept','$title','$description','$date') ");
	if($ins)
	{
		echo "success";
        // header("location:dashboard.php");
	}
	else
	{
		echo "invalid";
	}
}
else
{
	header("location:home.php");
}
?>
