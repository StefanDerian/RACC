<?php
session_start();

error_reporting(0);


function setSession($row){
	
	
	$_SESSION["user"] = $row[ACCOUNT['collumns']['username']];
	$_SESSION["userID"] = $row[ACCOUNT['collumns']['user_id']];
	$_SESSION["userType"] = $row[ACCOUNT['collumns']['user_type']];
	$_SESSION["DisplayName"] = $row['DisplayName'];
	$_SESSION["email"] = $row['email'];
	// print_r($_SESSION);

}


function destroySession(){
	session_unset();
	session_destroy();

	$message = "You are successfully logged out";
	echo "<script type='text/javascript'>alert('$message');</script>";

}

$pageName = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['userID']) && $pageName != "editAppt.php" && $pageName != "login.php" && $pageName != "consultationRegister.php" ) {
	
	
	header("Location: login.php");
	exit;
} 

if($pageName == "createAccount.php" && $_SESSION['userType'] != "MANAGER"){



	header("Location: list.php");
	exit;

}






?>