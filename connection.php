<?php

	//1 connect to server
	$con = mysqli_connect('localhost','root','');
	if(!$con){
		echo 'Not Connected to server';
	}

	//2 connect to database
	$db = mysqli_select_db($con,'davaiplus');
	if(!$db){
		echo 'Not Connected to the database';
	}
?>