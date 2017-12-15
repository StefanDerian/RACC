<?php
include('dbConnection.php');
$authpage = TRUE;





$statusmsg = "";

//defining variables and setting empty values
$display = $user = $pass = $repass = "";
$displayErr = $userErr = $passErr = $repassErr = "";

if(isset($_GET["success"]) && $_GET["success"] == 1) {
    $statusmsg = "Account creation was successful.";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if it's empty
    if(empty($_POST["display"])){
        $displayErr = "<br /> Diaplay name is required";
    } else {
        $display = $_POST["display"];
    }
    
    if(empty($_POST["user"])) {
        $userErr = "<br /> Username is required";
    } else {
        $user = $_POST["user"];
        if (!preg_match("/[a-zA-Z ]/",$user)) { //check if username contains a letter
			$userErr = "<br />Username must contain a letter";
        }
    }
    
    if(empty($_POST["pass"])) {
        $passErr = "<br />Password is required";
    } else {
        $pass = $_POST["pass"];
        if(strpos($pass, " ") != false) { //check if password contains a space
            $passErr = "<br />Password must not contain spaces";
        } else if(strlen($pass)<5) {
            $passErr = "<br />Password must contain at least 5 charaters";
        }
    }
    
    if(empty($_POST["repass"])) {
        $repassErr = "<br />Re-typed Password is required";
    } else {
        $repass = $_POST["repass"];
        if($repass != $pass){
            $repassErr = "<br />Passwords must match";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Create Account") {  
    $encrypt_pass=MD5($pass); //encrypt password
    $query = "INSERT INTO Account (DisplayName, UserName, Password) VALUES ('$display', '$user', '$encrypt_pass')";
    echo $query;
    $mysqli->query($query);
}?>