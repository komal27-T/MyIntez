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
                        <h3>Notification</h3>
                        <p class="mb-2">Welcome Intez Notification page</p>
                     </div>
                  </div>
                  <div class="col-auto">
                     <div class="breadcrumbs">
                        <a href="#">
                           Home<!-- --> 
                        </a>
                        <span><i class="ri-arrow-right-s-line"></i></span><a href="#">Notification</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Recent Notification </h4>
                     </div>
                     <div class="card-body">
                        <div class="all-notification">
                           <div class="notification-list">
                              <div class="lists">
                                 <a href="#" class="">
                                    <div class="d-flex align-items-center">
                                       <span class="me-3 icon success"><i class="bi bi-check"></i></span>
                                       <div>
                                          <p>Account created successfully</p>
                                          <span>2020-11-04 12:00:23</span>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="">
                                    <div class="d-flex align-items-center">
                                       <span class="me-3 icon fail"><i class="bi bi-x"></i></span>
                                       <div>
                                          <p>2FA verification failed</p>
                                          <span>2020-11-04 12:00:23</span>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="">
                                    <div class="d-flex align-items-center">
                                       <span class="me-3 icon success"><i class="bi bi-check"></i></span>
                                       <div>
                                          <p>Device confirmation completed</p>
                                          <span>2020-11-04 12:00:23</span>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="#" class="">
                                    <div class="d-flex align-items-center">
                                       <span class="me-3 icon pending"><i class="bi bi-exclamation-triangle"></i></span>
                                       <div>
                                          <p>Phone verification pending</p>
                                          <span>2020-11-04 12:00:23</span>
                                       </div>
                                    </div>
                                 </a>
                                 <a>More</a>
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




















<script src="js/scripts.js"></script>


</body>


<!-- Mirrored from intez-html.vercel.app/notification.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jun 2021 03:46:21 GMT -->
</html>