<?php
	session_start();
	if(!isset($_SESSION)) {
	
        header("Location: signin.php");
    }
	$id = $_SESSION['usr_id'];
	$name = $_SESSION['usr_name'];
	
	
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
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Profile</h3>
				
                            <p class="mb-2">Welcome Intez Profile page</p>
				
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs">
                            <a href="#">
                                Home
                                <!-- -->
                            </a>
                            <span><i class="ri-arrow-right-s-line"></i></span><a href="#">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="card welcome-profile">
                        <div class="card-body">
                            <img src="images/profile/3.png" alt="">
				
                            <h4>Welcome, <?php echo $name; ?>  !</h4>
				
				
                            <p>Looks like you are not verified yet. Verify yourself to use the full potential of
                                Xtrader.</p>
                            <ul>
                                <li><a href="#"><span class="verified"><i class="ri-check-line"></i></span>Verify
                                        account</a></li>
                                <li><a href="#"><span class="not-verified"><i
                                                class="ri-shield-check-line"></i></span>Two-factor authentication
                                        (2FA)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Download App</h4>
                        </div>
                        <div class="card-body">
                            <div class="app-link">
                                <h5>Get Verified On Our Mobile App</h5>
                                <p>Verifying your identity on our mobile app more secure, faster, and reliable.</p>
                                <a href="#" class="btn btn-primary"><img src="images/android.svg" alt=""></a><br>
                                <div class="mt-3"></div>
                                <a href="#" class="btn btn-primary"><img src="images/apple.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">VERIFY &amp; UPGRADE </h4>
                        </div>
                        <div class="card-body">
                            <h5>Account Status :<span class="text-warning">Pending <i
                                        class="icofont-warning"></i></span></h5>
                            <p>Your account is unverified. Get verified to enable funding, trading, and withdrawal.</p>
                            <a href="#" class="btn btn-primary">Get Verified</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Earn 30% Commission </h4>
                        </div>
                        <div class="card-body">
                            <p>Refer your friends and earn 30% of their trading fees.</p>
                            <a href="#" class="btn btn-primary">Referral Program</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header flex-row">
                            <h4 class="card-title">Information </h4>
                            <a class="btn btn-primary" href="settings-profile.php">Edit</a>
                        </div>
                        <div class="card-body">
                            <form class="row">
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                    <div class="user-info">
				<?php
				include 'connect.php';
				$query = "SELECT * FROM profile WHERE Id=$id";
				$result = mysqli_query($sql,$query);
				while($row = mysqli_fetch_assoc($result))
				{
				?>
                                        <span>USER ID</span>
                                        <h4><?php echo $row['Id'] ?> </h4>
				
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                    <div class="user-info">
                                        <span>EMAIL ADDRESS</span>
                                        <h4><?php echo $row['Email'] ?></h4>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                    <div class="user-info">
                                        <span>COUNTRY OF RESIDENCE</span>
                                        <h4><?php echo $row['Contry'] ?></h4>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                    <div class="user-info">
                                        <span>JOINED SINCE</span>
                                        <h4><?php echo $row['join_date'] ?></h4>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                    <div class="user-info">
                                        <span>TYPE</span>
                                        <h4>Personal</h4>
				<?php } ?>
                                    </div>
                                </div>
                            </form>
				
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