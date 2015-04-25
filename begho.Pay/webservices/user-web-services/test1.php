<?php
require_once 'google/appengine/api/mail/Message.php';
use \google\appengine\api\mail\Message;

	     $receiver = "eananewae@begho.com";
        $subject = "Begho email test";
        $msg = "BEgho email test";
try
{
  $message = new Message();
  $message->setSender("euginwae@gmail.com");
  $message->addTo($receiver);
  $message->setSubject($subject);
  $message->setTextBody($msg);
  //$message->addAttachment('image.jpg', 'image data', $image_content_id);
  $message->send();
  
  		$arr = array(0 =>'Message Sent');
		echo json_encode($arr);
		
} catch (InvalidArgumentException $e) {
  // ...
  echo $e."</br>";
  $arr = array(0 =>'Message Not Sent');
		echo json_encode($arr);
}