<?php
	//process bank
	include_once ('bank_class.php');
	$bankTrans = new Bank_Transfer;
	$bankTrans->setAccNum(123456);
	$bankTrans->setRoutingNum(659877);
	$bankTrans->getTransID();
	$accNum =  $bankTrans->getAccNum();
	$routeNum = $bankTrans->getRoutingNum();
	$transID = $bankTrans->getTransID();
	$mysql_link = mysqli_connect("$hostname", "$username","$db_pass","users") or die("something went wrong".mysqli_error($mysql_link));
	
	mysqli_select_db($mysql_link,"trans");
	$query = ("INSERT INTO bank_data_out (BID2,acc_num,routing_num) VALUES ('$transID','$accNum','$routeNum')");
	
	 if(!mysqli_query($mysql_link,$query)){
      echo 'could not insert<br>'. mysqli_errno($con).mysqli_error($mysql_link);
		//die;
	}
	else{
		echo 'Insert Done';
	}
	?>
	