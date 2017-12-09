<?php
session_start();




function setSession($row){
	
	
	$_SESSION["user"] = $row[ACCOUNT['collumns']['username']];
	$_SESSION["userID"] = $row[ACCOUNT['collumns']['user_id']];
	$_SESSION["userType"] = $row[ACCOUNT['collumns']['user_type']];

	// print_r($_SESSION);

}


function destroySession(){
	session_unset();
	session_destroy();

	$message = "You are successfully logged out";
	echo "<script type='text/javascript'>alert('$message');</script>";

}

$pageName = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['userId']) && ($pageName != "editAppt.php" && $pageName != "login.php"  )) {
	
	header("Location: login.php");
	exit;
} 

?>