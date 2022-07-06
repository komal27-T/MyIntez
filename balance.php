<?php
session_start();
   if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
       header("Location: signin.php");
       die();  
   }
      
   include 'connect.php';
   $id = $_SESSION['usr_id'];
      //$query = "SELECT * FROM bank, card WHERE bank.usr_id = card.usr_id AND ";
   $data1 = '';
     $data2 = '';
     $data3 = '';
   
       //query to get data from the table
       $qry = "SELECT Iname, Date, Total FROM invoice WHERE usr_id = '$id' ORDER  BY Date ";
   
       $result = mysqli_query($sql, $qry);
   
       //loop through the returned data
       while ($row = mysqli_fetch_array($result)) {
   
           $data1 = $data1 . '"'. $row['Iname'].'",';
           $data2 = $data2 . '"'. $row['Date'] .'",';
      $data3 = $data3 . '"'. $row['Total'] .'",';
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
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script>
      $(function() {
         $("#main-wrapper").load("comon.php");
         $(".sidebar").load("sidebar.php");
      });
      </script>
      <style type="text/css">
      .scroll-bar {
         max-height: 290px;
         overflow: auto;
      }
      </style>
   </head>

<body class="dashboard">

<!--div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div-->
<div id="main-wrapper"></div>
 <div class="sidebar"> </div>

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
            <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Balance Details</h4>
                        </div>
                        <div class="card-body">
                           <div class="col-12">
                              <div class="total-balance">
                                 <?php 
                                    include 'connect.php';
                                    $query = $query = "SELECT bank.Balance + card.Balance AS Total
                                    FROM bank, card
                                    WHERE bank.usr_id = '{$_SESSION['usr_id']}' AND 
                                    card.usr_id = '{$_SESSION['usr_id']}'";
                                    
                                    $result = mysqli_query($sql,$query);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    
                                    ?>
                                    <p>Total Balance</p>
                                    <h2><?php echo $row['Total'] ?></h2>
                                    <?php } ?>
                              </div>
                           </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <?php
                                 include 'connect.php';
                                 $query = "SELECT date_format(pdt,'%Y-%M') as yyyymm, SUM(pamt) as sum                      FROM pay   
                                 WHERE date_format(pdt,'%Y-%m') < date_format(now(),'%Y-%m') and                             date_format(pdt,'%Y-%m') >= date_format(now() - interval 1 month,'%Y-%m')                   AND usr_id = $id
                                 GROUP BY date_format(pdt,'%Y-%m')           
                                 ORDER BY sum, yyyymm DESC;";
                                 
                                 $result = mysqli_query($sql,$query); 
                                 if(!$result)
                                 {
                                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                 }
                                 elseif(mysqli_num_rows($result)>0){
                                 
                                 while($row = mysqli_fetch_assoc($result)){
                                 ?>
                                 <div class="widget-content">
                                    <p>Last Month</p>
                                    <h3><?php echo $row['yyyymm']; ?></h3> 
                                 </div>
                              </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <div class="widget-content">
                                            <p>Total Expense</p>
                                            <h3><?php echo $row['sum']; ?></h3><?php } ?> 
                                        </div><?php } ?>
                                     </div>
                                </div>   
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                 <?php
                                 include 'connect.php';
                                 $query = "SELECT date_format(Date,'%Y-%M') as yyyymm, SUM(Total) as sum                      FROM invoice   
                                 WHERE date_format(Date,'%Y-%m') < date_format(now(),'%Y-%m') and                             date_format(Date,'%Y-%m') >= date_format(now() - interval 1 month,'%Y-%m')                   AND usr_id = $id
                                 GROUP BY date_format(Date,'%Y-%m')           
                                 ORDER BY sum, yyyymm DESC";
                                 
                                 $result = mysqli_query($sql,$query); 
                                 if(!$result)
                                 {
                                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                 }
                                 elseif(mysqli_num_rows($result)>0){
                                 
                                 while($row = mysqli_fetch_assoc($result)){
                                 ?>
                                        <div class="widget-content">
                                            <p>Last Month</p>
                                    <h3><?php echo $row['yyyymm']; ?></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <div class="widget-content">
                                            <p>Total Invoices</p>
                                           <h3><?php echo $row['sum']; ?></h3> <?php } ?>
                                        </div><?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xxl-6 col-xl-6 col-lg-6">
                      <div class="card">
                           <div class="card-header">
                              <h4 class="card-title">Bills</h4> <a href="#">See More</a> 
                           </div>
                             <?php 
                              include 'connect.php';
                              $query = "SELECT * FROM pay WHERE status='NOT PAID' AND usr_id=$id";
                                    $result = mysqli_query($sql,$query);?>
                           <div class="card-body">
                               <?php   while($data = mysqli_fetch_assoc($result))
                                    {  ?>
                              <div class="bills-widget scroll-bar" id="bill">
                                 
                                    <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                                 <div>
                                    <p>
                                       <?php echo $data['pname'];?>
                                    </p>
                                    <h4><?php echo $data['pamt'];?></h4> </div>
                                 <div>
                                    <button type="button" class="btn btn-primary" id="btnModalPopup" data-toggle="modal" data-target="#myModal" data-id="<?php echo $data['pid'];?>">Pay Now</button> 
                                 </div>
                              </div>
                              </div><br><?php } ?>
                           </div>
                      </div>
                       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <form method="POST" action="PayUpdate.php">
                                          <div class="modal-header">
                                             <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i> Edit Payment</h4> </div>
                                          <div class="modal-body form-horizontal">
                                             <div class="paymentOrderMessages"></div>
                                             <div class="form-group">
                                                <label for="payid" class="col-sm-3 control-label">Payment Id</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" id="payid" name="payid" /> </div>
                                             </div>
                                             <div class="form-group">
                                                <label for="due" class="col-sm-3 control-label">Due Amount</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" id="due" name="due" disabled="true" value="" /> </div>
                                             </div>
                                             <!--/form-group-->
                                             <div class="form-group">
                                                <label for="payAmount" class="col-sm-3 control-label">Pay Amount</label>
                                                <div class="col-sm-9">
                                                   <input type="text" class="form-control" id="payAmount" name="payAmount" /> </div>
                                             </div>
                                             <div class="form-group">
                                                <label for="type" class="col-sm-3 control-label">Pay Type</label>
                                                <div class="col-sm-9">
                                                   <!--label for="sel1">Select list:</label-->
                                                   <select class="form-control sel1" name="sel1" id="sel1">
                                                      <option>--Select--</option>
                                                      <option value="bank">Bank</option>
                                                      <option value="card">Card</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="display" id="display"></div>
                                          </div>
                                          <!--/modal-body-->
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                                             <input type="submit" name="update" id="insert" value="Pay" class="btn btn-primary" /> </div> </form>
                                    </div>
                                    <!-- /.modal-content -->
                                 </div>
                                 <!-- /.modal-dialog -->
                              </div>
                 </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="card-title">Invoices</h4> </div>
                        <div class="card-body">
                           <div class="chartjs-size-monitor">
                              <div class="chartjs-size-monitor-expand">
                                 <div class=""></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                 <div class=""></div>
                              </div>
                           </div>
                           <canvas id="transaction-graph"></canvas>
                        </div>
                     </div>
                  </div>
                  <script type="text/javascript">
                  var ctx = document.getElementById("transaction-graph").getContext('2d');
                  var myChart = new Chart(ctx, {
                     type: 'line',
                     data: {
                        labels: [<?php echo $data1; ?>],
                        datasets: [{
                           label: 'Invoices', // Name the series
                           data: [<?php echo $data3; ?>], // Specify the data values array
                           backgroundColor: [ // Specify custom colors
                              'rgba(131, 162, 241 )', 'rgba(109, 142, 187 )', 'rgba(68, 129, 162 )', 'rgba(55, 97, 136 )', 'rgba(37, 71, 112 )', 'rgba(13, 27, 76 )'
                           ],
                           borderColor: [ // Add custom color borders
                              'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
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
                 <div class=" col-xxl-6 col-xl-6 col-lg-6">
                     <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                           <div class="credit-card visa">
                              <div class="type-brand">
                                 <h4>Debit Card</h4> <img src="images/cc/visa.png" alt=""> </div>
                              <div class="cc-number">
                                 <h6>1234</h6>
                                 <h6>5678</h6>
                                 <h6>7890</h6>
                                 <h6>9875</h6> </div>
                              <div class="cc-holder-exp">
                                 <h5>Saiful Islam</h5>
                                 <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                              </div>
                              <div class="cc-info">
                                 <div class="row justify-content-between align-items-center">
                                    <div class="col-5">
                                       <div class="d-flex">
                                          <p class="me-3">Status</p>
                                          <p><strong>Active</strong></p>
                                       </div>
                                       <div class="d-flex">
                                          <p class="me-3">Currency</p>
                                          <p><strong>USD</strong></p>
                                       </div>
                                    </div>
                                    <div class="col-xl-7">
                                       <div class="d-flex justify-content-between">
                                          <div class="ms-3">
                                             <p>Credit Limit</p>
                                             <p><strong>2000 USD</strong></p>
                                          </div>
                                          <div id="circle1"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                           <div class="credit-card payoneer">
                              <div class="type-brand">
                                 <h4>Debit Card</h4> <img src="images/cc/payoneer.png" alt=""> </div>
                              <div class="cc-number">
                                 <h6>1234</h6>
                                 <h6>5678</h6>
                                 <h6>7890</h6>
                                 <h6>9875</h6> </div>
                              <div class="cc-holder-exp">
                                 <h5>Saiful Islam</h5>
                                 <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                              </div>
                              <div class="cc-info">
                                 <div class="row">
                                    <div class="col-5">
                                       <div class="d-flex">
                                          <p class="me-3">Status</p>
                                          <p><strong>Active</strong></p>
                                       </div>
                                       <div class="d-flex">
                                          <p class="me-3">Currency</p>
                                          <p><strong>USD</strong></p>
                                       </div>
                                    </div>
                                    <div class="col-xl-7">
                                       <div class="d-flex justify-content-between">
                                          <div class="ms-3">
                                             <p>Credit Limit</p>
                                             <p><strong>1500/2000 USD</strong></p>
                                          </div>
                                          <div id="circle3"></div>
                                       </div>
                                    </div>
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
      <script src="js/scripts.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
         $(document).on('click', '#btnModalPopup', function() {
            var employee_id = $(this).data("id");
            console.log(employee_id, "hello...")
            $.ajax({
               url: "fetchPay.php",
               method: "POST", 
               data: {
                  employee_id: employee_id
               },
               dataType: "json",
               success: function(data) {
                  console.log(data);
                  $('#payid').val(data.pid);
                  $('#due').val(data.pamt);
                  $('#payAmount').val(data.pamt);
                  $('#add_data_Modal').modal('show');
               }
            });
         });
        $("#insert").click(function(){
          $("#bill").empty();
          });
      });
      </script>
</body>
</html>