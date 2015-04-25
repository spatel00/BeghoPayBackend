<?php
	//process bank
	include_once 'dbcred.php';
	include_once 'functions.php';
	
	class Bank_Transfere
	{
		/** initialize the needed variables**/
		private $destAccNum = null;
		private $destAccRoute = null;
		private $transID = null;
		private $TID;
		
		public function setAccNum($accNum)
		{
			$this ->destAccNum = $accNum;
		}
		public function setRoutingNum($routeNum)
		{
			$this ->destAccRoute = $routeNum;
		}
		
		public function getAccNum()
		{
			return $this->destAccNum;
			//return 'The account number is: '.$this->destAccNum.'</br>';
		}
		
		public function getRoutingNum()
		{
			return $this->destAccRoute;
			//return 'The routing number is: '.$this->destAccRoute.'</br>';
		}
		public function insert_Into_Db()
		{
			
		}
		public function setAmount()
		{
		}
		public function getPassBank($UID)
		{
			//returns the past bank accounts a user has sent to
		}
		public function getMyBank($UID)
		{
			//returns the past bank accounts a user has paid with
		}
		public function getTransID($TID)
		{
			return $this->TID = $TID;
		}
		public function enterIntoDb($hostname,$username,$db_pass)//enter transaction data into Db
		{///needs editing
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
	}
