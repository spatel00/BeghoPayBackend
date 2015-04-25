<?php
	//create user
	include_once '../dbcred.php';
	include_once '../functions.php';
	
	//The following are for test purposes delete when done
	$email=$_POST['email'];
     $pass=$_POST['pass'];
     $name_first=$_POST['name_first'];
     $name_last=$_POST['name_last'];
	 $name_middle=$_POST['name_middle'];
     $home_phone=$_POST['home_phone'];
     $mobile=$_POST['mobile'];
     $country=$_POST['country'];
	 $address=$_POST['address'];
	 //add a checker to make sure user doesn't already exist
	 
	
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$hash = crypt($pass, $salt);
	
	$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
	
	$query = ("INSERT INTO users (email,salt,hash,home_phone,mobile,country,address,first_name,middle_name,last_name) VALUES ('$email','$salt','$hash','$home_phone','$mobile','$country','$address','$name_first','$name_middle','$name_last')");
	
	 if(!mysqli_query($mysql_link,$query)){
      echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_link);
		//die;
	}
	else{
		redirect("http://localhost:9080/");
	}
	?>
	