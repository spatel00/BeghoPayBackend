<?php
	/**
		By Eugene Anane
		7/23/2014
		This test inserting an account number into the trans db
	**/
	//create user
	include_once 'dbcred.php';
	include_once 'functions.php';
	
	class Bank_Transfere
	{
		/** initialize the needed variables**/
		private $destAccNum = null;
		private $destAccRoute = null;
		private $transID = null;
		
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
		public function getTransID()
		{
			return $this->uniqueID = uniqid(true);
		}
	}
	
	
	$bankTrans = new Bank_Transfere;
	$bankTrans->setAccNum(123456);
	$bankTrans->setRoutingNum(659877);
	$bankTrans->getTransID();
	$accNum =  $bankTrans->getAccNum();
	$routeNum = $bankTrans->getRoutingNum();
	$transID = $bankTrans->getTransID();
	$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
	
	mysqli_select_db($mysql_link,"trans");
	$query = ("INSERT INTO bank_data_out (BID2,acc_num,routing_num) VALUES ('$transID','$accNum','$routeNum')");
	
	 if(!mysqli_query($mysql_link,$query)){
      echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_link);
		//die;
	}
	else{
		echo 'Insert Done';
	}
	?>
	