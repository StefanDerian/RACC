<?php
// include ('editDate-update.php');

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