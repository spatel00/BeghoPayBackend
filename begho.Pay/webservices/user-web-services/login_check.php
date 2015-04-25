<?php
	include_once "functions.php";
	//login check verifies login credentials
	include_once 'dbcred.php';
	include_once 'dependencies.php';
	
	//retrieve variables
   $pass = trim($_POST['password']);
   $email =  trim($_POST['email']);
//echo 'welcome to login_check';
   //check with database
   $mysql_link = sql_connect('users');
    if ($mysql_link->connect_errno) {
	 //Check for db connection errors
    echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
	}
	else{
	//get pass and hash from db
   $query = ("SELECT salt,hash FROM users Where email='$email'");
     $result= mysqli_query($mysql_link,$query);

     if(mysqli_num_rows($result) < 1){
      //echo 'Error email not Registered</br>';
      //echo 'number of rows =='.mysqli_num_rows($result).'</br>';
      //echo 'number of fields =='.mysqli_num_fields($result).'</br>';
		echo json_encode(array('reply' =>'Account Not Registered'));
	  
     }
     else
	 {
      $row = mysqli_fetch_row($result);
      $salt = $row[0];
      $hash = $row[1];
     }
	 }
	 $parts = explode('$',$hash);
	 $new_hash = crypt($pass, sprintf('$%s$%s$%s$', $parts[1], $parts[2], $parts[3]));
	if($hash === $new_hash) {
		echo json_encode(array('reply' =>'YES'));
	}
	else{
		echo json_encode(array('reply' =>'NO'));
		/**echo 'pass = '.$pass.'</br>';
		echo 'new_hash :'.$new_hash.'</br>';
		echo 'hash:'.$hash.'</br>';
		echo 'part1'.$parts[1].'</br>';
		echo 'part2'.$parts[2].'</br>';
		echo 'part3/salt '.$parts[3].'</br>';
		echo 'db salt'.$salt.'</br>';**/
		//echo 'new hash:'.crypt($pass, $salt);
		}
		?>