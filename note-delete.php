<?php

include ('dbConnection.php');




$noteId = $_GET['id'];
$user = $_GET['user'];
$msg = "";

if($mysqli->query("DELETE FROM contact WHERE ID = $noteId  AND UserID = $user")){
	$msg = "Successfully delete the note";
}else{
	$msg = "delete failed please see internet connection";
}
header("Location: editAppt.php?msg=$msg&user=$user ");

?>