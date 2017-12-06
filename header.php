<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Modify User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head> 

<header>
	<h1> this is a header</h1>
	<ul>

		<?php if(isset($SESSION['userId'])){ ?>


		<li><a href = "list.php"> Your Clients</a></li>
		<li><a href = "#Notes">Notes</a></li>
		<li><a href = "#Report">Report</a></li>
		<li><a href = "logout.php">Logout</a></li>

		<?php }else{ ?>





		<li><a href = "createAccount.php">Create Account</a></li>
		<li><a href = "login.php">Login</a></li>
		<li><a href = "editAppt.php">Registration Page</a></li>

		<?php } ?>
	</ul>


</header>

<body>

	