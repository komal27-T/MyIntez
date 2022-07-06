<?php
include_once("include/db_connect.php");
if($_REQUEST['empid']) {
	$query = "SELECT pid, pname, pdt, pamt 
	FROM pay 
	WHERE pid='".$_REQUEST['empid']."'";
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
