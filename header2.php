<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<link href = "css/editAppt.css" type = "text/css" rel = "stylesheet">
	<link rel = "stylesheet" type="text/css" href = "./css/header.css"/>
	<link rel = "stylesheet" type="text/css" href = "./css/note.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src = "list.js"></script>	
	<script src="confirmation-modal.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.min.js"></script>
	<link href="bootstrap.css" rel="stylesheet">
	<link href="bootstrap-switch.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap-switch.js"></script>

	<link href="bootstrap.css" rel="stylesheet">
	<link href="bootstrap-switch.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap-switch.js"></script>

</head> 



<body>
	<nav class="navbar navbar-new">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class = "row">
					<a class="navbar-header" href="editAppt.php"><img src= "image/racc.png" id = "racc"></a>
					<h1 style="margin-top: 30px">RACC Australia</h1>					
				</div>				
			</div>

			<?php if(isset($_SESSION['userID'])){ ?>

			
			<ul class="nav navbar-nav">
				<li><a href="list.php">CLIENTS</a></li>
				<?php if($_SESSION['userType'] == "MANAGER"){ ?>
				<li><a href="agentList.php">AGENTS</a></li>
				<?php } ?>
				<li><a href="genReport.php">GENERATE REPORT</a></li>
				<li><a href="editAppt.php">ADD CLIENT</a></li>
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
			</ul>

			<?php }else{ ?>
			<ul class="nav navbar-nav">
				<li><a href="editAppt.php">REGISTRATION FORM</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
			</ul>

			<?php } ?>
		</div>
	</nav>

