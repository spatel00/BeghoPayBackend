<?php
	//create user
	include_once 'dbcred.php';
	include_once 'dependencies.php';
	include_once 'functions.php';
	
	//The following are for test purposes delete when done
	$email=$_POST['email'];
     $pass=$_POST['password'];
     $name_first=$_POST['name_first'];
     $name_last=$_POST['name_last'];
	 $name_middle=$_POST['name_middle'];
     $home_phone=$_POST['home_phone'];
     $mobile=$_POST['mobile'];
     $country=$_POST['country'];
	 $address=$_POST['address'];
	 //add a checker to make sure user doesn't already exist
	 $mysql_link = sql_connect('users');
	     if ($mysql_link->connect_errno) {
	 //Check for db connection errors
    echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
	}
	else{
	$query = ("SELECT * FROM users Where email='$email'");
	$result= mysqli_query($mysql_link,$query);
		if(mysqli_num_rows($result) >= 1){
		$arr = array('reply' =>'Email Already Taken');
		echo json_encode($arr);
		
		}
		else{
		//Create salt and hash then insert into db
			$salt = substr(str_replace('+','.',base64_encode(md5(mt_rand(), true))),0,16);
			$rounds = 10000;
			
			$hash = crypt($pass,sprintf('$6$rounds=%d$%s$',$rounds,$salt));
			
			$mysql_link = sql_connect('users');
			$query = ("INSERT INTO users (email,salt,hash,home_phone,mobile,country,address,first_name,middle_name,last_name) VALUES ('$email','$salt','$hash','$home_phone','$mobile','$country','$address','$name_first','$name_middle','$name_last')");
			
			 if(!mysqli_query($mysql_link,$query)){
			  echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_link);
				die;		
				$arr = array('reply' =>'Not Created');
				echo json_encode($arr);
			}
			else{
			//generate verification codes insert them into db then email them
				$code = genEVcode();
				$UID = getUID($email);
				insertEVcode($UID,$code);
				
				//Initiate emailing process
			/*	$message = 'Follow the link'. $frontend.'redeem.php'.'?code='.$code.' to verify your Begho.Pay email';
				$receiver = $email;
				$subject = "Begho.Pay email verification";
				$context = array('message' =>$message, 'receiver' =>$email, 'subject' =>$subject);
				$url = $userservices.'send_email.php';
				httpPost($url, $context);*/
				//end emailing process
				

				$arr = array('reply' =>'Created');
				echo json_encode($arr);
			}
		}
	}
	?>
	