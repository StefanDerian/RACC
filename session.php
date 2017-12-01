<?php
//starting session
ob_start(); 
session_start();

if(!isset($_SESSION['user']) && !isset($authpage)) {
    header("localtion: login.php?redir=1");
    exit();
} 
?>

<?php
if(isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy():
    
    $message = "You are successfully logged out";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>