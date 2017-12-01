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
if(isset($_POST['Btsearch'])){
    $search = $_POST['search'];
    //search in all table columns
    $query = "SELECT 'FirstName', 'LastName', 'PreferName', 'Mobile', 'Email' FROM user WHERE CONCAT('FirstName', 'LastName', 'PreferName', 'Mobile', 'Email') LIKE '%".$search."%'";
    $search_result = table($query);
}

$statement = $mysqli->prepare("SELECT UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email FROM user WHERE ConsultantID = ?");
//$statement->bind_param("i", $_SESSION['userID']);
$a = 6;
$statement->bind_param("i", $a);
$result = $statement->execute();
$statement->bind_result($rUserID, $rFirstName, $rLastName, $rPreferName, $rDateofBirth, $rNationality, $rGender, $rMobile, $rEmail);

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
            "Email" => $rEmail
        );
        
        array_push($appointments, $appointment);
    }
}

?>