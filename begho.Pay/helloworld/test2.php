<?php 
	//do not delete this integral part of user udate system
	include_once 'functions.php';
	$email =$_POST['email'];
	$data = get_account_data("$email");
	echo json_encode($data);
	