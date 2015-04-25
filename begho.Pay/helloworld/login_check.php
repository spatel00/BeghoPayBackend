<?php
	include_once "../functions.php";
	//login check verifies login credentials
	include_once '/dependencies/dbcred.php';
	include_once '/dependencies/dependencies.php';
	
	//retrieve variables
   $pass = $_POST['password'];
   $email =  $_POST['email'];
echo 'welcome to login_check';
   //check with database
   $mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));

   $query = ("SELECT salt,hash FROM users Where email='$email'");
     $result= mysqli_query($mysql_link,$query);

     if(mysqli_num_rows($result) < 1){
      //echo 'Error email not Registered</br>';
      //echo 'number of rows =='.mysqli_num_rows($result).'</br>';
      //echo 'number of fields =='.mysqli_num_fields($result).'</br>';
	  redirect($frontend.'/signup.php');
     }
     else
	 {
      $row = mysqli_fetch_row($result);
      $salt = $row[0];
      $hash = $row[1];
     }
  if($hash==crypt($pass,$salt)) {
	$url = $frontend."/start_session.php?email=".$email;
     /** session_start();
      $_SESSION['email']="$email";
      echo 'login confirmed';
      echo $_SESSION['email'];**/
      redirect("$url");
       /* if(!session_is_registered(email)){
            //header("location:login.php");
            echo 'not registered';
        }*/
		echo "$url";
		echo 'registered';
	}
	else{
		//echo 'not registered';
		redirect($frontend.'/signup.php');
		}