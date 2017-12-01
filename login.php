<?php
ob_start();
$authpage = TRUE;
include('dbConnection.php'); //db connection
//include('sessionControl.php');
?>

<?php
$loginstatus = "Please login to access the portal";
//insert values into table

if (isset($_GET['redir']) && $_GET['redir'] == 1) {
	$loginstatus = "Please login to access the portal";
}

if (isset($_REQUEST['login'])){

	$user = $_REQUEST["user"];
	$pass = $_REQUEST["pass"];
	$passcheck = "";

	$encpass = MD5($pass);

	$stmt = $mysqli->prepare("SELECT UserID, UserName FROM Account WHERE UserName=? AND Password=?");
	$stmt->bind_param("ss", $user, $encpass);
	$stmt->execute();
    $stmt->bind_result($UserID);
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$_SESSION["user"] = "$user";
        $_SESSION["userID"] = "$UserID";
		header("Location: http://localhost/racc/createAccount.php"); //redirect
        exit;
	} else {
		$loginstatus = "Incorrect username or password. Please try again.";
	}
	//$mysqli->close();
}
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
