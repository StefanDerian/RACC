<?php 
include('dbConnection.php'); // connect with database



$course = $uni = $intake = $status = $comment =  "";
$courseError = $uniError = $intakeError = "";


function assignVars ($value){
	$GLOBALS['course'] = $value['course'];
	$GLOBALS['intake'] = $value['intake'];
	$GLOBALS['uni'] = $value['uni'];
	$GLOBALS['status'] = $value['status'];
	$GLOBALS['comment'] = $value['comment'];
}


function getEducation($id,$mysqli){
	$educations = array();
	$query = "SELECT * FROM education WHERE UserID = $id";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			// $user = $row;
			array_push($educations, $row);
		}
	}
	return $educations;
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
// function assignFromDatabase($value){

// 	$GLOBALS['course'] = $value['courseApp'];
// 	$GLOBALS['intake'] = $value['intakeApp'];
// 	$GLOBALS['uni'] = $value['uni'];
// 	$GLOBALS['status'] = $value['status'];
// }

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
$action = htmlspecialchars($_SERVER["PHP_SELF"])."?user=$id";
if(isset($_GET['user'])){

	$user = getSingleUser($id,$mysqli);
	$educations = getEducation($id,$mysqli);

}



if($_SERVER["REQUEST_METHOD"] == "POST"){
	assignVars($_POST);

	if(checkError($_POST)){
		if($_POST['submitBtn'] == "Insert"){

			// $query = "UPDATE user SET 
			// courseApp = '$course',
			// uniApp = '$uni',
			// intakeApp = '$intake'
			// WHERE UserID = '$id'";
			$query = "INSERT INTO education (UserID,uni,status,course,intake,comment)
			VALUES('$id','$uni','$status','$course','$intake','$comment')";



			if($mysqli->query($query)){
				$queryFlag = 1;
				$queryStatus = "inserted successfully";
				// header("Location: education.php?user=$id&msg=Successfully insert the Education Data&flag=1");
				
			}else{
				$queryFlag = 0;
				$queryStatus = "failed to update";
				// header("Location: education.php?user=$id&msg=Failed insert the Education Data&flag=0");
				
			}

		}
		if($_POST['submitBtn'] == "Update"){
			$eduId = $_POST['id'];

			$query = "UPDATE education SET 
				uni = '$uni',
				status = '$status',
				course = '$course',
				intake = '$intake',
				comment = '$comment',
				created =  NOW()
				WHERE id = '$eduId'
			";



			if($mysqli->query($query)){
				$queryFlag = 1;
				$queryStatus = "";
				// header("Location: education.php?user=$id&msg=Successfully updating education data&flag=1");
				
			}else{
				$queryFlag = 0;
				$queryStatus = "failed to update";
				// header("Location: education.php?user=$id&msg=Failed updating education Data&flag=0");
				
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