<?php
	include_once '../dbcred.php';
	$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
	
	//get exrate - use ajax to get the exchange rate.
	mysqli_select_db($mysql_link,"trans");
	
	
		$query = "SELECT * FROM trans.exRates;";
		if(!$results=mysqli_query($mysql_link,$query)){
				echo 'could not connect<br>'. mysqli_errno($mysql_link).mysqli_error($mysql_link);
				//die;
			}
			else{
				
				//$row = mysqli_fetch_assoc($results);
				$indexOnly=[];
				while ($row = mysqli_fetch_assoc($results)) {
					$indexOnly[] = $row;
				}
				echo json_encode($indexOnly);
				
			}
		
?>