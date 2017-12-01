<?php
include ('login-backend.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
	<header>
		
	</header>

	<div class="main">
		<p><?php echo $loginstatus; ?></p>
		<br/>
        
		<form method="post" name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
        </form>
    </div>
	</body>
	</html>
