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


<body>
	<div class="container-fluid">
		<?php if(!empty($loginstatus)){ ?>
		<p class = "alert alert-danger" ><?php echo $loginstatus; ?></p>
		<?php } ?>
		
		<div class="container"> 
			<!-- Form Start -->
			<form class = "form-container" method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<img src= "image/racc.png" id = "racc">
				<div class = "form-group">
					<input type = "text" class = "form-control" name = "user" placeholder = "Username">
				</div>
				
				<div class = "form-group">
					<input type = "password" class = "form-control" name = "pass" placeholder = "Password">
				</div>

				<div class = "checkbox">
					<lable>
						<input type = "checkbox" color:"white"> Remember Me
					</lable>
				</div>
				<div>
					<Button type = "submit" class = "btn btn-success btn-block" name = "login"> Login </Button>
					<a class ="btn btn-warning btn-lg" href = "editAppt.php">Registration Form</a>
				</div>
			</form>
			<!-- Form End -->
		</div>
	</div>
	
</body>
</html>




				<!-- <form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<table width="100%" style="border-collapse:collapse" cellpadding="5">
						<input type="hidden" name="userid" value="<?php echo $clientID; ?>">
						<tr>
							<td width="50%" style="text-align:right">Username:</td>
							<td style="text-align:left"><input autocomplete="off" type="text" name="user"	maxlength="32" value="" /></td>
						</tr>
						<tr>
							<td style="text-align:right">Password:</td>
							<td style="text-align:left"><input autocomplete="off" type="password" name="pass"	maxlength="32" value="" /></td>
						</tr>
						<tr><td /></tr>
						<tr>
							<td colspan="2" style="text-align:center"><input class="butStyle" type="submit" name="login" value="Login"/></td>
						</tr>
					</table>
				</form> -->





