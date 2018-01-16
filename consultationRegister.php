
<?php
include('session.php');
include ('consultationRegister-backend.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Consultation Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href = "css/consultation.css" type = "text/css" rel = "stylesheet">
</head>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Consultation Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href = "css/consultation.css" type = "text/css" rel = "stylesheet">
</head>


<body>
	<div class="container-fluid">		
		<div class="container"> 
			<!-- Form Start -->
			<form class = "form-container" method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="row">
					<div class="col-sm-12">
						<img src= "image/racc.png" id = "racc">						
						<H1 style = "color: white">Welcome to RACC Australia</H1>

					</div>
				</div>
				<div class = "form-group">
					<label style="color: white"><b>First Name</b></label>
					<input type = "text" class = "form-control" name = "user" placeholder = "First Name...">
				</div>
				
				<div class = "form-group">
					<label style="color: white"><b>Last Name</b></label>
					<input type = "password" class = "form-control" name = "pass" placeholder = "Last Name...">
					<br>
					<br>
				</div>
				<div>
					<Button type = "submit" class = "btn btn-success btn-lg" name = "login"> Register </Button>
					<a class ="btn btn-warning btn-lg" href = "editAppt.php">Registration Form</a>
					<br>
					<br>
				</div>
			</form>
			<!-- Form End -->
		</div>
	</div>
	
</body>
</html>