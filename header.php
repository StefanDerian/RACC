<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Modify User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<link rel = "stylesheet" type = "text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head> 

<!-- <header>
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


</header> -->


<nav class="nav">

	<?php if(isset($_SESSION['userID'])){ ?>


	<a class="nav-link" href = "list.php"> Your Clients</a>
	<a class="nav-link" href = "logout.php">Logout</a>

	<?php }else{ ?>

	<a class="nav-link" href = "createAccount.php">Create Account</a>
	<a class="nav-link" href = "login.php">Login</a></li>
	<a class="nav-link" href = "editAppt.php">Registration Page</a>

	<?php } ?>
</nav>


<body>

	