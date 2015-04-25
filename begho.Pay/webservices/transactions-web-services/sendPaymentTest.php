<?php
require '/webservices/transactionsWebServices/twilio-php/Services/Twilio.php'
	//this is a test script for sending money. 
	//will be replaced with carrier payment apis
require 'Services/Twilio.php';
include 'credentials.php';
$amount = '$1000';
$sender = 'Eugene';
$client = new Services_Twilio($AccountSid, $AuthToken);
$from = '765-532-6478';
$to = '765-249-9262';
$messsage = 'You just received '. $amount.' from'. $sender;
 
$call = $client->account->sms_messages->create($from,$to,$message);
print $call->length;
print $call->sid;