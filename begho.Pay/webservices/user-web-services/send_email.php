<?php
//Send email - This file retrieves an email address and a message 
//through post then sends it using google messaging api
require_once 'google/appengine/api/mail/Message.php';
use \google\appengine\api\mail\Message;
$receiver = $_POST['receiver'];
$msg = $_POST['message'];
$subject = $_POST['subject'];


//$image_content_id = '<image-content-id>';

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
  $arr = array(0 =>'Message Not Sent');
		echo json_encode($arr);
}
?>