<?php 

include('dbConnection.php'); // connect with database



$action = htmlspecialchars($_SERVER["PHP_SELF"]);



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

$agents = populateChouncelor($mysqli);

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
$visaError = "";
$vexpiryError = "";
$passportError= "";
$pexpiryError = "";
$caddressError = "";
$haddressError = "";
$consultantError = "";
$statusError = "";



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



function assignVars ($value, $admin = false){
	$GLOBALS['fname'] =$value['fname'];
	$GLOBALS['lname'] = $value['lname'];
	$GLOBALS['pname'] = $value['pname'];
	$GLOBALS['gender'] = isset($value['gender'])?$value['gender']:"";
	$GLOBALS['dob'] = $value['dob'];
	$GLOBALS['nationality'] = $value['nationality'];
	$GLOBALS['mobile'] = $value['mobile'];
	$GLOBALS['email'] = $value['email'];
	$GLOBALS['cam'] = $value['cam'];
	$GLOBALS['uni'] = $value['uni'];
	$GLOBALS['comp'] = $value['comp'];
	if($admin){
		$GLOBALS['visa'] = $value['visa'];
		$GLOBALS['vexpiry'] = $value['vexpiry'];
		$GLOBALS['passport']= $value['passport'];
		$GLOBALS['pexpiry'] = $value['pexpiry'];
		$GLOBALS['status'] = $value['status'];
	}
	$GLOBALS['caddress'] = $value['caddress'];
	$GLOBALS['haddress'] = $value['haddress'];
	$GLOBALS['consultant'] = $value['consultant'];
	
}

function assignFromDatabase($value){

	$GLOBALS['fname'] =$value['FirstName'];
	$GLOBALS['lname'] = $value['LastName'];
	$GLOBALS['pname'] = $value['PreferName'];
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
}

function insertClient($mysqli,$value,$admin = false){


	$collumns = "FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Course, Uni, Uni_compl, CurrentAddress,HomeAddress, ConsultantID, CurrentStatus";
	$collumns .= $admin?",Visa,Vexpiry,Passport,Pexpiry":"";

	$statusInsert = "";

	if(!$admin){
		$statusInsert = "not even in progress";
	}

	$fname = $value['fname'];
	$lname = $value['lname'];
	$pname = $value['pname'];
	$gender = $value['gender'];
	$dob = $value['dob'];
	$nationality = $value['nationality'];
	$mobile = $value['mobile'];
	$email = $value['email'];
	$cam = $value['cam'];
	$uni = $value['uni'];
	$comp = $value['comp'];
	if($admin){
		$visa = $value['visa'];
		$vexpiry = $value['vexpiry'];
		$passport = $value['passport'];
		$pexpiry = $value['pexpiry'];
		$statusInsert = $value['status'];
	}
	$caddress = $value['caddress'];
	$haddress = $value['haddress'];
	$consultant = $value['consultant'];






	$values = "'$fname', '$lname','$pname', '$dob', '$nationality', '$gender', '$mobile', '$email', '$cam', '$uni', '$comp','$caddress','$haddress','$consultant','$statusInsert'";
	$values .= $admin?",'$visa','$vexpiry','$passport','$pexpiry'":"";


	$query = "INSERT INTO USER ($collumns) 
	VALUES ($values)";


	if($mysqli->query($query)){


		echo "successfull";



	}





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


	if (empty($values["pname"])) {
		$error++;
		$GLOBALS['pnameError'] = "Preference name is required";
	} else {
		$last = $values["pname"];
		// check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$last)) {
			$error++;
			$GLOBALS['pnameError'] = "Preference must contain a letter";
		}
	}

	

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
		$GLOBALS['uniError'] = "CUniversity Completion is required";
	}  

	if($admin){

		if (empty($values["passport"])) {
			$error++;
			$GLOBALS['passportError'] = "Passport Number is required";
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
		if (empty($values["pexpiry"])) {
			$error++;
			$GLOBALS['pexpiryError'] = "Passport Expiry date is required";
		} 
		

	}

	if (empty($values["caddress"])) {
		$error++;
		$GLOBALS['caddressError'] = "Current Address is required";
	} 
	if (empty($values["haddress"])) {
		$error++;
		$GLOBALS['haddressError'] = "Home Address is required";
	}

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

	if (!isset($values["gender"])) {
		$error++;
		$GLOBALS['$genderError'] = "Gender is required.";
	}

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
		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			assignVars($_POST,true);

			if(checkError($_POST,true)){
				$query = "UPDATE USER SET 
				FirstName = '$fname', 
				LastName = '$lname', 
				PreferName = '$pname', 
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
				ConsultantID = '$consultant'
				WHERE UserID = $id ";
				if($mysqli->query($query)){
					echo "successfull update";
				}else{
					echo "not successfull";
				}

			}
		}
	}else{

		if ($_SERVER["REQUEST_METHOD"] == "POST"){


			assignVars($_POST,true);

			if(checkError($_POST,true)){

				insertClient($mysqli, $_POST, true);
			}
		}
	}
}else {

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		assignVars($_POST);
		if(checkError($_POST)){

			insertClient($mysqli, $_POST);

		}
	}
}


$statusmsg = "";
if(isset($_GET["success"]) && $_GET["sucess"] == 1) {
	$statusmsg = "modified successfully";
}











?>