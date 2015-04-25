<?php
		//process bank
	include_once '../dbcred.php';
	include_once '../functions.php';
class phone_payment
	{
		private $amount;
		private $dest_number;
		private $message;
		private $From;
		private $TID;
		public function setDestNum($destinationNum) //method for setting deestination number
		{
			$this->destNum = $destinationNum;
		}
		public function setAmount($amount) 
		{
			$this->amount = $amount;
		}
		public function setMessage($message)
		{
			$this->message = $message;
		}
		public function setFrom($From)
		{
			$this->From($From);
		}
		public function sendTxtMsg()// use twillo api to send msg
		{
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
		}
		public function enterIntoDb($hostname,$username,$db_pass)//enter transaction data into Db
		{//needs editing
		mysqli_select_db($mysql_trans,"trans");
			$query = ("INSERT INTO begho (TID,UID_IN,UID_OUT,TIME,destEmail) VALUES ('$this->TID','$this->UID','$this->UID_OUT','$this->time','$this->destEmail')");
			
			 if(!mysqli_query($mysql_trans,$query)){
			  echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_trans);
				//die;
			}
			else{
				echo 'Insert Done';
			}
		}
		public function getTransID($transID)
		{
			return $this->TID = $transID;
		}
	}
	?>