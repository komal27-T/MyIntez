<?php
	
	
	//connect to mysql database
	$server='localhost:3307';
	$user='root';
	$password='123';
	$myDb='Intez';

	$sql = mysqli_connect($server,$user,$password,$myDb);
	if(!$sql)
	{
		die("Connection failed:".mysqli_connect_error());
	}
?>



