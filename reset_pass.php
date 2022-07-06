<?php

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }	
//set validation error flag as false	
$error = false;	
$id = $_SESSION['usr_id'];
include_once 'connect.php';

//set validation error flag as false
$error = false;



	$query = "SELECT * FROM signup WHERE id = $id";
	$result = mysqli_query($sql,$query);
	while($row = mysqli_fetch_assoc($result))
	{
		$dem = $row['email'];
		
	}
	
//check if form is submitted
if (isset($_POST['sbtbtn'])) {

    $em = mysqli_real_escape_string($sql, $_POST['email']);
    $npass = mysqli_real_escape_string($sql, $_POST['npass']);
	
    if($dem != $em)
    {
		 echo "<script>alert('Email not match!')</script>";
		
		  header("Location: lock.php");
	}  
	
	else
	{
		$query1 = "UPDATE signup SET password = md5($npass) WHERE id = $id";
		$res = mysqli_query($sql,$query1);
		if($res)
		{
			 echo "<script>alert('Password Has been Updated!')</script>";
			  header("Location: signin.php");
			  session_destroy();
		}
		else
		{
			 echo "<script>alert('Try again later!')</script>";
		}
		
	}
}
?>
