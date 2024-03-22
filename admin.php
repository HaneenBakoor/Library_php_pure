<?php 
include"connect.php";

include 'USER.php';

$db=DATABASE::getinstance();
 $connection=$db->getconnection();
        $query="SELECT * FROM users WHERE type='visetor' ";
        $result=mysqli_query($connection,$query);
        $arr=mysqli_fetch_all($result,MYSQLI_ASSOC);
        ?>

       <?php echo"<H3> The VISETOR IN OUR LIBRARY:<H3>";
       foreach($arr as $a)
        {
            echo"the name is :  ". $a['username']."      its type is :     ".$a['type']."   ";?>
            <a href="edit_user.php?id=<?php echo $a['id'];?>"><button>SET EMPLOYEE</button></a><br>
       <?php }?>
        
        
       
