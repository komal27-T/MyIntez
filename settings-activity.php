<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
 $id = $_SESSION['usr_id'];
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-title">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-4">
                                <div class="page-title-content">
                                    <h3>Activity</h3>
                                    <p class="mb-2">Welcome Intez Activity page</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Activity</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="settings-menu">
    <a href="settings-profile.php">Profile</a>
    <a href="settings-application.php">Application</a>
    <a href="settings-security.php">Security</a>
    <a href="settings-activity.php">Activity</a>
    <!-- <a href="settings-privacy.html">Privacy</a> -->
    <a href="settings-payment-method.php">Payment Method</a>
    <a href="settings-api.php">API</a>
	    <!-- <a href="settings-fees.html">Fees</a> -->
</div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Third-Party Applications </h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="me-3 icon-circle bg-warning text-white"><i
                                                class="ri-question-answer-line"></i></span>
                                        <div>
                                            <h5 class="mb-0">You haven't authorized any applications yet.
                                            </h5>
                                            <p>After connecting an application with your account, you can
                                                manage or revoke its access here.</p>
                                            <a class="btn btn-primary">Authorize now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                   <h4 class="card-title">Web Sessions</h4>
                                   <small>These sessions are currently signed in to your account. Sign out all other sessions</small>
                                </div>
                                <div class="card-body">
                                   <div class="table-responsive table-icon">
                                      <table class="table">
                                         <thead>
                                            <tr>
                                               <th>Signed In</th>
                                               <th>Browser</th>
                                               <th>IP Address</th>
                                               <th>Page Referel</th>
                                               <th>Current</th>
                                            </tr>
                                         </thead>
                                         <tbody>
					<?php   
					include 'connect.php';
					$query = "SELECT * FROM visitor_activity_logs";
				$result = mysqli_query($sql,$query);
				while($row = mysqli_fetch_assoc($result))
					{
					?>

                                            <tr>
                                               <td><?php echo $row['created_on']; ?></td>
                                               <td><?php echo $row['user_agent'] ?></td>
                                               <td><?php echo $row['user_ip_address']; ?></td>
                                               <td><?php echo $row['page_url']; ?></td>
                                               <td><span><i class="ri-check-line text-success me-1"></i></span><span><i class="ri-close-line text-danger"></i></span></td>
                                            </tr>

					<?php } ?>
                                           
                                         </tbody>
                                      </table>
                                   </div>
                                </div>
                             </div>
                             <div class="card">
                                <div class="card-header">
                                   <h4 class="card-title">Confirmed Devices</h4>
                                   <small>These devices are currently allowed to access your account. Remove all other devices</small>
                                </div>
                                <div class="card-body">
                                   <div class="table-responsive">
                                      <table class="table">
                                         <thead>
                                            <tr>
                                               <th>Confirmed</th>
                                               <th>Browser</th>
                                               <th>IP Address</th>
                                               <th>Near</th>
                                               <th>Current</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                            <tr>
                                               <td>1 day ago</td>
                                               <td>Chrome (Windows)</td>
                                               <td> 250.364.239.254</td>
                                               <td>Bangladesh, Dhaka</td>
                                               <td><span><i class="ri-check-line text-success me-1"></i></span><span><i class="ri-close-line text-danger"></i></span></td>
                                            </tr>
                                           
                                         </tbody>
                                      </table>
                                   </div>
                                </div>
                             </div>
                             <div class="card">
                                <div class="card-header">
                                   <h4 class="card-title">Account Activity</h4>
                                   <small>Recent activity on your account.</small>
                                </div>
                                <div class="card-body">
                                   <div class="table-responsive">
                                      <table class="table">
                                         <thead>
					
					
                                            <tr>
                                               <th>Action</th>
                                               <th>Source</th>
                                               <th>IP Address</th>
                                               <th>Location</th>
                                               <th>When</th>
                                            </tr>
                                         </thead>
                                         <tbody>
					<?php   
					include 'connect.php';
					$query = "SELECT * FROM visitor_activity_logs";
				$result = mysqli_query($sql,$query);
				while($row = mysqli_fetch_assoc($result))
					{
					?>
                                            <tr>
                                               <td>verified second factor</td>
                                               <td><?php echo $row['user_agent'] ?></td>
                                               <td><?php echo $row['user_ip_address']; ?></td>
                                               <td><?php echo $row['page_url']; ?></td>
                                               <td><?php echo $row['created_on']; ?></td>
                                            </tr>
                                         
					<?php } ?>



                                         </tbody>
                                      </table>
                                   </div>
                                </div>
                             </div>


                            <div class="card transparent">
                                <div class="card-header">
                                    <h4 class="card-title">Close Account</h4>
                                </div>
                                <div class="card-body">
                                    <p>Withdraw funds and close your Xtrader account - <span class="text-danger">this
                                            cannot be undone</span></p>
                                    <a href="#" class="btn btn-danger">Close Account</a>
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
</body>
</html>