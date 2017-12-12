<?php

class ConfirmationModal{



	// private $url;
	private $message;

	function __construct($message){
		// $this->url = $url;
		$this->message = $message;
		include('confirmation-modal.php');
	}



}



?>