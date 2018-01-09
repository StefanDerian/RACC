<?php
// include('dbConnection.php'); //db connection
// function table($query){
//     include('dbConnection.php'); //db connection
//     $result = mysqli_query($mysqli, $query);
//     return $result;

// $a = $_SESSION['userID'];

// $query = "SELECT user.UserID FROM user ";
// $parameter = "";
// $lastContactParam ="";

//     $list_query = "SELECT user.UserID, FirstName, LastName, PreferName, DateofBirth, Nationality, Gender, Mobile, Email, CurrentStatus, Vexpiry, Course, MAX(time) as tim, account.DisplayName as DisplayName FROM user LEFT JOIN contact ON user.UserID = contact.UserID 
//     LEFT JOIN account ON account.UserID = user.ConsultantID
//     WHERE user.UserID IN ($query) GROUP BY user.UserID $lastContactParam ORDER BY user.Created DESC";

include('session.php');

$appointments = $_SESSION['clients'];



// print_r($appointments);

// exit











?>