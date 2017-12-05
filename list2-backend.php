<?php


if(isset($_POST['Btsearch'])) {
    $search = $_POST['search'];
    //search in all table columns
    //$query = "SELECT FirstName, LastName, PreferName, Mobile, Email FROM user WHERE CONCAT('FirstName', 'LastName', 'PreferName', 'Mobile', 'Email') AND ConsultantID = 6 LIKE '%".$search."%'";
    $query = "SELECT FirstName, LastName, PreferName, Mobile, Email FROM user WHERE ConsultantID = 6 AND CONCAT(`FirstName`, `LastName`, `PreferName`) LIKE '%".$search."%'";
    $search_result = table($query);
} else {
    $query = "SELECT UserID, FirstName, LastName, PreferName, Mobile, Email FROM user WHERE ConsultantID = '".$_SESSION['UserID']."'";
    $search_result = table($query);
}

//function to connect and execute the query
function table($query){
    include('dbConnection.php'); //db connection
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($mysqli));
        exit();
    }
    return $result;
}
?>