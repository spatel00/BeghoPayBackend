<?php
	//User class
	
	include_once '../dbcred.php';
	include_once '../functions.php';
	
	class User
	{
		public $UID;
		public $email;
		private $salt;
		private $hash;
		public $home_phone;
		public $mobile_phone;
		public $address;
		public $country;
		public $first_name;
		public $last_name;
		public $middle_name;
		
		
		//Getting and Setting
		
		public function getAccountDetails($UID)//all the details of a user account
		{
		}
		public function create_user()
		{
		}
		public functiongetTransaction_history()
		{
		}
		
		public function update($UID){}//Update a user account 
		
	}
?>