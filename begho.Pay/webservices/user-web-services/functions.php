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
	
	function get_account_data($email,$hostname,$username,$db_pass){
			//include_once 'dbcred.php';
			//returns the various variables for an account in an array
			//****add a second variable that shows it has been authenticated****
			$mysql_link = sql_connect('users');
				//check for error
				 if ($mysql_link->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
				}
				else{
					//Query Db for accoount data
					$query = ("SELECT UID,home_phone,mobile,address,country,first_name,last_name,middle_name,balance FROM users Where email='$email'");
					$result = mysqli_query($mysql_link,$query);
					if (!$result){
					echo 'could not run query:' . mysql_error();
					exit;
					}
					$row = mysqli_fetch_row($result);
					return($row);
					}
	}
	
	
	function sql_connect($database){
			//This function recieves the name of a database and connects to it.
			//it returns a mysql connection object.
			include 'dependencies.php';
			if (isset($_SERVER['SERVER_SOFTWARE']) &&
				strpos($_SERVER['SERVER_SOFTWARE'],'Google App Engine') !== false) {
					// Connect from App Engine.	
				  $mysql_link = new mysqli(null,'root','',"$database",null,'/cloudsql/fourth-gantry-579:beghodb');
				  if ($mysql_link->connect_errno) {
					echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
			}
			else{
				//echo "there seams to be no errors.";
			}
			//echo $mysql_link->host_info . "\n";
		}
		else {
			// Connect from a development environment.
			$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","$database") or die("something went wrong".mysqli_error($mysql_link));
			 if ($mysql_link->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysql_link->connect_errno . ") " . $mysql_link->connect_error;
			}
			else{
				//echo "there seams to be no errors.";
			}
			//echo $mysql_link->host_info . "\n";
			}
			return $mysql_link;
 }
	
	
	function genEVcode()
	{//generates a unique string for email verification
		return (md5(uniqid(rand(), true)));
	}
	
	
	function insertEVcode($UID,$EVcode)
	{//insert email verification code into db
		$mysql_link = sql_connect('users');
		$query = ("INSERT INTO user_stats (UID,email_veri_code) VALUES ('$UID','$EVcode')");
		 if(!mysqli_query($mysql_link,$query)){
			  echo 'could not insert<br>'. mysqli_errno($mysql_link).mysqli_error($mysql_link);
			  }
		else
		{
			return(TRUE);
		}
		
	}
	function getUID($email)
	{//self explanatory
		$mysql_link = sql_connect('users');
		$query = ("SELECT UID FROM users Where email='$email'");
		$result = mysqli_query($mysql_link,$query);
		if(!$result){
			echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_link);
		}else{
			$row = $result->fetch_assoc();
			
			return($row['UID']);
		}
		
	}
	?>