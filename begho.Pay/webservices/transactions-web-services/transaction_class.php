<?php 
	
	include_once '../dbcred.php';
	include_once '../functions.php';
	
	class Transaction 
    {
       public $TID;
       public $UID;
       public $mode;//Email/phone/bank_account/begho_account
       public $amount;
       public $dest_country;
	   public $dest_email;
	   public $dest_num;
	   public $ex_rate;
	   public $ststus;
	   public $date_time;
	   public $dest_UID; //the UID of the destination account if already registered.
	   
	   
	   //Getting and Setting
	   public function setUID($userID)//set the UOD variable
	   {
		$this->UID = $userID;
	   }
	   public function setTID($transID)
	   {
		$this->TID = $transID;
	   }
	   public function setType($type)//Three types email/bank/phone
	   {
	   }
	   public function updateAccount() //Update the users account balance
	   {
	   }
	   public function sendTransaction()
	   {
	   }
    }

?>