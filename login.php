<?php
include('session.php');
include ('login-backend.php');

//include ('header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" /> -->
	<title> Login 2</title>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width", initial-scale=1"></meat>
	<link rel = "stylesheet" type = "text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link href = "css/login.css" type = "text/css" rel = "stylesheet">
	<src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	<script src="https://ajax.googleapis.com/ ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<body>
	<div class="container-fluid">
		<p><?php echo $loginstatus; ?></p>
		<!-- <br/> -->
		
		<div class = "row">
			<div class = "col-md" col-sm-4 col-xs-12></div>
			<div class = "col-md" col-sm-4 col-xs-12>
			<!-- Form Start -->

			<form class = "form-container" method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<!-- <h1>Login</h1> -->
				<img src= "image/racc.png">
				<div calss = "form-group">
					<!-- <lable for = "usernameInput">Username</lable> -->
					<input type = "text" class = "form-control" name = "user" placeholder = "Username">
				</div>
				
				<div class = "form-group">
					<!-- <lable for = "passwordInput">Password</lable> -->
					<input type = "password" class = "form-control" name = "pass" placeholder = "Password">
				</div>

				<div class = "checkbox">
					<lable>
						<input type = "checkbox"> Remeber Me
					</lable>
				</div>
				<Button type = "submit" class = "btn btn-success btn-block" name = "login"> Login </button>
			</form>

			<!-- Form End -->



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




		</div>
    </div>
</body>
</html>
