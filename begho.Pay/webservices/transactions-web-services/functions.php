<?php
	function redirect($url)
	{
		ob_start();
		while (ob_get_status())
		{
		ob_end_clean();
		}
		header("Location:$url");
	}
	
	function get_account_data($email){
	include_once 'dbcred.php';
	//returns the various variables for an account in an array
	//****add a second variable that shows it has been authenticated****
	$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
	$query = ("SELECT UID,home_phone,mobile,address,country,first_name,last_name,middle_name,balance FROM users Where email='$email'");
	$result = mysqli_query($mysql_link,$query);
	if (!$result){
	echo 'could not run query:' . mysql_error();
	exit;
	}
	$row = mysqli_fetch_row($result);
	return($row);
	}
	?>