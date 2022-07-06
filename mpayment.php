<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}


include_once 'connect.php';

$query1 = SELECT * FROM pay INNER JOIN  


//set validation error flag as false
$error = false;
	$qry = "SELECT pid FROM pay";
	$res = mysqli_query($sql,$qry);
	$lastid = mysqli_insert_id($sql);
	echo $lastid ;
	

//check if form is submitted
if (isset($_POST['save'])) {
	//$today = date("Y-m-d h:i:sa");
    $name = mysqli_real_escape_string($sql, $_POST['sname']);
    $email = mysqli_real_escape_string($sql, $_POST['semail']);
    $dt = mysqli_real_escape_string($sql, $_POST['sdt']);
    $method = mysqli_real_escape_string($sql, $_POST['pmethod']);
    $amt = mysqli_real_escape_string($sql, $_POST['samt']);
    $status = 0;   

	$qry = "INSERT INTO expense VALUES('','$name','$email','$dt','$method','$amt','$lastid')";
	$result = mysqli_query($sql,$qry);
	
	if($result)
	{
		
		echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
		
	}

	

}
	mysqli_close($sql);
?>