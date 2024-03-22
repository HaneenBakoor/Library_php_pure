
//logout.php
<?php
require_once 'USER.php';
USER::logout();
if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
    setcookie("user", '', time() - (86400 * 30));
    setcookie("pass", '', time() - (86400 * 30));
}
header('Location: login_form.php');
?>