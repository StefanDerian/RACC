<?php
include('dbConnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



error_reporting(0);

if(empty($_GET['user'])){
	header('Location:list.php');
}



$id = isset($_GET['user'])?$_GET['user']:"";


$result = $mysqli->query("SELECT * FROM pointtype JOIN clientpoint cp on cp.pointid = pointtype.id WHERE clientid = $id");

$number = $result->num_rows;


$formValue = array();

$forms = array();

$msg = "";



$userResult = $mysqli->query("SELECT * FROM user WHERE UserID = $id");
$userDetail = mysqli_fetch_assoc($userResult);






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
	if($_POST['submitBtn'] != "Cancel"){

		$query = "";




		if($number > 0){
			// if ($_POST['submitBtn'] == "Update Point") {
			foreach ($_POST as $key => $value) {
		# code...
			//if the client has been assessed, only update required 
			// print_r($value);

				if(isset($value['id']) && isset($value['goal']) && isset($value['current']) ){
					$query = "UPDATE clientpoint SET ";
					$pointid = $value['id'];
					$goal = $value['goal'];
					$current = $value['current'];
					$query .= "current = $current, goal = $goal WHERE clientid = $id AND pointid = $pointid ";

					$mysqli->query($query);

				}

				// }


				$msg = "The Point is successfully Inserted new record created";
				updateValue($mysqli);
				$totals = calculateTotals($id);
				updateValue($mysqli);
				$msg = "The Point is successfully Updated";


			}


//only the advisor can send the email
			if ($_POST['submitBtn'] == "Send Email") {
				$mail = new PHPMailer(true);                              
			// Passing `true` enables exceptions
				try {
    //Server settings
					// $mail->SMTPDebug = 4;                                 
    // Enable verbose debug output
					$mail->isSMTP();                                      
    // Set mailer to use SMTP
					$mail->Host = 'mail.racc.net.au';  
    // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               
    // Enable SMTP authentication
					$mail->Username = $_SESSION['email'];                 
    // SMTP username
					$mail->Password = $_POST['emailPassword'];                           
    // SMTP password
					//$mail->SMTPSecure = 'tls';                            
    // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    
    // TCP port to connect to

    //Recipients


					$mail->SMTPOptions = array(
						'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
						)
					);
					$mail->setFrom($_SESSION['email'], 'RACC');
					$mail->addAddress($userDetail['Email'], $userDetail['FirstName']." ".$userDetail['LastName'] );     
    // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    
    // Optional name

    //Content
					$mail->isHTML(true);                                  
    // Set email format to HTML
					$mail->Subject = 'Your Point Test Update and Feedback';
					
					$mail->Body .= '<html>';
					$mail->Body .= '<head>';
					$mail->Body .= '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />';
					$mail->Body .= '</head>';
					$mail->Body .= '<body>';
					$mail->Body .= '<p> Hi '. $userDetail['FirstName']. ' '.$userDetail['LastName'].', </p>';
					$mail->Body .= 'Your result of point test has been updated and here are some feedback';
					$mail->Body .= '<table class ="table" width="100%" style="border-collapse:collapse" cellpadding="13">';

					$mail->Body .= '<tr class = "info">
					<th></th>
					<th>Skills</th>
					<th>Current Points</th>
					<th>Notes</th>
					<th>Goal Points</th>
					</tr>';
					foreach ($forms as $key => $value) {
						$mail->Body .= '<tr>';
						$mail->Body .= "<td>". $value['id'] ."</td>";
						$mail->Body .= "<td>".  $value['name'] ."</td>";
						$mail->Body .= "<td>".
						$formValue[$key]['current']
						."</td>";
						$mail->Body .= "<td>".$value['note']."</td>";
						$mail->Body .= '<td>';
						$mail->Body .= $formValue[$key]['goal'];

						$mail->Body .= '</td>';
						$mail->Body .= '</tr>';


					} 
					$mail->Body .= '<tr>';
					$mail->Body .= '<td colspan ="5">';
					$mail->Body .= '<h4>Feedback:</h4>';
					$mail->Body .= '<p>'.$_POST['feedback'].'</p>';
					$mail->Body .= '</td>';



					$mail->Body .= '</tr>';




					$mail->Body .= '</table>';

					$mail->Body .= '<p>Kind Regards,</p>';
					if($_SESSION['userType'] != "MANAGER"){
						$mail->addAttachment('image/m.jpeg');
					}
					$mail->Body .= '</br>';
					$name = $_SESSION['DisplayName'];
					$mail->Body .= "<p>$name</p>";
					$mail->Body .= '<p>Migration and Education Agent</p>';
					if($_SESSION['userType'] != "MANAGER"){
						$mail->Body .= '<p>MARN#1572961</p>';
					}

					$mail->Body .= '<p><b>RACC Australia - Education - Migration - Internship</b></p>';
					$mail->Body .= '</br>';

					if($_SESSION['userType'] != "MANAGER"){
						$mail->Body .= '<p><b>mobile    :</b> +61 403 534 902 (whatsapp, LINE, wechat)</p>';
					} 

					$email = $_SESSION['email'];
					$mail->Body .= "<p>$email</p>";
					$mail->Body .= '<p><b>website  :</b> www.racc.net.au<p>';
					$mail->Body .= '<p><b>facebook:</b> racc australia<p>';
					$mail->Body .= '<p><b>address:</b> 343 Little Collins Street, Melbourne</p>';
					$mail->Body .= '<font color = "blue">Like our <font color = "red">Facebook <font color = "blue"> or <font color = "red">Wechat<font color = "blue"> and get updates about:</font>';
					$mail->Body .= '<ul>
					<li>Job vacancy</li>
					<li>Intership Opportunity</li>
					<li>Migration update</li>
					<li>Scholarship offer</li>
					<li>Upcoming events such as:</li>
					<ul>
					<li>IELTS Free Trial Test</li>
					<li>Free PTE Preparation Class</li>
					<li>Migration Seminar</li>
					<li>Career Fair</li>
					</ul>
					</ul>';

					$mail->addAttachment('image/racclogo.jpg');
					$mail->addAttachment('image/wechat1.jpg');
					$mail->addAttachment('image/qrcode.jpEg');



















					$mail->addAttachment('image/racc.png');


					$mail->Body .= '</body>';
					$mail->Body .= '</html>';


					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if($mail->send()){
						$msg .= " and email sent successfully";
						// header('Location:PointTest.php?user='.$id);

					}else{
						// $mail .= " but the email is not sent";
					}


				}catch (Exception $e) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				}

			}

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



		}


	}else{
		header('Location:list.php');
	}
}
?>