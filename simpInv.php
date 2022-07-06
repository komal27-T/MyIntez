<html>
<head>

	<title>Inventory System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body data-new-gr-c-s-check-loaded="14.1052.0" data-gr-ext-installed="" class="modal-open" style="">


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
	  <a class="navbar-brand" href="#" style="padding:0px;">
                    <img src="logo.png" alt="">
                </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

      	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-home"></i>  Dashboard</a></li>        
                <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>  Brand</a></li>        
				        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        
				        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li> 
				
        <li class="dropdown active" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-usd"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>            
            <li id="topNavManageOrder" class="active"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 
		
		        <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>
		 
            <li id="importbrand"><a href="importbrand.php"> <i class="glyphicon glyphicon-check"></i> Import Brand </a></li>
		   
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">    
			            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
            <li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-wrench"></i> Add User</a></li>
              
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
           
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container"><div class="div-request div-hide">manord</div>
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>Order</li>
  <li class="active">
  				Manage Order
		  </li>
</ol>


<h4>
	<i class="glyphicon glyphicon-circle-arrow-right"></i>
	Manage Order	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

					<i class="glyphicon glyphicon-edit"></i> Manage Order
		
	</div> <!--/panel-->	
	<div class="panel-body">
			
		
			<div id="success-messages"></div>
			
			<div id="manageOrderTable_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="manageOrderTable_length"><label>Show <select name="manageOrderTable_length" aria-controls="manageOrderTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="manageOrderTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="manageOrderTable"></label></div><table class="table table-hover table-striped table-bordered dataTable no-footer" id="manageOrderTable" role="grid" aria-describedby="manageOrderTable_info" style="width: 1108px;">
				<thead>
					<tr role="row"><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 27px;">#</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Order Date: activate to sort column ascending" style="width: 118px;">Order Date</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending" style="width: 160px;">Client</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Contact: activate to sort column ascending" style="width: 103px;">Contact</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Total Order Item: activate to sort column ascending" style="width: 168px;">Total Order Item</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Payment Status: activate to sort column ascending" style="width: 164px;">Payment Status</th><th class="sorting" tabindex="0" aria-controls="manageOrderTable" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 102px;">Options</th></tr>
				</thead>
			<tbody><tr role="row" class="odd"><td>11</td><td>2022-03-07</td><td>komal</td><td>8329452728</td><td>1</td><td><label class="label label-success">Full Payment</label></td><td><!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&amp;i=11" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(11)"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>

	    <li><a type="button" onclick="printOrder(11)"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder(11)"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div></td></tr><tr role="row" class="even"><td>12</td><td>2022-03-09</td><td>fgfhgh</td><td>243546</td><td>1</td><td><label class="label label-info">Advance Payment</label></td><td><!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&amp;i=12" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(12)"> <i class="glyphicon glyphicon-save"></i> Payment</a></li>

	    <li><a type="button" onclick="printOrder(12)"> <i class="glyphicon glyphicon-print"></i> Print </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder(12)"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div></td></tr></tbody></table><div class="dataTables_info" id="manageOrderTable_info" role="status" aria-live="polite">Showing 11 to 12 of 12 entries</div><div class="dataTables_paginate paging_simple_numbers" id="manageOrderTable_paginate"><a class="paginate_button previous" aria-controls="manageOrderTable" data-dt-idx="0" tabindex="0" id="manageOrderTable_previous">Previous</a><span><a class="paginate_button " aria-controls="manageOrderTable" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button current" aria-controls="manageOrderTable" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next disabled" aria-controls="manageOrderTable" data-dt-idx="3" tabindex="0" id="manageOrderTable_next">Next</a></div></div>

		

	</div> <!--/panel-->	
</div> <!--/panel-->	


<!-- edit order -->
<div class="modal fade in" tabindex="-1" role="dialog" id="paymentOrderModal" style="display: block; padding-left: 17px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Edit Payment</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;">

      	<div class="paymentOrderMessages"></div>

      	     				 				 
			  <div class="form-group">
			    <label for="due" class="col-sm-3 control-label">Due Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="due" name="due" disabled="true">					
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="payAmount" class="col-sm-3 control-label">Pay Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="payAmount" name="payAmount">					      
			    </div>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentType" id="paymentType">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Cheque</option>
			      	<option value="2">Cash</option>
			      	<option value="3">Credit Card</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentStatus" id="paymentStatus">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Full Payment</option>
			      	<option value="2">Advance Payment</option>
			      	<option value="3">No Payment</option>
			      </select>
			    </div>
			  </div> <!--/form-group-->							  				  
      	        
      </div> <!--/modal-body-->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->


<script src="custom/js/order.js"></script>

</div> <!-- container -->
	

	<!-- file input -->
	<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>	


	<!-- DataTables -->
	<script src="assests/plugins/datatables/jquery.dataTables.min.js"></script>




	<div class="modal-backdrop fade in"></div></body></html>