<?php
	//process calculation
	include_once '../dbcred.php';
	include_once '../functions.php';
	class Process_calc
	{
		public $country = "null";
		public $exRate = "null";
		public $sendTo = "null";
		public $sendAmount = "null";
		public $symbol = "null";
		public $paymentMethod = "null";
		public $total = "null";
		
		//Get the exchange rate from servers
		public function getExRate($country,$hostname,$username,$db_pass){
			$mysql_trans = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
			
			mysqli_select_db($mysql_trans,"trans");
			$query = "SELECT * FROM exRates WHERE Country='$country'");
			
			 if(!$results=mysqli_query($mysql_link,$query)){
			  echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_trans);
				//die;
			}
			else{
				$row=mysqli_fetch_array($results);
				
			}
			$this->exRate = $row['currency'];
			$this->symbol = $row['symbol'];
		}
		//returns said exchange rate
		public function postExRate($country){
		
		 return $this->exRate;
		}
		
	}