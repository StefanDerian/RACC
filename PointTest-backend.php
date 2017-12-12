<?php
include('dbConnection.php');



$id = isset($_GET['user'])?$_GET['user']:"";


$result = $mysqli->query("SELECT * FROM pointtype JOIN clientpoint cp on cp.pointid = pointtype.id WHERE clientid = $id");

$number = $result->num_rows;


$formValue = array();

$forms = array();

$msg = "";


function updateValue ($mysqli){
	$id = $GLOBALS['id'];
	$result = $mysqli->query("SELECT * FROM pointtype JOIN clientpoint cp on cp.pointid = pointtype.id WHERE clientid = $id");
	
	while ($row = mysqli_fetch_assoc($result)) {
		# code...
		
		// $current = $row['formname']."['current']";
		// //echo $current;

		// $goal = $row['formname']."['goal']";
		// //echo $current;

		// $value = array(

		// 	$row['formname'] => array(
		// 		'current' => $row['current'],
		// 		'goal' => $row ['goal']
		// 	)
		// );

		// array_push($GLOBALS['formValue'],$value);
		$GLOBALS['formValue'][$row['formname']] = array(
			'current' => $row['current'],
			'goal' => $row ['goal']
		);

	}
	
}




$formList = $mysqli->query("SELECT * FROM pointtype");


while ($row = mysqli_fetch_assoc($formList)) {
		# code...

		// $current = $row['formname']."['current']";
		// //echo $current;

		// $goal = $row['formname']."['goal']";
		// //echo $current;

		// $value = array(

		// 	$row['formname'] => array(
		// 		'current' => $row['current'],
		// 		'goal' => $row ['goal']
		// 	)
		// );

		// array_push($GLOBALS['formValue'],$value);

	$GLOBALS['forms'][$row['formname']] = array(
		'id' => $row['id'],
		'name' => $row ['name'],
		'note' => $row ['note']
		// 'current' => $row ['current'],
		// 'goal' => $row ['goal'],

	);
	// if($number > 0){
	// 	$GLOBALS['forms'][$row['formname']]['current'] = $row ['current'];
	// 	$GLOBALS['forms'][$row['formname']]['goal'] = $row ['goal'];
	// //print_r($formValue);
	// }
}


function calculateTotals($id){


	$sums = $GLOBALS['mysqli']->query("SELECT SUM(goal) as goal ,SUM(current) as current FROM clientpoint WHERE clientid = $id");

	$result = mysqli_fetch_assoc($sums);

	return $result;

}

// print_r($forms);

if($number > 0){
	$totals = calculateTotals($id);
	updateValue($mysqli);
	//print_r($formValue);
}




// if the clients has been assessed



		# code...

		// $current = $row['formname']."['current']";
		// //echo $current;

		// $goal = $row['formname']."['goal']";
		// //echo $current;

		// $value = array(

		// 	$row['formname'] => array(
		// 		'current' => $row['current'],
		// 		'goal' => $row ['goal']
		// 	)
		// );

		// array_push($GLOBALS['formValue'],$value);


	//print_r($formValue);










if($_SERVER["REQUEST_METHOD"] == "POST") {


	// $Cage = $_POST["Cage"];
	// $Gage = $_POST["Gage"];
	// $Cenglish = $_POST["Cenglish"];
	// $Genglish = $_POST["Genglish"];
	// $Cwork = $_POST["Cwork"];
	// $Gwork = $_POST["Gwork"];
	// $Cqua = $_POST["Cqua"];
	// $Gqua = $_POST["Gqua"];
	// $Cstudy = $_POST["Cstudy"];
	// $Gstudy = $_POST["Gstudy"];
	// $Cnaati = $_POST["Cnaati"];
	// $Gnaati = $_POST["Gnaati"];
	// $Cpartner = $_POST["Cpartner"];
	// $Gpartner = $_POST["Gpartner"];
	// $Cpy = $_POST["Cpy"];
	// $Gpy = $_POST["Gpy"];
	// $Cstate = $_POST["Cstate"];
	// $Gstate = $_POST["Gstate"];
	// $Cfamily = $_POST["Cfamily"];
	// $Gfamily = $_POST["Gfamily"];
	// $Carea = $_POST["Carea"];
	// $Garea = $_POST["Garea"];
	// $Csum = $_POST["Csum"];
	// $Gsum = $_POST["Gsum"];

	$query = "";




	if($number > 0){
		

		//print_r($_POST);

		foreach ($_POST as $key => $value) {
		# code...
			//if the client has been assessed, only update required 
			$query = "UPDATE clientpoint SET ";
			$pointid = $value['id'];
			$goal = $value['goal'];
			$current = $value['current'];
			$query .= "current = $current, goal = $goal WHERE clientid = $id AND pointid = $pointid ";

			$mysqli->query($query);
		}
		updateValue($mysqli);
		$totals = calculateTotals($id);
		updateValue($mysqli);
		$msg = "The Point is successfully Updated";


	}else{
		//if the client has not been assessed
		$query = "INSERT INTO clientpoint(pointid,current,goal,clientid) VALUES ";
		foreach ($_POST as $key => $value) {
		# code...
			$pointid = $value['id'];
			$goal = $value['goal'];
			$current = $value['current'];
			$query .= "('$pointid','$current','$goal','$id'),";
			
		}
		$mysqli->query(substr($query,0, -1));
		updateValue($mysqli);
		$totals = calculateTotals($id);
		updateValue($mysqli);
		$msg = "The Point is successfully Inserted new record created";
	}
	

	
	
	

	// $query = "INSERT INTO point(Cage, Gage, Cenglish, Genglish, Cwork, Gwork, Cqua, Gqua, Cstudy, Gstudy, Cnaati, Gnaati, Cpartner, Gpartner, Cpy, Gpy, Cstate, Gstate, Cfamily, Gfamily, Carea, Garea, Csum, Gsum) VALUES ('$Carea', '$Gage', '$Cenglish', '$Genglish', '$Cwork', '$Gwork', '$Cqua', '$Gqua', '$Cstudy', '$Gstudy', '$Cnaati', '$Gnaati', '$Cpartner', '$Gpartner', ''$Cfamily', '$Gfamily', '$Carea', '$Garea')";
	// echo $query;
	
}













?>