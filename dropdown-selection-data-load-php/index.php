<?php 
include('include/header.php');
include_once("include/db_connect.php");
?>
<html>
<title>Drop-down Selection Data Load with ajax, PHP & MySQL</title>
<script type="text/javascript" src="script/getData.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(function(){
  $("#main-wrapper").load("comon.php");
  $(".sidebar").load("sidebar.php"); }); 
</script> 
<?php include('include/container.php');?>
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
                <div class="breadcrumbs"><a href="#">Home </a>
                	<span><i class="ri-arrow-right-s-line"></i></span>
                	<a href="#">Make Payment</a>
                </div>
              </div>
         </div>
       </div>
    </div>
  </div>
	
	
	<form class="invoice-form" id="insert-form" method="POST" action="mpayment.php">
				<div class="row justify-content-between">
            <div class="col-xl-3">
                	<div class="mb-3">
                		<label class="form-label">Service Name</label>







	<div class="page-header">
        <h3>
			<select id="employee" class="form-control " >
				<option value="" selected="selected">Select Employee Name</option>
				<?php
				$query = "SELECT pid, pname,pamt, pdt FROM pay";
				$resultset = mysqli_query($sql, $query);
				while( $rows = mysqli_fetch_assoc($resultset) ) { 
				?>
				<option value="<?php echo $rows["pid"]; ?>"><?php echo $rows["pname"]; ?></option>
				<?php }	?>
			</select>
        </h3>	
    </div>	
	























	<div class="hidden" id="errorMassage"></div>
	<table class="table table-striped hidden" id="recordListing">
		<thead>
		  <tr>
			<th>Id</th>
			<th>Name</th>
			<th>Age</th>
			<th>Salary</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td id="empId"></td>
			<td id="empName"></td>
			<td id="empAge"></td>
			<td id="empSalary"></td>
		  </tr>
		</tbody>			
	</table>       
</div>






<?php include('include/footer.php');?>
</body>
</html>