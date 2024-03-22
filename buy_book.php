<?php  

include 'BOOK.php';
include 'USER.php';
session_start();
for($i=0;$i<count($_POST['ch']);$i++)
{
$book_id=$_POST['ch[$i]'];
$user_id=$_SESSION['user_id'];
$db=DATABASE::getinstance();
 $connection=$db->getconnection();
 if(isset($_POST['ch[$i]']))
 { echo"pla pla";
 $query="INSERT INTO  orders(user_id,book_id) VALUES('$user_id',$book_id)";
$r=Sientific_Book::get_book($book_id);
if(empty($r))
{
 echo " faild !!!! book already buy ";
}
else {
    $result=mysqli_query($connection,$query);
    if($result)
 {
    echo " book buy sucesfully";
 }
  
}
 
}
}
 ?>
 