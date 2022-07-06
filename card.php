<?php
  include 'connect.php';
 if(!isset($_SESSION)) {
        session_start(); 
    }	
	
	$fk = $_SESSION['usr_id'];

	
if(isset($_POST['save']))
{
	//echo '<script type="text/javascript">cardnumber(document.form1.cno);</script>';

		$type = $_POST['ctype'];
    $cnm = $_POST['cname'];
    $cno = $_POST['cno'];
    $ex = $_POST['ex'];
    $cvc = $_POST['cvc'];
    $pcode = $_POST['pcode'];
    $bal = $_POST['bal'];
	
		 $qry = "INSERT INTO card(cid,ctype,Cname,Cno,Ex,CVC,Balance,Pcode,usr_id)VALUES		('','$type','$cnm','$cno','$ex','$cvc','$bal','$pcode',$fk)";

	$run = mysqli_query($sql,$qry);
		
	if(!$run) 
		{
			echo "Error: " . $qry . "" . mysqli_error($sql);
			
		} 
	else {
		echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
		header("Location: settings-payment-method.php");
	     }
	mysqli_close($sql);
     
       
       
       
}
?>