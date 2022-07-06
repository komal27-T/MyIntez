<?php
 session_start();
include 'connect.php';
$fk = $_SESSION['usr_id'];
$status = "NOT PAID";

if(isset($_POST['btn_save']))
{
	extract($_POST);
	
	$sql_insert = "INSERT INTO invoice VALUES('','$name','$email','$dt','$ddt','$subtotal','$fk','$status')";
	$res_insert = $sql->query($sql_insert);
	$last_billing_id = mysqli_insert_id($sql);
	$billingid = $last_billing_id;
	if($res_insert)
	{
		
		$service = COUNT($_POST['product']);
		for($i=0; $i<$service;$i++)
		{
			$sql_service = "INSERT INTO items VALUES('$billingid','$product[$i]','$quantity[$i]',
			'$price[$i]','$total[$i]','$fk')";
		
			$sql->query($sql_service);
		}
	}
	
	
	
	

	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
	header("location:invoice.php");


}
?>