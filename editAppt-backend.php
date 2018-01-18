<?php 

include('dbConnection.php'); // connect with database



$action = htmlspecialchars($_SERVER["PHP_SELF"]);

$key="RACC IS COOL";

// initialize the variable as empty if we dont have
$fname = "";
$lname = "";
$pname = "";
$gender = "";
$dob = "";
$nationality = "";
$mobile = "";
$email = "";
$cam = "";
$uni = "";
$comp = "";
$visa = "";
$vexpiry = "";
$passport= "";
$pexpiry = "";
$caddress = "";
$haddress = "";
$consultant = "";
$status = "";
$know = "";
$wechat = "";
$prevStudy = "";
$prevComp = "";
$PrevUni = "";
$service = "";


//for populating the agent list
$agents = populateChouncelor($mysqli);


//for error message initialization
$fnameError = "";
$lnameError = "";
$pnameError = "";
$genderError = "";
$dobError = "";
$nationalityError = "";
$mobileError = "";
$emailError = "";
$camError = "";
$uniError = "";
$compError = "";
$prevCompError="";
$prevUniError="";
$prevStudyiError="";
$visaError = "";
$vexpiryError = "";
$passportError= "";
$pexpiryError = "";
$caddressError = "";
$haddressError = "";
$consultantError = "";
$statusError = "";
$duedate = "";

$statusFlag = "";


$id = isset($_GET['user'])?$_GET['user']:"";

