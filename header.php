<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<link rel = "stylesheet" type="text/css" href = "./css/note.css"/>
	<link rel="stylesheet" href="vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">
<!-- 	<script type="text/javascript" src="vendor/stefangabos/zebra_pagination/public/js/zebra_pagination.js"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<script src="confirmation-modal.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.min.js"></script>
<!-- 	<link href="bootstrap.css" rel="stylesheet">
	<script src="jquery.js"></script>
	<script src="bootstrap-switch.js"></script> -->
	<?php if(basename($_SERVER['PHP_SELF']) == 'welcomeMessage.php'){ ?>

	<meta http-equiv="refresh" content="2;url=editAppt.php">
	<?php } ?>
</head> 



<body>
	<nav class="navbar navbar-new">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- <button type="button" class="btn btn-default" aria-label="Left Align">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</button> -->
				

				<div class = "row">
					<div class="col-sm-2" style="margin-top: 20px">
						<input type = "image" src = "image/back-48.png" onclick="goBack()">
						<script>
						function goBack()
						  {
						  window.history.back()
						  }
						</script>
					</div>
					<div class="col-sm-10">
						<a class="navbar-header" href="editAppt.php"><img src= "image/racc.png" id = "racc"></a>
						<h1 style="margin-top: 30px">RACC Australia</h1>
					</div>
					
				</div>
				
			</div>

			<?php if(isset($_SESSION['userID'])){ ?>

			
			<ul class="nav navbar-nav">
				<li class="active"><a href="list.php">CLIENTS</a></li>				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in" id ="logoutimage"></span> LOGOUT</a></li>
			</ul>

			<?php }else{ ?>
			<ul class="nav navbar-nav">
				<li><a href="editAppt.php">REGISTRATION FORM</a></li>
			</ul>



			<?php } ?>
		</div>
	</nav>
</body>
<!-- <header class="header" role = "banner">
	<div class = "header-tiem with-site-logo">
		<a class="site-logo site-logo-link" href="editAppt.php"><img src= "image/racc.png" id = "racc">
		</a>
	</div>

	<nav data-nav-name="mobile">
		<ul class = "nav-main">
			<li class="active"><a href="list.php">CLIENTS</a></li>		
		</ul>
		<ul class = "nav-tertiary">
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-in" id ="logoutimage"></span> LOGOUT</a></li>			
		</ul>
	</nav>

	
</header> -->
