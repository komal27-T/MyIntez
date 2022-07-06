<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intez</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<!-- to include sidebar-->	
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous">
</script>

<script type="text/javascript" src="getData.js"></script>
<style>
	@media (max-width: 540px){
		.content-body {
    margin-left: 0px;
    margin-top: 30px;
    margin-bottom: 50px; 
	}
	 
}
@media (min-width: 576px){
	.content-body {
    margin-left: 90px;
    margin-bottom: 50px;
}
}

</style>

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
                            <h3>Make Payment</h3>
                            <p class="mb-2">Welcome Intez Make Paymet page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Make Payment</a></div>
                    </div>
                </div>
            </div>
		<div class="row"> <!--open row-->
           		<div class="col-xl-12">
             		 <div class="card">  <!--open card-->
				<div class="card-header">
            			 <h4 class="card-title">Make Payment </h4>
				</div>
       			 <div class="card-body">
				<form class="invoice-form" id="insert-form" method="POST" action="mpayment.php">
				<div class="row justify-content-between">
                    <div class="col-xl-3">
                       	<div class="mb-3">
							<label class="form-label">Service Name</label>
								<select name="service_name" id="sname"  class="form-control">
									<option value = "" selected="selected">--Select Service--</option>
									<?php
										include 'connect.php';
										$query = "SELECT pid, pname, pamt, pdt FROM pay";
										$resultset = mysqli_query($sql, $query); 
										while( $rows = mysqli_fetch_assoc($resultset) ) { 
									?>
									<option  value="<?php echo $rows["pid"]; ?>">
										<?php echo $rows["pname"]; ?></option>
									<?php }	?> 
								</select>
							</div>

              	<div class="mb-3">
					<label class="form-label">Pay To</label>
					<input type="text" name="semail" id="semail" class="form-control"placeholder="Jonaed@bogdad.com " disabled>
                     		 	</div>
		 		</div>
				<div class="col-xl-3">
                                  <div class="mb-3">
				    	<label class="form-label">Date</label>
					<input type="text" name="sdt" id="sdt" class="form-control" placeholder="21/03/2021" disabled></div>
                                   <div class="mb-3">
					<label class="form-label">Payment Method</label>
					<select name="payment_method" id="select1" onchange="mylang()" class="form-control">
					<option value = "">--Select Pay Method--</option>
					<option value = "bank">Bank</option>
					<option value = "card">Card</option>
					</select>
					
					<!--input type="text" name="pmethod" class="form-control" placeholder="28/04/2021"--></div>
                		</div>

				<div class="col-xl-3" >
					<label class="form-label">Amount</label>
					<input type="text" id="samt" name="samt" class="form-control" placeholder="4000" disabled>
                     		 	
				
                                
                       </div>            
                  </div><!--form end-->
	<center>
	<br>
	<input class="btn btn-success" type="submit" name="save" id="save" value="Save Data">
	
			</center>
		</div>
		<div class="hidden" id="errorMassage"></div>
		<div class="hidden" id="Massage"></div>

		</form><!--close form-->
		<div id="demo"></div>
		</div><!--close card-body-->
		</div><!--close col-xl-12-->
	</div><!--close row-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="js/plugins/perfect-scrollbar-init.js"></script>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function mylang(data)
{
	alert(data);
	const ajaxreq = new XMLHttpRequest();
	ajaxreq.open('GET','http://localhost:8080/intez-html/helper.php?value='+data,'true');
	ajaxreq.send();
	
	ajaxreq.onreadystatechange = function(){
		if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
			document.getElementById('frameworklist').innerHTML = ajaxreq.responseText;
		}
	}
}

$(document).ready(function(){
	$("#select1").change(function(){
		 var string = "Bank";
         var type = $('#select1 option:selected').text(); 
          //alert(type); 
          //console.log(type);
          if(type==string)
		//var dataString = method; 
		{
			  console.log("Done comparision");
		}
		else
            {
               console.log("Faild comparision");
            }




		/*$.ajax({
			url:"fetchPay.php",      
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#samt').val(data.pamt);   
                     $('#payAmount').val(data.pay_em); 
                    $('#semail').val(data.pdt); 
                    // $('#add_data_Modal').modal('show'); 

		});*/
	});

});	
	


</script>

</body>
</html>