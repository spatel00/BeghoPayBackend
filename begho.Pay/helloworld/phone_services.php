<?php
	include_once 'dbcred.php';
	//phone services and transactional end point
	require "/twilio-php-master/Services/Twilio.php";
	$to = $_POST['to'];
	$msg = $_POST['msg'];
	 
	$client = new Services_Twilio($AccountSid, $AuthToken);
	 
	$call = $client->account->sms_messages->create(
		"$twilio_number", // From this number
		"$to", // To this number
		"Begho is live!.$msg"
	);
	 
	// Display a confirmation message on the screen
echo "Sent message {$message->sid}";