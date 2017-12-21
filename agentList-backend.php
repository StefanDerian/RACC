<?php
include('dbConnection.php');

// include the pagination class
require 'vendor/stefangabos/zebra_pagination/Zebra_Pagination.php';






$agents = array();
$agentsQuery = "SELECT * FROM account WHERE UserType = 'AGENT'";
if($result = $mysqli->query($agentsQuery)) {
	while ($row = mysqli_fetch_array($result)) {

		$agent = array(
			"id" => $row['UserID'],
			"DisplayName" => $row['DisplayName'],
			"UserName" => $row['UserName'],
		);


		array_push($agents, $agent);


	}
}

// how many records should be displayed on a page?
$records_per_page = 14;



// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records(count($agents));

// records per page
$pagination->records_per_page($records_per_page);

$agents = array_slice(
	$agents,
	(($pagination->get_page() - 1) * $records_per_page),
	$records_per_page
);







?>
