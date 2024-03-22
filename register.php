<?php
include"USER.PHP";
include"connect.PHP";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    $user=new USER($username,$password,$type);
   if($user->register())
   {
    echo"successfully";

   }
   else 
    die("faild register");

    header("location:login_form.php");
}
