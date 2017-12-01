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



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>information page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <header>
    
    </header>
    <div>
        
        <form method="post" name="info" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <input type="text" name="search" placeholder="Search for client..."/>
            <input type="submit" name="Btsearch" value="Search"/>
            
            <table width="100%" style="border-collapse:collapse" cellpadding="5">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Prefer Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                </tr>
                
                
                <?php foreach($appointments as $appointment) { ?>
                <tr class="listrow" onclick="window.document.location='editAppt.php?user=<?php echo $appointment["UserID"]; ?>'">
                    <td><?php echo $appointment["FirstName"] ?></td>
                    <td><?php echo $appointment["LastName"] ?></td>
                    <td><?php echo $appointment["PreferName"] ?></td>
                    <td><?php echo $appointment["Mobile"] ?></td>
                    <td><?php echo $appointment["Email"] ?></td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>
</body>
</html>