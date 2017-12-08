<?php
include ('dbConnection.php');
$noteId = $_GET['noteId'];
$user = $_GET['user'];
$content = $_GET['content'];
$msg = "";



if($mysqli->query("UPDATE contact SET content = $content WHERE ID = $noteId  AND UserID = $user")){
	$msg = "Successfully update the note";
}else{
	$msg = "update failed please see internet connection";
}
header("Location: editAppt.php?msg=$msg&user=$user ");





?>