<?php
		//Payments are transfers going in/out of the begho-pay system 
	
	include_once '../dbcred.php';
	include_once '../functions.php';
	
	class Payment
	{
		public $PID;
		public $UID;
		public $status;
		public $amount;
		public $type; //In or out
		public $bank_acc_num;
		public $routing;
		public $phone; //The phone number the transfers coming going to
		public $mode;//phone or bank account
		
		
		//Getting and Setting
		
		
		
		
		public function updateAccount()
		{
		}
	}
?>