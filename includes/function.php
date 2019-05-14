<?php
function isConnect(){
	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}
	
	if(empty($_SESSION["id"])){
		return false;
	}

	if(!empty($_SESSION["id"])){
		return true;
	}
}

function sendMail($setFrom, $setTo, $obj, $msgHTML, $msgPlain, $setBcc=true) {
	require 'config.php';
	require 'assets/vendor/autoload.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	  ->setUsername('foucrier.corentin@gmail.com')
	  ->setPassword($mailpassword)
	;

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);
	
	// Create a message
	if (!is_array($setTo)) {
		$setTo = [$setTo];
	}
	if ($setBcc) {
		$message = (new Swift_Message($obj))
		->setFrom([$setFrom])
		->setBcc($setTo)
		->setBody($msgHTML, 'text/html')
		->addPart($msgPlain, 'text/plain')
		;
	}else{
		$message = (new Swift_Message($obj))
		->setFrom([$setFrom])
		->setTo($setTo)
		->setBody($msgHTML, 'text/html')
		->addPart($msgPlain, 'text/plain')
		;
	}
	// Send the message
	$numSent = $mailer->send($message);
}

function generateRandomString($length = 64) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}