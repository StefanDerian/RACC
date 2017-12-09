<?php

include ('dbConnection.php');




$noteId = $_GET['id'];
$user = $_GET['user'];
$msg = "";
$status = "";

if($mysqli->query("DELETE FROM contact WHERE ID = $noteId  AND UserID = $user")){
	$msg = "Successfully delete the note";
	$status = 1;
}else{
	$msg = "delete failed please see internet connection";
	$status = 0;
}
header("Location: editAppt.php?msg=$msg&user=$user&flag=$status ");

?>