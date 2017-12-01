<?php
include('dbConnection.php');
$authpage = TRUE;

$statusmsg = "";
?>

<?php
//defining variables and setting empty values
$first = $last = $prefer = $dob = $nationality = $gender = $mobile = $email = $who = "";
$firstErr = $lastErr = $dobErr = $nationalityErr = $genderErr = $mobileErr = $emailErr = $whoErr = "";


if(isset($_GET["success"]) && $_GET["success"] == 1) {
    $statusmsg = "You have been received, Thank you.";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if it's empty
    if(empty($_POST["first"])){
        $firstErr = "<br /> First name is required";
    } else {
        $first = $_POST["first"];
        // check if name contains a letter
		if (!preg_match("/[a-zA-Z ]/",$first)) {
			$firstErr = "<br />First name must contain a letter";
		}
    }
    
    if(empty($_POST["last"])) {
        $lastErr = "<br /> Last name is required";
    } else {
        $last = $_POST["last"];
        if (!preg_match("/[a-zA-Z ]/",$last)) { //check if username contains a letter
			$userErr = "<br />Last name must contain a letter";
        }
    }
    
    $prefer = $_POST["prefer"];
    
    if(empty($_POST["dob"])) {
        $dobErr = "<br /> Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
    }
    
    if(empty($_POST["nationality"])) {
        $nationalityErr = "<br /> Nationality is required";
    } else {
        $nationality = $_POST["nationality"];
        if (!preg_match("/[a-zA-Z ]/",$nationality)) { //check if nationality contains a letter
			$nationalityErr = "<br />Nationality must contain a letter";
        }
    }
    
    if(empty($_POST["gender"])) {
        $genderErr = "<br /> Gender is required.";
    } else {
        $gender = $_POST["gender"];
    }
    
    if(empty($_POST["mobile"])) {
        $mobileErr = "<br /> Mobile is required";
    } else {
        $mobile = $_POST["mobile"];
        // check if mobile contains a letter
		if (strpos($mobile, " ") != false) {
            $error++;
			$mobileErr = "<br /> Mobile must not contain spaces";
            }
    }
    
    if(empty($_POST["email"])) {
        $emailErr = "<br /> Email is required";
    } else {
        $email = $_POST["email"];
        // check if email contains a letter
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error++;
            $emailErr = "<br /> Invalid email format"; 
        }
    }
    
    if(empty($_POST["who"])) {
        $whoErr = "<br /> Name is required.";
    } else {
        $who = $_POST["who"];
    }
}
?>

<?php //store data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {  
    $query = "INSERT INTO client (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Who) VALUES ('$first', '$last', '$prefer', '$dob', '$nationality', '$gender', '$mobile', '$email', '$who')";
    echo $query;
    $mysqli->query($query);
}?>
