<?php
session_start();
include("db.php");
if(!isset($_POST['email']))
{  
   $username=mysqli_real_escape_string($con,$_POST['email']);
   $password=mysqli_real_escape_string($con,$_POST['password']);
   $q=mysqli_query($con,"SELECT * FROM  registration where `email`='$email' and `password`='$password' ");
   $row=mysqli_fetch_array($q);
   $count=mysqli_num_rows($q); 
   if($count==1)
   {  
     $sno=$row['sno'];
     $type=$row['type'];
     $_SESSION['name']=$row['name'];
     $_SESSION['email']=$row['email'];
     if($type==0)
     {
        $_SESSION['type']="admin";
        echo "admin";
     }
     else
     {
        $_SESSION['type']="student";
        echo "admin";
        //  $q1=mysqli_query($con,"SELECT * FROM cmsdepartments where `fkey`='$sno'");
        //  $cc=mysqli_num_rows($q1);
        //  if($cc==0)
        //  {
        //     $_SESSION['type']="admin";
        //      echo "admin";
        //  }
        //  else
        //  {
        //     $row1=mysqli_fetch_array($q1);
        //     $dept=$row1['department'];
        //     $head=$row1['head'];
        //      if($head==1)
        //      {
        //        $_SESSION['type']=$dept;
        //        echo "depthead";
        //      }
        //      else
        //     {
        //        $_SESSION['type']=$dept;
        //        $_SESSION['sno']=$sno;
        //        echo "employee";
        //     }
                  
        //  }
     }
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