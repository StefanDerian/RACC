<?php
ob_start();
$authpage = TRUE;
include('dbConnection.php'); //db connection
//include('session.php');
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


	$sql = "SELECT ".ACCOUNT['collumns']['username']." , ".ACCOUNT['collumns']['user_id']." FROM ".ACCOUNT['table_name']." WHERE ".ACCOUNT['collumns']['username']."= '$user' AND ". ACCOUNT['collumns']['password']." = '$encpass'";



	//echo $sql;

	

	$stmt = mysqli_query($connection, $sql);
	

	
	if (mysqli_num_rows($stmt) > 0) {
		
		$row = mysqli_fetch_array($stmt, MYSQLI_ASSOC);
		setSession($row);

		
		//print_r($_SESSION);


		header("Location: createAccount.php"); //redirect
		exit;
	} else {
		$loginstatus = "Incorrect username or password. Please try again.";
	}

}




?>
