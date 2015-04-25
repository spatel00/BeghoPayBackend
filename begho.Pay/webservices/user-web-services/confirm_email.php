<?php
include_once 'functions.php';
include_once 'dependencies.php';
//confirm email address
/**
	1. GET confirmation string and email from post
	2.compare with confirmation string from db
	3.Set account to confirmation status to confirmed
**/
$confirm_id = $_POST['confirm_id'];
$email = $_POST['email'];


$comp = get_conf_string($email);//returns confirmation string from db
if ($confirm_id == $comp)
{
	set_confirm($email);
}else
{
//	redirect(somewhere);
}
?>