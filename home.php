<?php
   session_start();
   if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
       header("Location: signin.php");
       die();  
   
   }
   
   include 'connect.php';
   $id = $_SESSION['usr_id'];
   
   
   $data1 = '';
   $data2 = '';
   $data3 = '';
   
       //query to get data from the table
       $qry = "SELECT pdt, pamt, pname FROM pay WHERE usr_id = '$id' ORDER  BY pdt ";
   
       $result = mysqli_query($sql, $qry)or die( mysqli_error($sql));;
   
       //loop through the returned data
       while ($row = mysqli_fetch_array($result)) {
   
           $data1 = $data1 . '"'. $row['pdt'].'",';
           $data2 = $data2 . '"'. $row['pamt'] .'",';
    $data3 = $data3 . '"'. $row['pname'] .'",';
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
      <!-- Custom Stylesheet -->
      <link rel="stylesheet" href="css/style.css">
      <!-- to include sidebar-->    
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
      <script> 
         $(function(){
           $("#main-wrapper").load("comon.php");
           $(".sidebar").load("sidebar.php");      
         
          
         });
      </script>  
      <script>
         $(document).ready(function() {
            
            var text3=0;
            //var bno = document.getElementById('camt').val;
            var text1 = document.querySelector('.bamt').textContent;
            var text2 = document.querySelector('.camt').textContent;
            //alert(text1);
            var text3 = (+text1) + (+text2);
            //alert(text3); 
            document.getElementById('result').innerHTML = text3;
            }); 
      </script>
      <style type="text/css">
         .list-group{
    max-height: 300px;
   /* margin-bottom: 10px;*/
    overflow:auto;
   
      </style>
   </head>
   <body class="dashboard" >
      <div id="main-wrapper"></div>
      <div class="sidebar"></div>
      <div class="content-body">
         <div class="container">
            <div class="page-title">
               <div class="row align-items-center justify-content-between">
                  <div class="col-xl-4">
                     <div class="page-title-content">
                        <h3>Dashboard</h3>
                        <p class="mb-2">Welcome Intez Dashboard</p>
                     </div>
                  </div>
                  <div class="col-auto">
                     <div class="breadcrumbs"><a href="#">Home </a><span><i
                        class="ri-arrow-right-s-line"></i></span><a href="#">Dashboard</a></div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-6 col-lg-6">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Stats</h4>
                     </div>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <div class="stat-widget d-flex align-items-center">
                                 <div class="widget-icon me-3 bg-primary">
                                    <span><i class="ri-wallet-line"></i></span>
                                 </div>
                                 <div class="widget-content">
                                    <h3 id="result">  </h3>
                                    <p>Total Balance</p>
                                 </div>
                              </div>
                           </div>
                           <?php
                              $query = "SELECT Iname FROM invoice WHERE usr_id = '$id'";
                              $result = mysqli_query($sql,$query);
                              if($result)
                              ?>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <div class="stat-widget d-flex align-items-center">
                                 <div class="widget-icon me-3 bg-secondary">
                                    <span><i class="ri-wallet-2-line"></i></span>
                                 </div>
                                 <div class="widget-content">
                                    <?php 
                                       $query = "SELECT SUM(Balance)as Balance FROM bank WHERE usr_id = '$id' ";
                                        $result = mysqli_query($sql,$query);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                    <h3><label id="bamt" class="bamt"><?php echo $row['Balance']; ?></label></h3>
                                    <p>Bank Balance</p>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <div class="stat-widget d-flex align-items-center">
                                 <div class="widget-icon me-3 bg-success">
                                    <span><i class="ri-wallet-3-line"></i></span>
                                 </div>
                                 <div class="widget-content">
                                    <?php 
                                       $query = "SELECT SUM(Balance)as Balance FROM card WHERE usr_id = '$id' ";
                                        $result = mysqli_query($sql,$query);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                    <h3><label id="camt" class="camt"><?php echo $row['Balance']; ?></label></h3>
                                    <p>Card Balance</p>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                              <div class="stat-widget d-flex align-items-center">
                                 <div class="widget-icon me-3 bg-danger">
                                    <span><i class="ri-wallet-3-line"></i></span>
                                 </div>
                                 <div class="widget-content">
                                    <?php 
                                       $query = "SELECT SUM(pamt)as Balance FROM pay WHERE usr_id = '$id' ";
                                       $result = mysqli_query($sql,$query);
                                       while($row = mysqli_fetch_assoc($result))
                                       {
                                       ?>
                                    <h3><?php echo $row['Balance'];  ?></h3>
                                    <p>Total Expenses</p>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div id="user-activity" class="card" data-aos="fade-up">
                     <div class="card-header">
                        <h4 class="card-title">Expenses</h4>
                     </div>
                     <div class="card-body">
                        <div class="chartjs-size-monitor">
                           <div class="chartjs-size-monitor-expand">
                              <div class=""></div>
                           </div>
                           <div class="chartjs-size-monitor-shrink">
                              <div class=""></div>
                           </div>
                        </div>
                        <canvas id="activity"></canvas>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  var ctx = document.getElementById("activity").getContext('2d');
                  
                  // End Defining data
                  var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [ <?php echo $data1; ?>],
                        datasets: [{
                            label: 'Expenses', // Name the series
                            data:[ <?php echo $data2; ?>], // Specify the data values array
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
               <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Unpaid Bills</h4>
                     </div>
                     <?php
                        include 'connect.php';
                        $qry = "SELECT pname, pdt, pddt, status, pamt FROM pay WHERE usr_id=$id";
                        $result = mysqli_query($sql,$qry);?>
                     <div class="card-body">
                        <div class="unpaid-content">
                           <ul>
                              <?php if($row = mysqli_fetch_assoc($result)){
                                 $cdate = date('Y-m-d');        
                                 //$ddate = $row['pddt'];
                                 //$diff = $ddate->diff($cdate); 
                                 
                                    if($cdate>$row['pddt']){
                                        
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
                                 <p class="mb-0">Paid</p>
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
                              <?php 
                                 }
                                 ?>  
                           </ul>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12">
                  <div class="row">
                     <div class="col-xl-12 col-lg-12">
                        <div class="credit-card visa">
                           <div class="type-brand">
                              <h4>Debit Card</h4>
                              <img src="images/cc/visa.png" alt="">
                           </div>
                           <div class="cc-number">
                              <h6>1234</h6>
                              <h6>5678</h6>
                              <h6>7890</h6>
                              <h6>9875</h6>
                           </div>
                           <div class="cc-holder-exp">
                              <h5>Saiful Islam</h5>
                              <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-12 col-lg-12">
                        <div class="credit-card payoneer">
                           <div class="type-brand">
                              <h4>Debit Card</h4>
                              <img src="images/cc/payoneer.png" alt="">
                           </div>
                           <div class="cc-number">
                              <h6>1234</h6>
                              <h6>5678</h6>
                              <h6>7890</h6>
                              <h6>9875</h6>
                           </div>
                           <div class="cc-holder-exp">
                              <h5>Saiful Islam</h5>
                              <div class="exp"><span>EXP:</span><strong>12/21</strong></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <div class=" col-xxl-4 col-xl-4 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bank Balance </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="total-balance">
                <?php 
                $query = "SELECT SUM(Balance)as Balance FROM bank WHERE usr_id='$id' ";
                $result = mysqli_query($sql,$query);
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                                        <p>Total Balance</p>
                                        <h2><label><?php echo $row['Balance']; ?></label></h2>
                <?php } ?>
                                    </div>
                                </div>

                <?php
                include 'connect.php';
                $query = "SELECT date_format(pdt,'%Y-%M') as yyyymm, SUM(pamt) as sum                     FROM pay   
            WHERE date_format(pdt,'%Y-%m') < date_format(now(),'%Y-%m') and                       date_format(pdt,'%Y-%m') >= date_format(now() - interval 1 month,'%Y-%m')             AND usr_id = $id
            GROUP BY date_format(pdt,'%Y-%m')           
            ORDER BY sum, yyyymm DESC";
                /* SELECT SUM(Balance)as Balance FROM bank WHERE usr_id = '$id' ";*/
                $result = mysqli_query($sql,$query);
                if(!$result)
                {
                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                elseif(mysqli_num_rows($result)>0){
                
                while($row = mysqli_fetch_assoc($result)){
                ?>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                
                                    <div class="balance-stats active">
                                        <p>Last Month</p>
                                         <h5><?php echo $row['yyyymm']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats">
                                        <p>Total Invoice
                                        </p>
                                        <h3><?php echo $row['sum']; ?> </h3>
                                    </div>
                                </div>
                <?php } ?>
                <?php } ?>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <?php
                include 'connect.php';
            $query = "SELECT date_format(Date,'%Y-%M') as yyyymm, SUM(Total) as sum                         FROM invoice    
                WHERE date_format(Date,'%Y-%m') < date_format(now(),'%Y-%m') and                            date_format(Date,'%Y-%m') >= date_format(now() - interval 1 month,'%Y-%m')                  AND usr_id = $id
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


                                    <div class="balance-stats">
                                        <p>Last Month</p>
                                       <h5><?php echo $row['yyyymm']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="balance-stats">
                                        <p>Total Expense</p>
                                        <h5><?php echo $row['sum']; ?></h5>
                                    </div>
                    <?php } ?>
                               
                <?php } ?>
                                </div>
                
                            </div>


                        </div>
                    </div>
                </div>



               <div class=" col-xxl-4 col-xl-4 col-lg-6 col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                     </div>
                     <div class="card-body">
                        <div class="chartjs-size-monitor">
                           <div class="chartjs-size-monitor-expand">
                              <div class=""></div>
                           </div>
                           <div class="chartjs-size-monitor-shrink">
                              <div class=""></div>
                           </div>
                        </div>
                        <canvas id="most-selling-items"></canvas>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  var ctx = document.getElementById("most-selling-items").getContext('2d');
                  
                  
                  // Define the data 
                  // Define the data 
                  
                  
                  //var labels = ["Tokyo",  "Mumbai",   "Mexico City",  "Shanghai", "Sao Paulo",    "New York", //"Karachi","Buenos Aires", "Delhi","Moscow"]; // Add labels to array
                  //End Defining data
                  
                  // End Defining data
                  var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [ <?php echo $data3; ?>],
                        datasets: [{
                            label: 'Expenses', // Name the series
                            data:[ <?php echo $data2; ?>], // Specify the data values array
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
               <div class="col-xl-4 col-lg-6 col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Expense History</h4>
                     </div>
                     <div class="card-body"> 
                        <div class="invoice-content">
                           <?php    
                                 
                              $query = "SELECT * FROM pay WHERE usr_id = $id GROUP BY pdt";
                                        $result = mysqli_query($sql,$query);?>
                           <ul class="list-group">
                           <?php  while($data = mysqli_fetch_assoc($result))
                                        {   ?>
                              <li class="d-flex justify-content-between active">
                                 <div class="d-flex align-items-center">
                                    <div class="invoice-user-img me-3"><img src="images/avatar/3.png" alt=""
                                       width="50"></div>
                                    <div class="invoice-info">
                                       <h5 class="mb-0"><?php echo $data['pname']; ?></h5>
                                       <p><?php echo $data['pddt']; ?></p>
                                    </div>
                                 </div>
                                 <div class="text-end">
                                    <h5 class="mb-2"><?php echo $data['pamt']; ?></h5>
                                     <?php if($data['status']=='NOT PAID'){?>
                                    <span class="text-white bg-warning">Unpaid</span>
                                    <?php } else {?>
                                    <span class=" text-white bg-success">Paid</span>
                                     <?php } ?>
                                 </div>
                                 <?php }?>
                              </li>
                             
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Invoice History</h4>
                     </div>
                     <div class="card-body"> 
                        <div class="invoice-content">
                           <?php    
                              $query = "SELECT * FROM invoice WHERE usr_id = $id                 GROUP BY Ddate";
                                    $result = mysqli_query($sql,$query);?>
                                    
                           <ul class="list-group">
                            <?php
                           while($data = mysqli_fetch_assoc($result))
                                    {   ?>
                              <li class="d-flex justify-content-between active">
                                 <div class="d-flex align-items-center">
                                    <div class="invoice-user-img me-3"><img src="images/avatar/3.png" alt=""
                                       width="50"></div>
                                    <div class="invoice-info">
                                       <h5 class="mb-0"><?php echo $data['Iname']; ?></h5>
                                       <p><?php echo $data['Ddate']; ?></p>
                                    </div>
                                 </div>
                                 <div class="text-end">
                                    <h5 class="mb-2"><?php echo $data['Total']; ?></h5>
                                    <?php if($data['status']=='NOT PAID'){?>
                                    <span class="text-white bg-warning">Unpaid</span>
                                    <?php } else {?>
                                    <span class=" text-white bg-success">Paid</span>
                                     <?php } ?>
                                 </div>
                                <?php }?>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
      </div>
      </div>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/chartjs/chartjs.js"></script>
      <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="js/plugins/perfect-scrollbar-init.js"></script>
      <script src="js/plugins/js/plugins/chart.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </body>
</html>