
<?php

	//Will be converted into a library for email processing
		//process email
	include_once '../dbcred.php';
	include_once '../functions.php';
	
	
	//$userData = unserialize($_POST['data']);
	//Process phone
	class email
	{
		public $amount;
		public $destEmail;
		private $message;
		public $From;// the name of the from account
		public $TID; // for transaction ID user user id plus some date time algorithm
		public $UID_OUT;//the user id of the destination account if available
		public $UID;
		public function setDestEmail($destinationEmail) //method for setting deestination number
		{
			$this->destEmail = $destinationEmail;
		}
		public function setAmount($amount) 
		{
			$this->amount = $amount;
		}
		public function setMessage($message)
		{
			$this->message = $message;
		}
		public function setUID()
		{
			$this->UID = $_SESSION['UID'];
		}
		public function setTID($TID)
		{
			$this->TID = $TID;
		}
		public function genUID(){
			//generates a user id
		}
		public function setUID_OUT()
		{
			
		}
		public function setFrom($From)
		{
			$this->From($From);
		}
		public function genUnique_Url()
		{
			/*this function will generaate a unique url and input it into a db
				This url will then be passed to sendEmail where it will be emailed to the receiver
				
			
			*/
		}
		public function getPassEmails($UID){
			//returns the past emails a user has sent to
		}
		public function sendEmail($receiver,$message,$subject)// use email api to send msg
		{
			$data = ['receiver' => '$receiver', '$msg' => '$message','subject' => '$subject'];
			$data = http_build_query($data);
			$context = [
			  'http' => [
				'method' => 'POST',
				'header' => "custom-header: custom-value\r\n" .
							"custom-header-two: custom-value-2\r\n",
				'content' => $data
			  ]
			];
			$context = stream_context_create($context);
			$result = file_get_contents('send_email.php', false, $context);
			return $result;
		}
		public function emailIsreg($email)
		{
			///returns true or false if email is registered
		
		}
		public function enterIntoDb($hostname,$username,$db_pass)//enter transaction data into Db
		{
		$mysql_trans = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
			
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
		public function getTransID($TID)
		{
			return $this->TID = $TID;
		}
	}