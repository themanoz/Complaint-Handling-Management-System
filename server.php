<?php
session_start();
include("db.php");

if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['phno'])&& isset($_POST['email']) && isset($_POST['password'])) 
{

  $username = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phno = mysqli_real_escape_string($con, $_POST['phno']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $type = mysqli_real_escape_string($con, $_POST['type']);        


  $user_check_query = "SELECT * FROM registration WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  {
    if ($user['name'] === $username) 
    {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) 
    {
      array_push($errors, "Email already exists");
    }

  	$query = "INSERT INTO registration (`name`,`email`,`password`,`phno`,`type`) 
  			  VALUES('$username','$email','$password_1','$phno','$type')";
  	mysqli_query($con, $query);
  	$_SESSION['name'] = $username;
  	header('location: dashboard.php');
  }
}
header('Location:login.php');
?>






























<?php
session_start();
include("db.php");
// if(isset($_POST['name']))
if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['phno'])&& isset($_POST['email']) && isset($_POST['password']))
{  
    $name=mysqli_real_escape_string($_POST['name']);
    $type=mysqli_real_escape_string($_POST['type']);
    $phno=mysqli_real_escape_string($_POST['phno']);
    $email=mysqli_real_escape_string($_POST['email']);
    $password=mysqli_real_escape_string($_POST['password']);

    // Email exists or not
    $check_email_query = "SELECT email from registration WHERE email='$email' LIMIT 1";
    $insert_data = "INSERT INTO registration (`name`,`email`,`password`,`phno`,`type`) VALUES('$name','$email','$password','$phno','$type')";
    $ins=mysqli_query($con,$insert_data);
    // $login_query = "SELECT * FROM registration where email ='$email' AND password='$password' LIMIT 1";
    // $login_query_run = mysqli_query($con,$login_query);
    if($ins>0)
    {
        $_SESSION['status']= "Email already exists";
        header('Location: login.php');
        // echo "success";
        exit(0);
    }
    else{
        // echo "something went worng";
        $_SESSION['status']= "Registration successful";
        echo "Registration successful";
        header('Location: login.php');
        exit(0);
    }
}
header('Location:login.php');
?>



<?php
session_start();
include("db.php");
if(isset($_POST['name']))
// if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['phno']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['c_password'])
{ 
    $name=$con->real_escape_string($_POST['name']);
    $type=$con->real_escape_string($_POST['type']);
    $phno=$con->real_escape_string($_POST['phno']);
    $email=$con->real_escape_string($_POST['email']);
    $password=$con->real_escape_string($_POST['password']);
    $c_password=$con->real_escape_string($_POST['c_password']);
    if($password==$c_password){
        // $check_email_query = "SELECT email from registration WHERE email='$email' LIMIT 1";
        $insert_data="INSERT INTO registration (`name`,`email`,`phno`,`password`,`c_password`,`type`) VALUES('$name','$email','$phno','$password','$c_password','$type')";
        $ins=mysqli_query($con,$insert_data);
        if($ins){
            echo "success";
            header('Location:login.php');
        }
        else{
            echo "something went worng";
        }
    }
    else{
        echo '<script>alert("confirm password is incorrect")</script>';
    }
}

?>