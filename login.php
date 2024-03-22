<?php
include "connect.php";
include "USER.PHP";
if($_SERVER['REQUEST_METHOD']=="POST")
{ 
  
    $db1=DATABASE::getinstance();
    $db1->getconnection();
    $username=$_POST['username'];
    $password=$_POST['password'];
    // $type=$_POST['type'];
    // $uesr1=new UESR($name,$password,);
    $user1=USER::login($username,$password);
    if (isset($_POST['remember']))
    {   
        setcookie("user", $username, time() + (86400 * 30)); 
        setcookie("pass", $password, time() + (86400 * 30)); 
    }
}

if ($user1) 
{
  echo "Login successful!";
    
    header('Location: show_books.php');
  }

  
else 
{
  echo "Invalid username or password.";
}

// if (isset($_COOKIE['user']) && isset($_COOKIE['pass']))
//     {
//      echo "done";
//     }

//     header("Location:show_books.php");
// if($_SESSION['type']=='admin')
// {
  // header("location:admin.php");
// }