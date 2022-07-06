<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}
$id = $_SESSION['usr_id'];


include 'connect.php';
$id = $_SESSION['usr_id'];


$data1 = '';
  $data2 = '';
  $data3 = '';

    //query to get data from the table
    $qry = "SELECT pdt, pamt, pname FROM pay WHERE usr_id = '$id' ORDER  BY pdt ";

    $result = mysqli_query($sql, $qry);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['pdt'].'",';
        $data2 = $data2 . '"'. $row['pname'] .'",';
	$data3 = $data3 . '"'. $row['pamt'] .'",';
    }
	print json_encode($data1);
	print json_encode($data2);
	print json_encode($data3);

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
     $data3 = trim($data3,",");

			?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intez</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
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
                        <h3>Payments</h3>
                        <p class="mb-2">Welcome Intez Payments page</p>
                     </div>
                  </div>
                  <div class="col-auto">
                     <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Payments</a></div>
                  </div>
               </div>
            </div>



            <div class="row">
               <div class="col-xl-8 col-lg-7">
                  <div id="user-activity" class="card" data-aos="fade-up">
                     <div class="card-header">
                        <h4 class="card-title">Expenses</h4>
                     </div>
                     <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                           <div class="chartjs-size-monitor">
                              <div class="chartjs-size-monitor-expand">
                                 <div class=""></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                 <div class=""></div>
                              </div>
                           </div>
                           <canvas id="activityBar"></canvas>
                        </div>
                     </div>
                  </div>
               </div>



<script type="text/javascript">

  var ctx = document.getElementById("activityBar").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
   data: {
        labels: [ <?php echo $data1; ?>], 
        datasets: [{
            label: 'Expenses', // Name the series
            data:[ <?php echo $data3; ?>], // Specify the data values array
            backgroundColor: [ // Specify custom colors
               'rgba(131, 162, 241 )',
                'rgba(109, 142, 187 )',
                'rgba(68, 129, 162 )',
                'rgba(55, 97, 136 )',
                'rgba(37, 71, 112 )',
                'rgba(13, 27, 76 )'
            ],
            borderColor: [ // Add custom color borders
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // Specify bar border width
        }]
    },
     options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});


</script>




               <div class="col-xl-4 col-lg-5">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Unpaid Bills</h4>
                     </div>
                     <div class="card-body">
                        <div class="unpaid-content">
				<?php
					include 'connect.php';
					$query = "SELECT * FROM pay WHERE status= 'NOT PAID' AND usr_id=$id";
					$result = mysqli_query($sql,$query);
					$cdate = date('y-m-d');
					
				?>
                           <ul>
				<?php if($row = mysqli_fetch_assoc($result)) {
						 ?>
                              <li>
                                 <p class="mb-0">Service</p>
                                 <h5 class="mb-0"><?php echo $row['pname']; ?></h5>
                              </li>
                              <li>
                                 <p class="mb-0">Issued</p>
                                 <h5 class="mb-0"><?php echo $row['pdt']; ?></h5>
                              </li>
                              <li>
                                 <p class="mb-0">Payment Due</p>
				
                                 <h5 class="mb-0"><?php echo $row['pddt']; ?></h5>
                              </li>
                              <li>
                                 <p class="mb-0">Status</p>
                                 <h5 class="mb-0"><?php echo $row['status'] ?></h5>
                              </li>
                              <li>
                                 <p class="mb-0">Amount to pay</p>
                                 <h5 class="mb-0"><?php echo $row['pamt']; ?></h5>
                              </li>
                              <li>
                                 <p class="mb-0">Payment Method</p>
                                 <h5 class="mb-0">Paypal</h5>
						
                              </li>
				
                           </ul>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Expenses</h4>
			<a class="btn btn-primary" href="payment.php"><span><i
                                        class="bi bi-plus"></i></span>Create Expenses</a>
                     </div>
                     <div class="card-body">
                        <div class="payments-content">
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       
                                       <th>Service</th>
                                       <th>Amount</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
					<?php
							include 'connect.php';
							$qry = "SELECT * FROM pay WHERE status='NOT PAID' AND usr_id=$id";
							$result = mysqli_query($sql,$qry);?>
                                    <tr>
					<?php while($data = mysqli_fetch_assoc($result))
							{?>
                                      
					

                                       <td><img src="images/avatar/3.png" alt="" width="22" class="me-3 img-fluid">
					<?php echo $data['pname']; ?></td>
                                       <td><?php echo $data['pamt'] ;?></td>
                                       <td><?php echo $data['pddt'] ;?></td>
					<?php if($data['status']=='NOT PAID'){?>
                                       <td><span class="badge px-3 py-2 bg-warning">Un-paid</span></td>
					<?php } else {?>
					  <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
					<?php } 
						?>
                                    </tr>
					
                                  

				<?php } ?>
                                 </tbody>
                              </table>
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
<script src="vendor/chartjs/chartjs.js"></script>
<!--script src="js/plugins/chartjs-bar-init.js"></script-->
<script src="js/scripts.js"></script>
<script src="js/plugins/chart.min.js"</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</body>
</html>