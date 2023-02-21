<?php

$host="localhost";
$user="root";
$password="";
$db="chms";

$data=mysqli_connect($host,$user,$password,$db);
if($data === false)
{
    die("connection error");
}

if($_SERVER['REQUEST_METHOD'=="POST"])
{
    $email=$_POST["email"];
    $password=$_POST['password'];

    $sql="SELECT * FROM registration where email='".$email."' AND password='".$password."' ";

    $result=mysqli_query($data,$sql);
    $row = mysqli_fetch_array($result);

    if($row["usertype"] == "student")
    {
        echo "student";
    }else  if($row["usertype"] == "admin")
    {
        echo "admin";
    }
    else
    {
        echo "username or password incorrect";
    }

}