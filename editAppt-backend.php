<?php 
include('dbConnection.php'); // connect with database

$statusmsg = "";
if(isset($_GET["success"]) && $_GET["sucess"] == 1) {
	$statusmsg = "modified successfully";
}

?>