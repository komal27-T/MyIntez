
<?php
include 'database.php';
if(isset($_POST['save']))
{
	
	$name = $_POST['iname'];
    	$email = $_POST['iemail'];
	$date = $_POST['dt'];
    	$ddate = $_POST['ddt'];
	
	
	$qry = "INSERT INTO invoice VALUES('','$name','$email','$date','$ddate')";
	
	 if(mysqli_query($sql, $qry)) 
		{	
			$id=mysqli_insert_id($sql);
			for($i = 0; $i<COUNT($_POST['txtItem']); $i++)
			{ 
				mysqli_query($sql,"INSERT INTO items  
				SET   
				In_Id = '{$id}',
				Items = '{$_POST['name'][$i]}',  
				Qty = '{$_POST['qty'][$i]}',  
				Price = '{$_POST['rate'][$i]}',  
				Total = '{$_POST['amt'][$i]}');   
			}    
	 } 
	else {
		//echo "Error: " . $qry . "" . mysqli_error($sql);
		echo "Error: " . $qry . "<br>" . mysqli_error($sql);
	}
	 
}
mysqli_close($sql);
?>