<?php
	include 'connect.php';
		
	$data_points = array();
	
	$query = "SELECT pname,pamt FROM pay";
	$result = mysqli_query($sql,$query);
	
	while($row = mysqli_fetch_array($result))
	{
		$point = array('ts'->$row['pname'],'d1'->$row['pamt']);
		array_push($data_points,$point);
	}
	echo json_encode($data_points,JSON_NUMERIC_CHECK);
	mysqli_close($sql);


?>