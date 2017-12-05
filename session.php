<?php
session_start();




function setSession($row){
	
	
	$_SESSION["user"] = $row[ACCOUNT['collumns']['username']];
	$_SESSION["userID"] = $row[ACCOUNT['collumns']['user_id']];

	print_r($_SESSION);

}


function destroySession(){
	session_unset();
	session_destroy();

	$message = "You are successfully logged out";
	echo "<script type='text/javascript'>alert('$message');</script>";

}
if(!isset($_SESSION['user']) && !isset($authpage)) {
	header("localtion: login.php?redir=1");
	exit();
} 







?>