<?php 
include('dbConnection.php'); // connect with database



$course = $uni = $intake = "";
$courseError = $uniError = $intakeError = "";


function assignVars ($value){
	$GLOBALS['course'] = $value['course'];
	$GLOBALS['intake'] = $value['intake'];
	$GLOBALS['uni'] = $value['uni'];
	
}

//getting the user information in edit page
function getSingleUser( $id, $mysqli){

	$user = array();
	$query = "SELECT * FROM USER WHERE UserID = $id";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$user = $row;
		}
	}
	return $user;
}
// assigning var from database in edit page
function assignFromDatabase($value){

	$GLOBALS['course'] = $value['courseApp'];
	$GLOBALS['intake'] = $value['intakeApp'];
	$GLOBALS['uni'] = $value['uniApp'];
}

function checkError($values){

	$error = 0;

	// if (empty($values["fname"])) {
	// 	$error++;
	// 	$GLOBALS['fnameError'] = "First name is required";
	// } 

	if ($error > 0 ){
		return false;
	}else{
		return true;
	}

	
}
$id = isset($_GET['user'])?$_GET['user']:"";

if(isset($_GET['user'])){

	$user = getSingleUser($id,$mysqli);
	assignFromDatabase($user);

}



if($_SERVER["REQUEST_METHOD"] == "POST"){
	assignVars($_POST);

	if(checkError($_POST)){
		if($_POST['submitBtn'] == "Save"){

			$query = "UPDATE user SET 
			courseApp = '$course',
			uniApp = '$uni',
			intakeApp = '$intake'
			WHERE UserID = '$id'";
			if($mysqli->query($query)){
				$queryFlag = 1;
				$queryStatus = "updated successfully";
				header("Location: education.php?user=$id&msg=Successfully Update the Client Data&flag=1");
			}else{
				$queryFlag = 0;
				$queryStatus = "failed to update";
				header("Location: education.php?user=$id&msg=Failed Update the Client Data&flag=0");
			}

		}
			// else{


  //   //encrypt password
		// 	$query = "INSERT INTO user (courseApp,uniApp,intakeApp) VALUES ('$course','uni','intake')";
		// 	if($mysqli->query($query)){
		// 		$queryFlag = 1;
		// 		$queryStatus = "created successfully";
		// 		header("Location: education.php?msg=$queryStatus&flag=$queryFlag");
		// 	}else{
		// 		$queryFlag = 0;
		// 		$queryStatus = "failed to create acccount";
		// 	}






		// }
	}
}


?>