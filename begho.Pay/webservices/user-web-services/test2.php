<?php 
	//do not delete this integral part of user update system
	include_once 'functions.php';
	include_once 'dbcred.php';
	$email =$_POST['email'];
	$data = get_account_data("$email","$hostname","$username","$db_pass");
	echo json_encode($data);
	