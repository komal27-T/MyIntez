<?php
 include 'connect.php';
 if(!isset($_SESSION)) {
        session_start();
    }	
	
	$fk = $_SESSION['usr_id'];
	
	
	
if(isset($_POST['save']))
{
    $bnm = $_POST['bnm'];
    $rno = $_POST['rno'];
    $ano = $_POST['ano'];
    $fnm = $_POST['fnm'];
    $bal = $_POST['bal'];

   $qry = "INSERT INTO bank(Bid,Accountno,Rno,BankName,Balance,FName,usr_id)VALUES(NULL,'$ano','$rno','$bnm','$bal','$fnm',$fk)";
	
	$run = mysqli_query($sql,$qry);
	if($run)
	{
		echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
		header("Location: settings-payment-method.php");
		
		
	}
	else {
		echo "Error: " . $qry . "" . mysqli_error($sql);
	}	
	
	mysqli_close($sql);
     
       //data-toggle="modal"
                  //  data-target="#successCard"
       
       
}
?>