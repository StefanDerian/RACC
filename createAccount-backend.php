<?php
include('dbConnection.php');
$authpage = TRUE;
$queryStatus = "";
$queryFlag = 1;
$agent = array();
$display = $user = $pass = $repass = $lang = "";
$displayErr = $userErr = $passErr = $repassErr = $langErr = "";
function assignVars($value){
    $GLOBALS['display'] = $value["display"];
    $GLOBALS['pass'] = $value["pass"];
    $GLOBALS['user'] = $value["user"];
    $GLOBALS['role'] = $value["role"];
    $GLOBALS['repass'] = $value["repass"];
    $GLOBALS['lang'] = $value["lang"];
}
function assignVarsFromDB($value){
    $GLOBALS['display'] = $value["DisplayName"];
    $GLOBALS['user'] = $value["UserName"];
    $GLOBALS['lang'] = $value["language"];
}
function checkError($value){
    $error = 0;
    //check if it's empty
    



    if(empty($value["display"])){
        $GLOBALS['displayErr'] = "<br /> Display name is required";
        $error++;
    }
    
    if(empty($value["user"])) {
        $GLOBALS['userErr'] = "<br /> Username is required";
        $error++;
    } else {

        if (!preg_match("/[a-zA-Z ]/",$GLOBALS['user'])) { //check if username contains a letter
            $GLOBALS['userErr'] = "<br />Username must contain a letter";
            $error++;
        }
    }

    if(empty($value["lang"])) {
        $GLOBALS['langErr'] = "<br /> Language is required";
        $error++;
    } else {

        if (!preg_match("/[a-zA-Z ]/",$GLOBALS['lang'])) { //check if username contains a letter
            $GLOBALS['langErr'] = "<br />language must contain a letter";
            $error++;
        }
    }
    
    if(empty($value["pass"])) {
        $GLOBALS['passErr'] = "<br />Password is required";
        $error++;
    } else {

        if(strpos($value["pass"], " ") != false) { //check if password contains a space
            $GLOBALS['passErr'] = "<br />Password must not contain spaces";
            $error++;
        } else if(strlen($value["pass"])<5) {
            $GLOBALS['passErr'] = "<br />Password must contain at least 5 charaters";
            $error++;
        }
    }
    
    if(empty($value["repass"])) {
        $GLOBALS['repassErr'] = "<br />Re-typed Password is required";
        $error++;
    } else {

        if($GLOBALS['repass'] != $GLOBALS['pass']){
            $repassErr = "<br />Passwords must match";
            $error++;
        }
    }


    if($error > 0){
        return false;
    }else{
        return true;
    }
}

function getSingleUser( $id, $mysqli){

    $user = array();
    $query = "SELECT * FROM account WHERE UserID = $id";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $user = $row;
        }
    }
    
    return $user;
}



if(isset($_GET['id'])){
    $agent = getSingleUser($_GET['id'], $mysqli );

    assignVarsFromDB($agent);

}





$statusmsg = "";

//defining variables and setting empty values

$role = "AGENT";


if(isset($_GET["success"]) && $_GET["success"] == 1) {
    $statusmsg = "Account creation was successful.";
}











if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(checkError($_POST)){
        if ($_POST['submit'] == "Create Account") {  
            //inserting new consultant or manager data
            $encrypt_pass=MD5($pass); 
    //encrypt password
            $query = "INSERT INTO Account (DisplayName, UserName, Password, language , UserType) VALUES ('$display', '$user', '$encrypt_pass','$lang' , '$role')";
            if($mysqli->query($query)){
                $queryFlag = 1;
                $queryStatus = "created successfully";
            }else{
                $queryFlag = 0;
                $queryStatus = "failed to create acccount";
            }
            
        }else{
   //updating agent or consultant data









        }
    }
}

?>