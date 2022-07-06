<?php
 
 //fetch.php  
 /*include 'connect.php';  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM pay WHERE pid = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($sql, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  */
 
include_once("connect.php");
if($_REQUEST['employee_id']) {
	$query = "SELECT pid, pname, pamt, pdt, pay_em
	FROM pay 
	WHERE pid='".$_REQUEST[' employee_id']."'";
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
