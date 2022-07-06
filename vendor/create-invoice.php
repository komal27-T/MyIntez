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
<style>
{font-family: 'Segoe UI';}
th {text-align: left; font-weight: 600;}
table {border-collapse: collapse; border: 1px solid #999; width: 100%;}
table td,
table th {border: 1px solid #ccc;}
table input {max-width: 100%; border: 1px solid #ccc;}
table td:first-child input {width: 50px;}
#master {display: none;}
</style>
</head>

<body class="dashboard">
<div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div>

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

			<!--from this line i m importing -->
                    <!--div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Invoice </h4>
                            <div class="btn-group">
				<a href="#"class="btn btn-outline-primary">Send</a></div>
                        </div>
                        <div class="card-body">
                            <form class="invoice-form" action="cr_invoice.php" method="POST">
                               
                                    <div class="row justify-content-between">
                                        <div class="col-xl-3">
                                            <div class="mb-3"><label class="form-label">Invoice Name</label><input
                                            type="text" class="form-control" placeholder="Jonaed Bogdadi" name="iname">
                                            </div>
                                            <div class="mb-3"><label class="form-label">Bill To</label><input
                                            type="text" class="form-control" placeholder="Jonaed@bogdad.com" name="iemail">
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="mb-3"><label class="form-label">Date</label><input type="date"
                                             class="form-control" placeholder="21/03/2021" name="dt"></div>

                                            <div class="mb-3"><label class="form-label">Due Date</label><input
                                            type="date" class="form-control" placeholder="28/04/2021" name="ddt"></div>
                                        </div>
                                    </div>
                                    <hr>
					<!--div class="input-field"-->
<table >
  <thead>
    <tr>
      
      <th>Product</th>
      <th>Quantity</th>
      <th>Rate</th>
      <th>Amount</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr id="master">
     
      <td><input type="text" class="Product" name="name[]" /></td>
      <td><input type="text" class="Quantity" name="qty[]" /></td>
      <td><input type="text" class="Rate" name="rate[]" /></td>
      <td><input type="text" class="Amount" name="amt[]" /></td>
      <td><input type="button" value="&times;" class="del" /></td>
    </tr>
  </tbody>
  <tfoot>
     <th>Total</th>
      <td><label id="total_qty" name="total_qty">0</label> Items</td>
      <th></th>
      <td><label id="total_amt" name="total_amt">0</label> $</td>
	 <!--th><span id="total_amt" name="total_amt">0</span> $</th-->
      <th></th>
  </tfoot>

     
</table>
			<input type="button" value="Add New" id="add" />


			<center>
				<br>
				<input class="btn btn-success" type="submit" name="save" id="save" value="Save Data">
			      
			</center>			
                               <input type="text" class="span1" name="total_qty">
      				<input type="text" class="span2" name="total_amt">
 
                            </form>
				
                        <!--/div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script type="text/javascript">
		$(document).ready(function(){

$("#add").click(function () {
    // Clone the #master, remove the id from the clone and append it to body.
    $("#master").clone().removeAttr("id").appendTo("tbody");
  });
  // Attach a click event handler on table, which listens for clicks on .del.
  $("table").on("click", ".del", function () {
    // Remove the parent TR tag completely from DOM.
    $(this).closest("tr").remove();
  });
  // Attach input change event handler on table, which listens for clicks on input.
  $("table").on("input", "input", function () {
    // For every row...
    $("tbody tr").each(function () {
      // Cache the value of the current row.
      $this = $(this);
      // Do this only if this is not the master row.
      if (this.id != "master")
        // Set the value of .Amount here (making sure you set it to integer multiplying two values).
        $this.find(".Amount").val(+$this.find(".Quantity").val() * +$(this).find(".Rate").val());
      // Set the totals to 0.
      $("#total_amt, #total_qty").text(0);
      // For every .Amount, collect the values and sum it and add it to #total_amt unless it's empty.
      $(".Amount").each(function () {
        if (this.value != "")
          $("#total_amt").text(parseInt($("#total_amt").text()) + parseInt($(this).val()));
      });
      // For every .Quantity, collect the values and sum it and add it to #total_qty unless it's empty.
      $(".Quantity").each(function () {
        if (this.value != "")
          $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
      });
    });
  });
});
</script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>