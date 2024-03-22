<form action="login.php" method="POST">
 NAME:   <input type="text" name="username" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>"><br><br>
 PASSWORD:   <input type="password" name="password"value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>"><br><br>
 Remember Me::  <input type="checkbox"name="remember"><br><br>
    <input type="submit" name="login" value="login">
    

</form>