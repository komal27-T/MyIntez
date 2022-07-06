
<link rel="icon" href="uploadImage/Logo/logo.png" type="image/x-icon">
<link href="files/assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">



<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">



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
                     <h3>Wallet</h3>
                     <p class="mb-2">Welcome Intez Wallet page</p>
                  </div>
               </div>
               <div class="col-auto">
                  <div class="breadcrumbs">
                     <a href="#">
                        Home
                     </a>
                     <span><i class="ri-arrow-right-s-line"></i></span><a href="#">Wallet</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6">

<div class="page-body">


<div class="card">
<div class="card-block">
<form class="form-valide" method="POST" name="userform" enctype="multipart/form-data">

                                        <div class="row">
                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-3 control-label">Build Date:</label>
                                                <div class="col-sm-9">
                                                  <input type="date" name="build_date" class="form-control datepicker" value="08/16/2021" data-provide="datepicker">
                                                  <!--<input type="text" name="build_date" class="form-control" data-provide="" value="08/16/2021" readonly>-->
                                                </div>
                                        </div>

                                      
                                        <div class="form-group row col-md-6">
                                                <label class="col-sm-3 control-label">Customer</label>
                                                <div class="col-sm-9">
                                                   <input type="text" name="customer_name" class="form-control">
                                                </div>
                                        </div>
                                    </div>
                                        
                                          <div class="form-group row">

                                           <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                 Product
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            Quantity
                                            </div>

                                            <div class="col-sm-2">
                                           Sale Price
                                            </div>

                                            <div class="col-sm-2">
                                              Total
                                            </div>
                                         </div>
                                         <div class="mydiv">
                                        <div class="form-group row control-group after-add-more subdiv">

                                           <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                   <select name="select_services[]" class="form-control select_services">
                                     <option value="">--SelectProduct--</option>
                                      
                                        <option value="2">Headphones</option>
                                     
                                        <option value="1">Laptop</option>
                                                                      </select>
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Qty" required>
                                            </div>

                                            <div class="col-sm-2">
                                           <input type="text" class="form-control" id="unit_price" name="unit_price[]" placeholder="Sale Price" required>
                                            </div>

                                            <div class="col-sm-2">
                                           <input type="text" class="form-control total" id="total" name="total[]" placeholder="Total" readonly="" >
                                            </div>

                                            <div class="col-sm-2">
                                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                            </div>
                                         </div>
                                  
                                      </div>

                              <div class="form-group row">
                                  <label class="col-sm-6 control-label">Total</label>
                                  <div class="col-sm-3">
                                      <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" readonly="">
                                  </div>
                             </div> 
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

                             <div class="col-sm-3">
                                <div class="col-sm-12">
                                   <select name="select_services[]" class="form-control select_services">
                                     <option value="">--SelectProduct--</option>
                                      
                                        <option value="2">Headphones</option>
                                     
                                        <option value="1">Laptop</option>
                                                                      </select>
                                </div>
                        </div>

                       <div class="col-sm-2">
                      <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Qty">
                      </div>

                      <div class="col-sm-2">
                     <input type="text" class="form-control" id="unit_price" name="unit_price[]" placeholder="Sale Price">
                      </div>

                      <div class="col-sm-2">
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

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<footer class="footer text-center" ><marquee behavior="alternate">© 2020 Developed by <a href="https://nikhilbhalerao.com/"  target="_blank" style="color: white;">Nikhil Bhalerao +91 94239 79339            
</a></marquee></footer> 

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->  
    </div>
  


<script type="text/javascript" src="vendor/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="vendor/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
<script src="files/assets/js/pcoded.min.js"></script>
<script src="files/assets/js/vartical-layout.min.js"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="files/assets/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="files/assets/js/script.min.js"></script>
<script type="text/javascript" src="files/assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>
</body>
</html>
<!--  Author Name: Nikhil Bhalerao - www.nikhilbhalerao.com 
PHP, Laravel and Codeignitor Developer -->
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
$('div.mydiv').on("keyup",'input[name^="unit_price"]',function(event){
          var currentRow=$(this).closest('.subdiv');
          var quantity =currentRow.find('input[name^="quantity"]').val();
          //alert(quantity);
          var unitprice=currentRow.find('input[name^="unit_price"]').val();
         //alert(unitprice);
        
          var total = Number(quantity) * Number(unitprice);
          var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });
 $('#subtotal').val(sum);
$('#final_total').val(sum);
var sub_text = $('#subtotal').val();
var disc=$("#view_discount").val();
var sub_total = Number(sub_text)- Number(disc) ; 
$("#final_total").val(sub_total);
     });
     
     $('div.mydiv').on("keyup",'input[name^="quantity"]',function(event){
          var currentRow=$(this).closest('.subdiv');
          var quantity =currentRow.find('input[name^="quantity"]').val();
          //alert(quantity);
          var unitprice=currentRow.find('input[name^="unit_price"]').val();
         //alert(unitprice);
        
          var total = Number(quantity) * Number(unitprice);
          var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });
 $('#subtotal').val(sum);
$('#final_total').val(sum);

var sub_text = $('#subtotal').val();
var disc=$("#view_discount").val();
var sub_total = Number(sub_text)- Number(disc) ; 
$("#final_total").val(sub_total);

var tot_commi = 0;
});

$('form').on("keyup",'input[name="advanced_amount"]',function(argument) {
var final_total = $('#final_total').val();
//alert(final_total);
var advanced_amount = $(this).val();
//alert(advanced_amount);
if(Number(advanced_amount) >  Number(final_total)){
alert('Your Amount is greater than:'+final_total);
$("#advanced_amount").val("");
}
else {
var cust_amt = Number(final_total)  -  Number(advanced_amount);
//alert(cust_amt);
var cust_pending = $("#pending_amount").val(cust_amt);
}

  });
});



 $('div.mydiv').on("change",'select[name^="select_services"]',function(event){
            var currentRow=$(this).closest('.subdiv');
            var drop_services= $(this).val();
            $.ajax({
                type : "POST",
                url  : 'ajax_service.php',
                data : {drop_services:drop_services },
                success: function(data){
                    currentRow.find('input[name^="quantity"]').val(1);
                    currentRow.find('input[name^="unit_price"]').val(data);
                    var quantity =currentRow.find('input[name^="quantity"]').val();
                  var unitprice=currentRow.find('input[name^="unit_price"]').val();
                  var total = parseInt(quantity) * parseInt(unitprice);
                  currentRow.find('input[name^="total"]').val(total);
                   //var total=+currentRow.find('input[name^="total"]').val(total);
         // $('#subtotal').val(total);
    var sum = 0;
    $('.total').each(function() {
        if($(this).val()!='')
        {
            sum += parseInt($(this).val());
        }
        
    });
    
var sub = $('#subtotal').val(sum);
var fsub = $('#final_total').val(sum);

var tot_commi = 0;
                }
            });
            
        });
        
</script>