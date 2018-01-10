<?php
include('dbConnection.php');
$id = $_POST['id'];
$value = $_POST['value'];

$sql = "UPDATE user SET urgent = $value WHERE UserID = $id";

$mysqli->query($sql);



?>