<?php
 include 'connect.php';
 if(!isset($_SESSION)) {
        session_start();
    }
include 'connect.php';

//set validation error flag as false


//check if form is submitted
if (isset($_POST['save'])) {
$fk = $_SESSION['usr_id'];
$status = "NOT PAID";
	//extract($_POST);
    $name = mysqli_real_escape_string($sql, $_POST['pname']);
    $email = mysqli_real_escape_string($sql, $_POST['pemail']);
    $dt = mysqli_real_escape_string($sql, $_POST['pdt']);
    $ddt = mysqli_real_escape_string($sql, $_POST['pddt']);
    $amt = mysqli_real_escape_string($sql, $_POST['pamt']);
    
	
	$qry = "INSERT INTO pay(pid,pname,pay_em,pdt,pddt,pamt,Due,usr_id,status) VALUES('','$name','$email','$dt','$ddt','$amt','$amt','$fk','$status')"; 
	$result = mysqli_query($sql,$qry);
	
	if(!$result)
	{
		echo "Error: " . $qry . "" . mysqli_error($sql);
	}
	else
	{
		echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
		header("location:bill.php");
	}
	

	

}
	mysqli_close($sql);
?>