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
	$loginstatus = "Login";
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
