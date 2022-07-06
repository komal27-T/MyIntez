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

<body class="dashboard">

<!--div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div-->

<div id="main-wrapper"></div>
<div class="sidebar"></div>
    <div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Create Invoice</h3>
                            <p class="mb-2">Welcome Intez Create Invoice page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Create Invoice</a></div>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Invoice </h4>
                        </div> 
                        <div class="card-body">
                            <form class="invoice-form" method="POST" action="cr_invoice.php">   
                                    <div class="row justify-content-between">
                                       <div class="col-xl-3">

                                       <div class="mb-3">
				<label class="form-label">Invoice Name</label>
				<input type="text" name="name" class="form-control" placeholder="Jonaed Bogdadi">
                                            </div>

                                       <div class="mb-3">
				<label class="form-label">Bill To</label>
				<input type="text" name="email" class="form-control" placeholder="Jonaed@bogdad.com ">
                                      </div>
                                        </div>

                                       <div class="col-xl-3">

                                      <div class="mb-3"><label class="form-label">Date</label>
				<input type="date" name="dt" class="form-control" placeholder="21/03/2021">
				     </div>

                                      <div class="mb-3"><label class="form-label">Due Date</label>
			        <input type="date" name="ddt" class="form-control" placeholder="28/04/2021"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    
                                <div class="form-group row">
                                 <div class="mb-3 col-xl-2">  
                                   <label class="form-label">Items</label> 
                                    </div>
                                 <div class=" mb-3 col-xl-2">
                                    <label class="form-label">Quantity</label>
                                 </div> 
                                  
                                  <div class="mb-3 col-xl-2">
                                    <label class="form-label">Price</label>
                                  </div>
                                  
                                  <div class="mb-3 col-xl-2">
                                    <label class="form-label">Total</label>
                                  </div>
                                </div>
                                    
                                <div class="mydiv">
                                   <div class = "form-group row control-group after-add-more subdiv">
                                       <div class="mb-3 col-xl-2">  
                                   <input type="text" name="product[]" id="product" class="form-control" placeholder="Wireframe">
                                       </div>
                                    
                                 <div class=" mb-3 col-xl-2">
                                     <input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Wireframe">
                                 </div> 
                                  
                                  <div class="mb-3 col-xl-2">
                                     <input type="text" name="price[]" id="price" class="form-control" placeholder="price">
                                  </div>
                                  
                                  <div class="mb-3 col-xl-2">
                                     <input type="text" name="total[]" id="total" class="form-control total" placeholder="total" readonly/>
                                  </div>
                                  
                                  <div class="mb-3 col-xl-2">
                                     <button class="btn btn-success add-more" type="button">
					<i class="glyphicon glyphicon-plus"></i> Add</button>
                                  </div>
                                       
                                   </div>
                                    
                                </div>
                                
                                <div class="form-group row">
                                  <label class="col-sm-6 control-label">Total</label>
			                      <div class="col-sm-3">
				                   <input type="text" name="subtotal" id="subtotal" class="form-control subtotal" 
				                    placeholder="Subtotal" readonly="">		
				                </div>
				            </div>
                            <br>
                               <div class="form-group row">
                                  <label class="col-sm-6 control-label">Remark</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="remark" id="remark" class="form-control" placeholder="Remark">
                                  </div>
                             </div>
                             <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>   
                                    
                                </form>
                                
                            <div class="copy hide">
                                <div class="form-group control-group row subdiv">
                                   
                                    <div class="mb-3 col-xl-2">  
                                   <input type="text" name="product[]" id="product" class="form-control" placeholder="Wireframe">
                                       </div>
                                       
                                       <div class=" mb-3 col-xl-2">
                                     <input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="qty">
                                 </div>

                                   
                                <div class=" mb-3 col-xl-2">
                                     <input type="text" class="form-control" id="price" name="price[]" placeholder="Sale Price">
                                </div>

                                  
                                <div class=" mb-3 col-xl-2">
                                     <input type="text" class="form-control total" id="total" name="total[]" placeholder="Total" readonly="">
                                  </div>

                      <div class="col-sm-2">
                             <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
  $(".add-more").on('click',function(){ 

          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });  

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });   
</script>
<script type="text/javascript">
$(document).ready(function() {
$(".hide").hide();
$('div.mydiv').on("keyup",'input[name^="price"]',function(event){
	var currentRow=$(this).closest('.subdiv');
      
      var quantity =currentRow.find('input[name^="quantity"]').val();
        // alert(quantity);
          var unitprice=currentRow.find('input[name^="price"]').val();
        // alert(unitprice);
    var total = Number(quantity) * Number(unitprice);
    //alert(total);
     var total=+currentRow.find('input[name^="total"]').val(total);
      var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });
     $('.subtotal').val(sum);
});

    
});
 
</script>
</body>
</html>