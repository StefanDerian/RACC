<?php
include('session.php');





if(isset($_SESSION["userID"])){
	header('location: list.php');
}else{
	header('location: login.php');
}













?>