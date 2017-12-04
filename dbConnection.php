<?php



include('_global.php');


//connect to mysql
$mysqli = new mysqli(SERVER_IP, DATABASE_USERNAME,PASSWORD, DATABASE_NAME);

if (mysqli_connect_errno()) {
	printf("Database Connect failed! %s\n", mysqli_connect_error());
	exit();
}


