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

$a = $_SESSION['userID'];

$query = "SELECT UserID FROM user ";
$parameter = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);

    //search in all table columns
    //$query = "SELECT UserID FROM user WHERE ConsultantID = $_SESSION['userID']";

    $query .= "WHERE ";

    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $parameter .= empty($parameter)?"":"OR";
        $parameter .= " FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR PreferName LIKE '%$search%' OR Mobile LIKE '%$search%' OR  Email LIKE '%$search%' ";
    }    
    if(!empty($_POST['course'])){
        $course = $_POST['course'];
        $parameter .= empty($parameter)?"":"OR";
        $parameter .= " course = '$course' ";
    }
    if(!empty($_POST['lastContact']['begin']) && !empty($_POST['lastContact']['end'])){
        $lastContactB = $_POST['lastContact']['begin'];
        $lastContactedE = $_POST['lastContact']['end'];
        $parameter .= empty($parameter)?"":"OR";
        $parameter .= " (lastContacted BETWEEN '$lastContactB' AND '$lastContactedE')";
    }
    if(!empty($_POST['vexpiry']['begin']) && !empty($_POST['vexpiry']['end'])){
        $vexpiryB = $_POST['vexpiry']['begin'];
        $vexpiryE = $_POST['vexpiry']['end'];
        $parameter .= empty($parameter)?"":"OR";
        $parameter .= " (Vexpiry BETWEEN '$vexpiryB' AND '$vexpiryE')";
    }

    $query .= $parameter;



    //$search_result = table($query);
}


// echo "SELECT UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, lastContacted,Course FROM user WHERE ConsultantID = $a AND UserID IN ($query)";


$statement = $mysqli->prepare("SELECT UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, lastContacted,Course FROM user WHERE ConsultantID = ? AND UserID IN ($query)");
//$statement->bind_param("i", $_SESSION['userID']);
// print_r($_SESSION);
//$a = $_SESSION['userID'];
$statement->bind_param("i", $a);
$result = $statement->execute();
$statement->bind_result($rUserID, $rFirstName, $rLastName, $rPreferName, $rDateofBirth, $rNationality, $rGender, $rMobile, $rEmail, $rCurrentStatus ,$vexpiry, $lastContacted ,$course);

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
        
        array_push($appointments, $appointment);
    }
}

?>