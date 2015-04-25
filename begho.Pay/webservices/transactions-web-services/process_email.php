<?php
	include_once ('email_class.php');
	$receiver = 'euginwae@live.com';
	$message = 'Hello';
	$subject = 'Hello2';
	$email = new email;
	$email->send_email($receiver,$message,$subject);
	
?>