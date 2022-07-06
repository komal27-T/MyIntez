<?php
 	include 'connect.php';
	$query = "SELECT * FROM invoice";
	$res = mysqli_query($sql,$query);
	if(mysqli_num_rows($res)>0){
   		while ($row = mysqli_fetch_array($result)) 
		{
			echo $row[Id];
			echo $row[Iname];
		}
	}
?>