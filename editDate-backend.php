<?php
// include ('editDate-update.php');
include_once('confirmation-modal-backend.php');
class EditDate{
	private $clientId;
	private $redirectUrl;
	function __construct($clientId,$redirectUrl){
		$this->clientId = $clientId;
		$this->redirectUrl = $redirectUrl;
		include ('editDate.php');

	}

}









?>