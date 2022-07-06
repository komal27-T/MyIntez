
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
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-xl-4">
                                    <div class="page-title-content">
                                        <h3>API</h3>
                                        <p class="mb-2">Welcome Intez API page</p>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">API</a></div>
                                </div>
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
    <!-- <a href="settings-privacy.php">Privacy</a> -->
    <a href="settings-payment-method.php">Payment Method</a>
    <a href="settings-api.php">API</a>
    <!-- <a href="settings-fees.php">Fees</a> -->
</div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Create API Key</h4>
                                </div>
                                <div class="card-body">
                                    <form action="#">
                                        <div class="row g-3">
                                            <div class="col-xl-6 col-md-6">
                                                <label class="form-label">Generate New Key</label>
                                                <input type="text" name="usd_amount" class="form-control"
                                                    placeholder="Enter Passphrase">
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <label class="form-label">Confirm Passphrase</label>
                                                <input type="text" name="usd_amount" class="form-control"
                                                    placeholder="Re-enter passphrase">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-primary">Create API Keys</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Your API Keys</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive api-table">
                                        <table class="table">
                                            <thead>
                                               <tr>
                                                  <th>Key</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                               <tr>
                                                  <td>69e387f1-31c3-45ad-9c68-5a51e5e78b43</td>
                                                  <td>
                                                     <div class="form-check form-switch"><input type="checkbox" class="form-check-input" checked=""></div>
                                                  </td>
                                                  <td><span><i class="ri-delete-bin-line"></i></span></td>
                                               </tr>
                                               <tr>
                                                  <td>69e387f1-31c3-45ad-9c68-5a51e5e78b43</td>
                                                  <td>
                                                     <div class="form-check form-switch"><input type="checkbox" class="form-check-input"></div>
                                                  </td>
                                                  <td><span><i class="ri-delete-bin-line"></i></span></td>
                                               </tr>
                                               <tr>
                                                  <td>69e387f1-31c3-45ad-9c68-5a51e5e78b43</td>
                                                  <td>
                                                     <div class="form-check form-switch"><input type="checkbox" class="form-check-input"></div>
                                                  </td>
                                                  <td><span><i class="ri-delete-bin-line"></i></span></td>
                                               </tr>
                                               <tr>
                                                  <td>69e387f1-31c3-45ad-9c68-5a51e5e78b43</td>
                                                  <td>
                                                     <div class="form-check form-switch"><input type="checkbox" class="form-check-input"></div>
                                                  </td>
                                                  <td><span><i class="ri-delete-bin-line"></i></span></td>
                                               </tr>
                                               <tr>
                                                  <td>69e387f1-31c3-45ad-9c68-5a51e5e78b43</td>
                                                  <td>
                                                     <div class="form-check form-switch"><input type="checkbox" class="form-check-input"></div>
                                                  </td>
                                                  <td><span><i class="ri-delete-bin-line"></i></span></td>
                                               </tr>
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
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>