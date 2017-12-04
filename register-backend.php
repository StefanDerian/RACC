
<?php

$authpage = TRUE;
include('dbConnection.php'); //db connection

$statusmsg = "";
?>

<?php
    //set empty values
    $first = $last = $prefer = $dob = $nationality = $gender = $mobile = $email = $who = "";
    $firstErr = $lastErr = $dobErr = $nationalityErr = $genderErr = $mobileErr = $emailErr = $whoErr = "";

    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
     

        $first = $_POST["first"];
        $last = $_POST["last"];
        $prefer = $_POST["prefer"];
        $dob = $_POST["dob"];
        $nationality = $_POST["nationality"];
        $gender = $_POST["gender"];
        $mobile = $_POST["mobile"];
        $email = $_POST['email'];
        $who = $_POST['who'];
        
        //check if it's empty
        if (empty($_POST["first"])) {
            $firstErr = "<br /> First name is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$first)) {
			$firstErr = "<br />First name must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["last"])) {
            $lastErr = "<br /> Last name is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$last)) {
			$lastErr = "<br />Last name must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["dob"])) {
            $dobErr = "<br /> Date of Birth is required";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["nationality"])) {
            $nationalityErr = "<br /> Nationality is required";
        } else {
            if (!preg_match("/[a-zA-Z ]/",$nationality)) {
			$nationalityErr = "<br />Nationality must contain a letter";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["gender"])) {
            $genderErr = "<br /> Gender is required";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["mobile"])) {
            $mobileErr = "<br /> Mobile is required";
        } else { 
            if (strpos($mobile, " ") != false) {
			$mobileErr = "<br /> Mobile must not contain spaces";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["email"])) {
            $emailErr = "<br /> Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "<br /> Invalid email format"; 
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check if it's empty
        if (empty($_POST["who"])) {
            $whoErr = "<br /> Required";
        }
    }
?>

<?php //store data
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {  
        $query = "INSERT INTO userAccount (FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, Who) VALUES ('$first', '$last', '$prefer', '$dob', '$nationality', '$gender', '$mobile', '$email', '$who')";
        //echo $query;
        $mysqli->query($query);
}?>