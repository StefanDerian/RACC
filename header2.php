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
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script src="confirmation-modal.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
	<!-- <script src="https://cdn.datatables.net/responsive/2.2.1/js/jquery.dataTables.js"></script> -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
	
	


	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src = "list.js"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

</head> 



<body>
	<nav class="navbar navbar-new">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class = "row">
					<div class="col-sm-2" style="margin-top: 32px">
						<input class = "goBackBtn" type = "image" src = "image/bback-32.png" onclick="goBack()">
						<script>
							function goBack()
							{
								window.history.back()
							}
						</script>
					</div>
					<div class="col-sm-10">
						<a style="margin-top: 8px" class="navbar-header" href="editAppt.php"><img src= "image/racc.png" id = "racc"></a>
						<h1 style="margin-top: 16px; color: white">RACC Australia</h1>
					</div>					
				</div>				
			</div>

			<?php if(isset($_SESSION['userID'])){ ?>

			
			<ul class="nav navbar-nav">
				<li><a href="list.php">CLIENTS</a></li>
				<?php if($_SESSION['userType'] == "MANAGER"){ ?>
				<li><a href="agentList.php">AGENTS</a></li>
				<?php } ?>
				<!-- <li><a href="genReport.php">GENERATE REPORT</a></li> -->
				<li><a href="editAppt.php">ADD CLIENT</a></li>
				<?php if($_SESSION['userType'] == "MANAGER"){ ?>
				<li><a href="createAccount.php">ADD AGENT</a></li>
				<?php } ?>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a></li>
			</ul>

			<?php }else{ ?>
			<ul class="nav navbar-nav">
				<li><a href="editAppt.php">REGISTRATION FORM</a></li>
				<!-- <li><a href="consultationRegister.php">CONSULTATION REGISTER</a></li> -->
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="createAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
			</ul>

			<?php } ?>
		</div>
	</nav>

