<?php
//include('dbConnection.php');
//include('session.php');

class Note{



	private $notes = array();
	private $id;

	function __construct($id){
		$this->id = $id;
		$this->notes = $this->fetch_notes($GLOBALS['mysqli'], $this->id);
	}




	public function getNotes(){
		return $this->$notes;
	}



	function fetch_notes($mysqli, $id){

		$notes = array();
		$query = "SELECT * FROM contact JOIN account ON 
		account.UserID = contact.writer
		WHERE contact.UserID = $id";
		if ($result = $mysqli->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$note = array(
					"content" => $row["Content"],
					"time" => $row["Time"],
					"UserName" => $row["UserName"],
					"DisplayName" => $row["DisplayName"],
				);
				array_push($notes, $note);
			}
		}
		// echo $query;
		return $notes;

	}


	function insertNotes($mysqli,$value){


		$collumns = "Content,Writer";


		$content = $value ['content'];
		$writer = $value ['writer'];


		$values = "'$content', '$writer'";

		$query = "INSERT INTO contact ($collumns) 
		VALUES ($values)";


		if($mysqli->query($query)){


		}
	}


	public function displayNotes(){
		include ('notes.php');
	}


}







?>

