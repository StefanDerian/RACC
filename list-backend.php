<?php
include('dbConnection.php'); //db connection

//function to connect and execute the query
function table($query){
    include('dbConnection.php'); //db connection
    $result = mysqli_query($mysqli, $query);
    return $result;
}
?>

<?php

error_reporting(0);

$consultants = array();
$consultantQuery = "SELECT * FROM account";
if ($result = $mysqli->query($consultantQuery)) {
    while ($row = $result->fetch_assoc()) {
        $consultant = array();
        foreach ($row as $key => $value) {
            # code...
            $consultant[$key] = $value;
        }
        array_push($consultants, $consultant);

    }
}







$a = $_SESSION['userID'];

$query = "SELECT user.UserID FROM user ";
$parameter = "";
$lastContactParam ="";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);

    //search in all table columns
    //$query = "SELECT UserID FROM user WHERE ConsultantID = $_SESSION['userID']";

    $query .= "WHERE ";

    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $parameter .= empty($parameter)?"":"AND";
        $parameter .= " FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR PreferName LIKE '%$search%' OR Mobile LIKE '%$search%' OR  Email LIKE '%$search%' ";
    }
    if(!empty($_POST['phone'])){
        $phone = $_POST['phone'];
        $parameter .= empty($parameter)?"":"AND";
        $parameter .= " mobile = '$phone' ";
    } 
    if(!empty($_POST['dob'])){
        $dob = $_POST['dob'];
        $parameter .= empty($parameter)?"":"AND";
        $parameter .= " DateofBirth = '$dob' ";
    }
    if(!empty($_POST['lastContacted'])){
        $lastContactDate = $_POST['lastContacted'];
        $lastContactParam .= " HAVING MAX(time) >= DATE_ADD(NOW(), INTERVAL $lastContactDate MONTH) ";
    }
    if(!empty($_POST['vexpiry'])){
        $vexpiry = $_POST['vexpiry'];
        $parameter .= empty($parameter)?"":"AND";
        $parameter .= " Vexpiry = '$vexpiry' ";
    } 
    if( isset($_POST['consultant']) && !empty($_POST['consultant'])){
        $consultant = $_POST['consultant'];
        $parameter .= empty($parameter)?"":"AND";
        $parameter .= " ConsultantID = '$consultant' ";
    }
    if(empty($parameter)){
        $query .= "1";
    }

    $query .= $parameter;



    //$search_result = table($query);
}


// echo "SELECT UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, lastContacted,Course FROM user WHERE ConsultantID = $a AND UserID IN ($query)";

$list_query = "";
$statement;

if($_SESSION["userType"] != "AGENT"){


    $list_query = "SELECT user.UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, Course, MAX(time) as tim, account.DisplayName as DisplayName FROM user LEFT JOIN contact ON user.UserID = contact.UserID 
    JOIN account ON account.UserID = user.ConsultantID
    WHERE user.UserID IN ($query) GROUP BY user.UserID $lastContactParam";



}else{

    $list_query = "SELECT user.UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, Course, MAX(time) as tim FROM user LEFT JOIN contact ON user.UserID = contact.UserID WHERE ConsultantID = ? AND user.UserID IN ($query) GROUP BY user.UserID $lastContactParam";



}



$statement = $mysqli->prepare($list_query);
// echo "SELECT user.UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, Course, MAX(time) as tim FROM user JOIN contact ON user.UserID = contact.UserID WHERE ConsultantID = ? AND user.UserID IN ($query) GROUP BY user.UserID $lastContactParam";

// echo "SELECT user.UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, Course, MAX(time) as tim FROM user JOIN contact ON user.UserID = contact.UserID WHERE ConsultantID = ? AND user.UserID IN ($query) GROUP BY user.UserID $lastContactParam";
//$statement->bind_param("i", $_SESSION['userID']);
// print_r($_SESSION);
//$a = $_SESSION['userID'];


if($statement->bind_param("i", $a)){

}




$result = $statement->execute();

if($statement->bind_result($rUserID, $rFirstName, $rLastName, $rPreferName, $rDateofBirth, $rNationality, $rGender, $rMobile, $rEmail, $rCurrentStatus ,$vexpiry, $course, $lastContacted)){



}else{
    $statement->bind_result($rUserID, $rFirstName, $rLastName, $rPreferName, $rDateofBirth, $rNationality, $rGender, $rMobile, $rEmail, $rCurrentStatus ,$vexpiry, $course, $lastContacted, $consultantName);
}

$appointments = array();

if ($result) {
    while ($statement->fetch()) {









        $appointment = array(
            "UserID" => $rUserID, 
            "FirstName" => $rFirstName,
            "LastName" => $rLastName,
            "PreferName" => $rPreferName,
            "DateofBirth" => $rDateofBirth,
            "Nationality" => $rNationality,
            "Gender" => $rGender,
            "Mobile" => $rMobile,
            "Email" => $rEmail,
            "CurrentStatus" => $rCurrentStatus,
            "vexpiry" => $vexpiry,
            "lastContacted" => $lastContacted,
            "course" => $course
        );
        if($_SESSION["userType"] != "AGENT"){
            $appointment['consultant'] = $consultantName;

        }
        
        array_push($appointments, $appointment);
    }
}

?>