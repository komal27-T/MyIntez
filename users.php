<?php

	include 'connect.php';
	//$pname = $_POST['product'];
	$query = "SELECT pid, pname, pamt from pay WHERE pname = ".$pname;
	$result = mysqli_query($sql,$query);
	$users_array = array();

	while($row = mysqli_fetch_assoc($result))
	{
		$pamt = $row['pamt'];
		$users_array[] = array("amt"=>$pamt);
	}
echo json_encode($users_array) 
	
?>