//for fetching the conultant
function populateChouncelor($mysqli){


	$agents = array();
	$query = "SELECT UserID, DisplayName FROM account WHERE UserType = 'AGENT'";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$agent = array(
				"UserID" => $row["UserID"],
				"DisplayName" => $row["DisplayName"]
			);
			array_push($agents, $agent);
		}
	}
	return $agents;

}
function encrypt($value){



	return $value;
	
}
function decrypt($value){

	return $value;


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

//for inserting notes in edit page
function insertNotes($mysqli,$value){


	$collumns = "Content,Writer,UserID";

	$userId = $value['client'];
	$content = $value ['content'];
	$writer = $value['writer'];


	$values = "'$content', '$writer','$userId'";

	$query = "INSERT INTO contact ($collumns) 
	VALUES ($values)";


	if($mysqli->query($query)){
		$GLOBALS['statusmsg'] = "Successfully Inserting note";
		$GLOBALS['statusFlag'] = 1;

	}else{
		$GLOBALS['statusmsg'] = "Failed Inserting note";
		$GLOBALS['statusFlag'] = 0;

	}
}



//for assigning variables in case there is an error or update
function assignVars ($value, $admin = false){
	$GLOBALS['fname'] =$value['fname'];
	$GLOBALS['lname'] = $value['lname'];
	// $GLOBALS['pname'] = $value['pname'];
	$GLOBALS['gender'] = isset($value['gender'])?$value['gender']:"";
	$GLOBALS['dob'] = $value['dob'];
	$GLOBALS['nationality'] = $value['nationality'];
	$GLOBALS['mobile'] = $value['mobile'];
	$GLOBALS['email'] = $value['email'];
	$GLOBALS['cam'] = $value['cam'];
	$GLOBALS['uni'] = $value['uni'];
	$GLOBALS['comp'] = $value['comp'];
	$GLOBALS['visa'] = $value['visa'];
	$GLOBALS['vexpiry'] = $value['vexpiry'];
	$GLOBALS['wechat'] = $value ['wechat'];
	$GLOBALS['prevStudy'] = $value ['prevStudy'];
	$GLOBALS['prevComp'] = $value ['prevComp'];
	$GLOBALS['prevUni'] = $value ['prevUni'];
	$GLOBALS['service'] = $value ['service'];
	if($admin){
		
		$GLOBALS['passport']= $value['passport'];
		$GLOBALS['pexpiry'] = $value['pexpiry'];
		$GLOBALS['status'] = $value['status'];
		$GLOBALS['duedate'] = $value['duedate'];
	}
	$GLOBALS['caddress'] = $value['caddress'];
	$GLOBALS['haddress'] = $value['haddress'];
	$GLOBALS['know'] = $value['know'];
	if(!$admin){
		// $GLOBALS['know'] = $value['know'];
	}
	

	if(!isset($_SESSION['userType']) || $_SESSION['userType'] != "AGENT"){
		$GLOBALS['consultant'] = $value['consultant'];
	}
	
	
}


// assigning var from database in edit page
function assignFromDatabase($value){

	$GLOBALS['fname'] =$value['FirstName'];
	$GLOBALS['lname'] = $value['LastName'];
	// $GLOBALS['pname'] = $value['PreferName'];
	$GLOBALS['gender'] = $value['Gender'];
	$GLOBALS['dob'] = $value['DateofBirth'];
	$GLOBALS['nationality'] = $value['Nationality'];
	$GLOBALS['mobile'] = $value['Mobile'];
	$GLOBALS['email'] = $value['Email'];
	$GLOBALS['cam'] = $value['Course'];
	$GLOBALS['uni'] = $value['Uni'];
	$GLOBALS['comp'] = $value['Uni_compl'];
	$GLOBALS['visa'] = $value['Visa'];
	$GLOBALS['vexpiry'] = $value['Vexpiry'];
	$GLOBALS['passport']= $value['Passport'];
	$GLOBALS['pexpiry'] = $value['Pexpiry'];
	$GLOBALS['caddress'] = $value['CurrentAddress'];
	$GLOBALS['haddress'] = $value['HomeAddress'];
	$GLOBALS['consultant'] = $value['ConsultantID'];
	$GLOBALS['status'] = $value['CurrentStatus'];
	$GLOBALS['know'] = $value['know'];
	$GLOBALS['wechat'] = $value['wechat'];
	$GLOBALS['prevStudy'] = $value ['prevStudy'];
	$GLOBALS['prevComp'] = $value ['prevComp'];
	$GLOBALS['prevUni'] = $value ['prevUni'];
	$GLOBALS['service'] = $value ['service'];
	$GLOBALS['duedate'] = $value ['duedate'];
}

//insering clients' data and each clients' data may be different when user logged in and not logged in
function insertClient($mysqli,$value,$admin = false){


	$collumns = "FirstName, LastName, DateofBirth, Nationality, Gender, Mobile, Email, Course, Uni, Uni_compl, CurrentAddress,HomeAddress, ConsultantID, CurrentStatus,Visa,Vexpiry,wechat,service,prevUni,prevStudy,prevComp,know";
	$collumns .= $admin?",Passport,Pexpiry,duedate":"";
	// $collumns .= $admin?"":",know";

	$statusInsert = "";

	if(!$admin){
		$statusInsert = "new client";
		
		
	}
	$know = $value['know'];
	$fname = $value['fname'];
	$lname = $value['lname'];
	// $pname = $value['pname'];
	$gender = $value['gender'];
	$dob = $value['dob'];
	$nationality = $value['nationality'];
	$mobile = $value['mobile'];
	$email = $value['email'];
	$cam = $value['cam'];
	$uni = $value['uni'];
	$comp = $value['comp'];
	$visa = $value['visa'];
	$vexpiry = $value['vexpiry'];
	$wechat = $value['wechat'];
	$prevStudy = $value['prevStudy'];
	$prevComp = $value['prevComp'];
	$prevUni = $value['prevStudy'];
	$service = $value['service'];
	if($admin){


		$passport = $value['passport'];
		$pexpiry = $value['pexpiry'];
		$statusInsert = $value['status'];
		$duedate = $value['duedate'];
	}
	$caddress = $value['caddress'];
	$haddress = $value['haddress'];
	


//if the user not logged in the consultant or the logged in user is a manager will be selected based on the dropdown otherwise it is taken from session 
	$consultant = isset($_SESSION['userID']) && $_SESSION['userType'] == "AGENT"?$_SESSION['userID']:$value['consultant'];



//getting all values and collumn
	$values = "'$fname', '$lname', '$dob', '$nationality', '$gender', '$mobile', '$email', '$cam', '$uni', '$comp','$caddress','$haddress','$consultant','$statusInsert','$visa','$vexpiry','$wechat','$service','$prevUni','$prevStudy','$prevComp','$know'";
	$values .= $admin?",'$passport','$pexpiry','$duedate'":"";
	// $values .= $admin?"":",'$know'";


	$query = "INSERT INTO USER ($collumns) 
	VALUES ($values)";
	
	if($mysqli->query($query)){
		//redirect to the list page


		if(isset($_SESSION['userID'])){

			//header("Location: list.php?msg=Successfully Inserted the Client Data");
			$last_id = $mysqli->insert_id; 
			header("Location: PointTest.php?user=$last_id"); 
			exit;
		}else{
			header("Location: welcomeMessage.php"); 
			exit;
		}

		
	}else{
		if(isset($_SESSION['UserID'])){
			header("Location: list.php?msg=Failed Inserted the Client Data&flag=0"); 
			exit;
		}else{
			header("Location: editAppt.php?msg=Failed Inserted the Client Data&flag=0"); 
			exit;
		}
	}
}

function checkUserAvailability($mysqli,$user){

	$firstname = $user['fname'];
	$lastname = $user['lname'];
	$id = $GLOBALS['id'];
	if(!empty($id)){
		$query = "SELECT * FROM user WHERE FirstName = '$firstname' AND LastName = '$lastname' WHERE UserID <> $id";
	}
	else{
		$query = "SELECT * FROM user WHERE FirstName = '$firstname' AND LastName = '$lastname'";
	}
	
	//echo $query;
	$result = $mysqli->query($query);
	if($result){
		if(mysqli_num_rows($result) > 0){
			return true;

		}
	}

	
	return false;
}

function checkError($values, $admin = false){

	$error = 0;

	if (empty($values["fname"])) {
		$error++;
		$GLOBALS['fnameError'] = "First name is required";
	} else {
		$first = $values["fname"];
		// check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$first)) {
			$error++;
			$GLOBALS['fnameError'] = "First name must contain a letter";
		}
	}

	if(checkUserAvailability($GLOBALS['mysqli'],$values)){
		$error++;
		$GLOBALS['fnameError'] = "Both first name and last name already  registered in the system";
		$GLOBALS['lnameError'] = "Both first name and last name already  registered in the system";
	}

	if (empty($values["lname"])) {
		$error++;
		$GLOBALS['lnameError'] = "Last name is required";
	} else {
		$last = $values["lname"];
		// check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$last)) {
			$error++;
			$GLOBALS['lnameError'] = "Last name must contain a letter";
		}
	}


	// if (empty($values["pname"])) {
	// 	$error++;
	// 	$GLOBALS['pnameError'] = "Preference name is required";
	// } else {
	// 	$last = $values["pname"];
	// 	// check if name contains a letter
	// 	if (!preg_match("/[a-zA-Z ]/",$last)) {
	// 		$error++;
	// 		$GLOBALS['pnameError'] = "Preference must contain a letter";
	// 	}
	// }



	if (empty($values["dob"])) {
		$error++;
		$GLOBALS['dobError'] = "Date of Birth is required";
	}
	if (empty($values["comp"])) {
		$error++;
		$GLOBALS['compError'] = "Course Completion is required";
	}  
	if (empty($values["cam"])) {
		$error++;
		$GLOBALS['camError'] = "Course is required";
	}  
	if (empty($values["uni"])) {
		$error++;
		$GLOBALS['uniError'] = "University Completion is required";
	}  
	if (empty($values["prevComp"])) {
		$error++;
		$GLOBALS['prevCompError'] = "Previous Course Completion Date is required";
	}  
	if (empty($values["prevStudy"])) {
		$error++;
		$GLOBALS['prevStudyError'] = "Previous Course is required";
	}  
	if (empty($values["prevUni"])) {
		$error++;
		$GLOBALS['prevUniError'] = "Previous Institution is required";
	}  
	if (empty($values["visa"])) {
		$error++;
		$GLOBALS['visaError'] = "Visa is required";
	} else {
		$first = $values["visa"];
		// check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$first)) {
			$error++;
			$GLOBALS['visaError'] = "visa must contain a letter";
		}
	}
	if (empty($values["vexpiry"])) {
		$error++;
		$GLOBALS['vexpiryError'] = "Visa Expiry Date is required";
	} 
	if($admin){

		// if (empty($values["passport"])) {
		// 	$error++;
		// 	$GLOBALS['passportError'] = "Passport Number is required";
		// } 

		// if (empty($values["visa"])) {
		// 	$error++;
		// 	$GLOBALS['visaError'] = "Visa is required";
		// } else {
		// 	$first = $values["visa"];
		// // check if name contains a letter
		// 	if (!preg_match("/[a-zA-Z ]/",$first)) {
		// 		$error++;
		// 		$GLOBALS['visaError'] = "visa must contain a letter";
		// 	}
		// }



		// if (empty($values["vexpiry"])) {
		// 	$error++;
		// 	$GLOBALS['vexpiryError'] = "Visa Expiry Date is required";
		// } 
		// if (empty($values["pexpiry"])) {
		// 	$error++;
		// 	$GLOBALS['pexpiryError'] = "Passport Expiry date is required";
		// } 


	}


