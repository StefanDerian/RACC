
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
				<img src= "image/racc.png" id = "racc">
				<div class = "form-group">
					<input type = "text" class = "form-control" name = "user" placeholder = "First Name...">
				</div>
				
				<div class = "form-group">
					<input type = "password" class = "form-control" name = "pass" placeholder = "Last Name...">
				</div>

				<div class = "checkbox">
					<lable>
						<input type = "checkbox" color:"white"> Remember Me </lable>
					</lable>
				</div>
				<div>
					<Button type = "submit" class = "btn btn-success btn-block" name = "login"> Login </Button>
					<Button class ="btn btn-warning btn-block" href = "editAppt.php">Registration Form</Button>
				</div>
			</form>
			<!-- Form End -->
		</div>
	</div>
	
</body>
</html>