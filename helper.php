<?php
	$server='localhost:3307';
	$user='root';
	$password='123';
	$myDb='Intez';
	
	$conn = mysqli_connect($server,$user,$password,$myDb);
	if(!$conn)
	{
		exit("sorry, connection error....");
	}
	$string = "bank";
	if($_REQUEST['method'] == $string) {
	$query = "SELECT * FROM bank";
	$resultSet = mysqli_query($sql, $query);	
	$empData = array();
	while( $emp = mysqli_fetch_assoc($resultSet) ) {
		$empData = $emp;
	}
	echo json_encode($empData);
} else {
	echo 0;	
}




?>