// deleted as not required
	if (empty($values["caddress"])) {
		$error++;
		$GLOBALS['caddressError'] = "Current Address is required";
	} 

	// deleted as not required
	// if (empty($values["haddress"])) {
	// 	$error++;
	// 	$GLOBALS['haddressError'] = "Home Address is required";
	// }

	if (empty($values["nationality"])) {
		$error++;
		$GLOBALS['nationalityError'] = "Nationality is required.";
	} else {
		$nationality = $values["nationality"];
		// check if nationality contains a letter
		if (!preg_match("/[a-zA-Z ]/",$nationality)) {
			$error++;
			$GLOBALS['nationalityError'] = "Nationality must contain a letter";
		}
	}

	// if (!isset($values["gender"])) {
	// 	$error++;
	// 	$GLOBALS['genderError'] = "Gender is required.";
	// }


	if (empty($values["mobile"])) {
		$error++;
		$GLOBALS['mobileError'] = "Mobile is required.";
	} else {
		$mobile = $values["mobile"];
		// check if mobile contains a letter
		if (strpos($mobile, " ") != false) {
			$error++;
			$GLOBALS['mobileError'] = "Mobile must not contain spaces";
		}
	}

	if (empty($values["email"])) {
		$error++;
		$GLOBALS['emailError'] = "Email is required.";
	} else {
		$email = $values["email"];
		// check if email contains a letter
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error++;
			$GLOBALS['emailError'] = "Invalid email format"; 
		}
	}

	if ($error > 0 ){
		return false;
	}else{
		return true;
	}


}


