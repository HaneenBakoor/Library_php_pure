<?php 
include"connect.php";

$user_id=$_GET['id'];
$db=DATABASE::getinstance();
 $connection=$db->getconnection();
 $query="UPDATE users SET type='employee'WHERE id='$user_id' ";
 $result=mysqli_query($connection,$query);
 if($result)
 echo "DONE!!!!!";
 else echo "FAILD";