<?php
/**
Eugilla
7/28/2014 - 6 am
This super class processes all payments at the initiation of a transaction.
Note that this only processes transactions coming into the begho system, not going out.
There are three payment sub classes
in begho lexicon a payment is money going into the begho system and a transaction is
money leaving the system.
**/
include_once '../dbcred.php';
include_once '../functions.php';

class payment
{
	private $amount;
	private $type;
	private $paymentID;
	private $user;
	
	public function setAmount($Tamount)
	{
		$this->amount = $Tamount;
	}
	public function setUser($UID)
	{
		$this->user = $UID;
	}
}
class processCC extends payment()
	{
		$this->type = "CC";
	}
class processBank extends payment()
	{
		$this->type = "Bank"
	}
class processBegho extends payment()
	{
	 $this->type = "Begho"
	}
}