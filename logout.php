<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}else{
    $_SESSION = array();
    setcookie('PHPSESSID', '', time()-3600, '/', '', 0, 0);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>