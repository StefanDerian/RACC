<?php 

include('dbConnection.php'); // connect with database

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





	
}

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




if(isset($_SESSION['userID'])){
	if(isset($_GET['user'])){












		if ($_SERVER["REQUEST_METHOD"] == "POST"){

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$pname = $_POST['pname'];
			$gender = $_POST['gender'];
			$dob = $_POST['dob'];
			$nationality = $_POST['nationality'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$cam = $_POST['cam'];
			$uni = $_POST['uni'];
			$comp = $_POST['comp'];
			$visa = $_POST['visa'];;
			$vexpiry = $_POST['vexpiry'];;
			$passport= $_POST['passport'];;
			$pexpiry = $_POST['pexpiry'];;
			$caddress = $_POST['caddress'];
			$haddress = $_POST['haddress'];
			$consultant = $_POST['consultant'];

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
			WHERE UserID = $_GET['user'] ";


			if($mysqli->query($query)){


				echo "successfull update";



			}else{
				echo "not successfull";
			}



		}
	}else{

		if(empty($fnameError) && empty($lnameError) && empty($pnameError) && empty($genderError) && empty($dobError) && empty($nationalityError) && 
			empty($mobileError) && empty($camError) && empty($uniError) && empty($visaError) && empty($vexpiryError) && empty($passportError) && empty($pexpiryError)
			&& empty($compError) && empty($caddressError) && empty($haddressError) && empty($consultantError)){

			$query = "INSERT INTO USER (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Course, Uni, Uni_compl, CurrentAddress,HomeAddress,ConsultantID) 
		VALUES ('$fname', '$lname','$pname', '$dob', '$nationality', '$gender', '$mobile', '$email', '$cam', '$uni', '$comp','$caddress','$haddress','$consultant')";
		


		if($mysqli->query($query)){


			echo "successfull";



		}else{
			echo "not successfull";
		}


	}


}


}else {





	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$pname = $_POST['pname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$nationality = $_POST['nationality'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$cam = $_POST['cam'];
		$uni = $_POST['uni'];
		$comp = $_POST['comp'];
// $visa = "";
// $vexpiry = "";
// $passport= "";
// $pexpiry = "";
		$caddress = $_POST['caddress'];
		$haddress = $_POST['haddress'];
		$consultant = $_POST['consultant'];

		





		if(empty($fnameError) && empty($lnameError) && empty($pnameError) && empty($genderError) && empty($dobError) && empty($nationalityError) && 
			empty($mobileError) && empty($camError) && empty($uniError)
			&& empty($compError) && empty($caddressError) && empty($haddressError) && empty($consultantError)){

			$query = "INSERT INTO USER (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Course, Uni, Uni_compl, CurrentAddress,HomeAddress,ConsultantID) 
		VALUES ('$fname', '$lname','$pname', '$dob', '$nationality', '$gender', '$mobile', '$email', '$cam', '$uni', '$comp','$caddress','$haddress','$consultant')";
		


		if($mysqli->query($query)){


			echo "successfull";



		}else{
			echo "not successfull";
		}


	}



}








}

function checkError(){

}








$statusmsg = "";
if(isset($_GET["success"]) && $_GET["sucess"] == 1) {
	$statusmsg = "modified successfully";
}











?>