if(isset($_SESSION['userID'])){
	if(isset($_GET['user'])){
		$id = $_GET['user'];
		$single_user = getSingleUser( $id, $mysqli);
		assignFromDatabase($single_user);
		$action .= "?user=$id";
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['client']) ){

			assignVars($_POST,true);

			if($_POST['submitBtn'] != "Cancel"){
				if(checkError($_POST,true)){

					$consultantParam = $_SESSION['userType'] != "AGENT"?", ConsultantID = '$consultant' ":"";



					$query = "UPDATE USER SET 
					FirstName = '$fname', 
					LastName = '$lname',  
					DateofBirth = '$dob', 
					Nationality = '$nationality', 
					Gender = '$gender', 
					Mobile = '$mobile', 
					Email = '$email', 
					Course = '$cam', 
					Uni = '$uni', 
					Uni_compl = '$comp',
					Visa = '$visa',
					Vexpiry = '$vexpiry',
					Passport = '$passport',
					Pexpiry = '$pexpiry',
					CurrentAddress = '$caddress',
					HomeAddress = '$haddress',
					CurrentStatus = '$status',
					service = '$service',
					prevUni = '$prevUni',
					prevStudy = '$prevStudy',
					prevComp = '$prevComp',
					wechat = '$wechat',
					know = '$know',
					duedate = '$duedate'
					$consultantParam
					WHERE UserID = $id ";




					if($mysqli->query($query)){
						$GLOBALS['statusmsg'] = "Successfully Update the Client Data";
						$GLOBALS['statusFlag'] = 1;
						header("location:editAppt.php?user=$id&msg=Successfully Update the Client Data&flag=1");
					}else{
						$GLOBALS['statusmsg'] = 'Failed Update Client Data';
						$GLOBALS['statusFlag'] = 0;
						header("location:editAppt.php?user=$id&msg=Failed Update Client Data&flag=0");
					}

				}
			}else{
				header("Location: list.php");
			}
		}


		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['note'])){


			$clientId = $_GET['user'];
			$values = array(
				'content' => $_POST['content'],
				'client' => $clientId,
				'writer' => $_SESSION['userID']
			);

			insertNotes($mysqli, $values);


		}






	}else{

		if ($_SERVER["REQUEST_METHOD"] == "POST"){


			assignVars($_POST,true);

			if($_POST['submitBtn'] != "Cancel"){
				if(checkError($_POST,true)){


					insertClient($mysqli, $_POST, true);
				}
			}else{

				header("Location: list.php");




			}


		}
	}
}else {

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		assignVars($_POST);
		if($_POST['submitBtn'] != "Cancel"){
			if(checkError($_POST)){


				insertClient($mysqli, $_POST);

			}
		}else{
			header("Location: editAppt.php");
		}
	}
}


$statusmsg = "";
// if(isset($_GET["success"]) && $_GET["sucess"] == 1) {
// 	$statusmsg = "modified successfully";
// }











?>