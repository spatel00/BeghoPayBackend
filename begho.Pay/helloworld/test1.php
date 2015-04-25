<?php
	//test webservice worker
	$entery = $_POST['word'];
	echo 'entery:'.$_POST['word'].'<br>';
	$result = strrev($entery);
	echo 'reverse:'.$result;
	