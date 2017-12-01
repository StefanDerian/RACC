<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'root', '', 'racc');

if (mysqli_connect_errno()) {
	printf("Database Connect failed! %s\n", mysqli_connect_error());
	exit();
}
