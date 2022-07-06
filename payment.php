<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}

$id = $_SESSION['usr_id'];
?>

<!DOCTYPE HTML>
<html>
<head><title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="js/scripts.js"></script>
	<!--script src="store.js"></script-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous">
</script>

<script> 
$(function(){
  $("#main-wrapper").load("comon.php");
  $(".sidebar").load("sidebar.php"); 

 
});
</script> 



</head>

<body>
<div id="main-wrapper"></div>
<div class="sidebar"></div>


 <div class="content-body">
  <div class="container">
	<div class="page-title"><!--open page title-->
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Create Expenses</h3>
                            <p class="mb-2">Welcome Intez Create Expense page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Create Invoice</a></div>
                    </div>
                </div>
            </div>
		<div class="row"> <!--open row-->
           		<div class="col-xl-12">
             		 <div class="card">  <!--open card-->
				<div class="card-header">
            			 <h4 class="card-title">Create Expense </h4>
				</div>
       			 <div class="card-body">
				<form class="invoice-form" id="insert-form" method="POST" action="bill_payment.php">
				<div class="row justify-content-between">
                    		 	<div class="col-xl-3">
                       		 	<div class="mb-3">

					<label class="form-label">Service Name</label>
					<input type="text" name="pname" class="form-control" placeholder="Light Bill">
				 	</div>

              			 	<div class="mb-3">
					<label class="form-label">Pay To</label>
					<input type="text" name="pemail" class="form-control"placeholder="Jonaed@bogdad.com ">
                     		 	</div>
		 		</div>
				<div class="col-xl-3">
                                  <div class="mb-3">
				    	<label class="form-label">Date</label>
					<input type="date" name="pdt" class="form-control" placeholder="21/03/2021"></div>
                                   <div class="mb-3">
					<label class="form-label">Due Date</label>
					<input type="date" name="pddt" class="form-control" placeholder="28/04/2021"></div>
                		</div>
				<div class="col-xl-3">
                                  <div class="mb-3">
				    	<label class="form-label">Amount</label>
					<input type="text" name="pamt" class="form-control" placeholder="4000"></div>
                                   
                  </div><!--form end-->
	<center>
	<br>
	<input class="btn btn-success" type="submit" name="save" id="save" value="Save Data">
	
			</center>
		</div>
		
		</form><!--close form-->
		<div id="demo"></div>
		</div><!--close card-body-->
		</div><!--close col-xl-12-->
	</div><!--close row-->

</body>
   
</html>