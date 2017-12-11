<?php
include('dbConnection.php');





$server = $GLOBALS['mysqli'];
$id = $_GET['id'];
$url = $_GET['url'];
$date = date("Y-m-d h:i:sa");
$query = ("UPDATE user SET lastContacted = '$date' WHERE UserID = $id");
$msg = "";
$flag = "";
if($server->query($query)){


	$msg = "last contacted date are updated successfully";
	$flag = "1";
}else{
	$msg = "last contacted date are updated successfully";
	$flag = "0";
}

if(substr($url, -4) != ".php"){
	header("location:$url&msg=$msg&flag=$flag");
}else{
	header("location:$url?msg=$msg&flag=$flag");
	
}









?>