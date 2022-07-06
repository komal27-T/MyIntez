<?php
   session_start();
   if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
       header("Location: signin.php");
       die();  
   
   }
   
   include 'connect.php';
   $id = $_SESSION['usr_id'];
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
                                    <h3>Payment Method</h3>
                                    <p class="mb-2">Welcome to Intez Payment Method page</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Payment Method</a></div>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add a payment method </h4>
                                </div>
                                <div class="card-body">
                                       <?php    
                                        include 'connect.php';
                                        $query = "SELECT * FROM bank WHERE usr_id = $id";
                                        $result = mysqli_query($sql,$query); 
                                         while($row = mysqli_fetch_assoc($result))
                                        {
                                         ?>
                                    <div class="verify-content">
                                        <div class="d-flex align-items-center">
                                            <span class="me-3 icon-circle bg-primary text-white"><i
                                                    class="ri-bank-line"></i></span>
                                            <div class="primary-number">
                                                <h5 class="mb-0"><?php echo $row['BankName']; ?></h5>
                                                <small>Bank **************5421</small>
                                                <br>
                                                <span class="text-success">Verified</span>
                                            </div>
                                        </div>
                                        <button class=" btn btn-outline-primary">Manage</button>
                                    </div>
                                    <?php } ?>
                                    <hr class="dropdown-divider my-4">
                                    <?php    
                                        include 'connect.php';
                                        $query = "SELECT * FROM card WHERE usr_id = $id";
                                        $result = mysqli_query($sql,$query); 
                                         while($row = mysqli_fetch_assoc($result))
                                        {
                                         ?>
                                    <div class="verify-content">
                                        <div class="d-flex align-items-center">
                                            <span class="me-3 icon-circle bg-primary text-white"><i
                                                    class="ri-mastercard-line"></i></span>
                                            <div class="primary-number">
                                                <h5 class="mb-0"><?php echo $row['ctype']; ?></h5>
                                                <small>Credit Card *********5478</small>
                                                <br>
                                                <span class="text-success">Verified</span>
                                            </div>
                                        </div>
                                        <button class=" btn btn-outline-primary">Manage</button>
                                    </div>
                                    <?php } ?>
                                    <div class="mt-5 text-center">
                                        <button type="button" class="btn btn-primary m-2" data-toggle="modal"
                                            data-target="#addBank">Add New Bank</button>
                                        <button type="button" class="btn btn-primary m-2" data-toggle="modal"
                                            data-target="#addCard">Add New Card</button>
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

<!-- Modal -->
<div class="modal fade" id="addBank" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add bank account</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="bank.php" name="bankForm" method="POST" class="identity-upload"  onsubmit="return validateForm()">
                    <div class="row g-3">
			<div class="col-xl-12">
                            <label class="form-label">Bank Name </label>
                            <input type="text" class="form-control" placeholder="ICICI Bank" name="bnm"required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Routing number </label>
                            <input type="text" class="form-control" placeholder="25487" name="rno" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Account number </label>
                            <input type="text" class="form-control" placeholder="36475" name="ano" required>
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Full name </label>
                            <input type="text" class="form-control" placeholder="Jannatul Maowa" name="fnm" required>
                        </div>
			 <div class="col-xl-12">
                            <label class="form-label">Balance </label>
                            <input type="text" class="form-control" placeholder="Jannatul Maowa" name="bal">
                        </div>
                        <div class="col-xl-12">
                            <img src="images/routing.png" alt="" class="img-fluid">
                        </div>
                    </div>
		<div class="modal-footer">
                <input type="submit" name="save" class="btn btn-primary" name="confirm"/>
            	</div>
                </form>
            </div>
            
        </div>
    </div>



</div>
<!-- Modal -->
<!--div class="modal fade" id="successBankAccount" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="auth-form">
                    <div class="card-body">
                        <form action="https://intez-html.vercel.app/verify-step-2.html" class="identity-upload">
                            <div class="identity-content">
                                <span class="icon"><i class="icofont-check"></i></span>
                                <p class="text-dark">Congratulation. Your bank added</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->


<!-- Modal -->
<div class="modal fade" id="addCard" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCardLabel">Add card</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="identity-upload" method="POST" action="card.php"  onsubmit="return validateForm()">
                    <div class="row g-3">
                         <div class="col-xl-12">
                            <label class="form-label">Card Type</label>
                 <input type="text" class="form-control" placeholder="Master,VISA" name="ctype">
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Name on card </label>
                 <input type="text" class="form-control" placeholder="Jannatul Maowa" name="cname">
                        </div>
                        <div class="col-xl-12">
                            <label class="form-label">Card number </label>
             <input type="text" class="form-control" placeholder="5658 4258 6358 4756" name="cno">
                        </div>
                        <div class="col-xl-4">
                            <label class="form-label">Expiration </label>
               		    <input type="text" class="form-control" placeholder="10/22" name="ex">
                        </div>
                        <div class="col-xl-4">
                            <label class="form-label">CVC </label>
                            <input type="text" class="form-control" placeholder="125" name="cvc">
                        </div>
			  <div class="col-xl-4">
                            <label class="form-label">Balance </label>
                            <input type="text" class="form-control" placeholder="125" name="bal">
                        </div>
                        <div class="col-xl-4">
                            <label class="form-label">Postal code </label>
                            <input type="text" class="form-control" placeholder="2368" name="pcode">
                        </div>
                    </div>
		<div class="modal-footer">
         	 <input type="submit" name="save" class="btn btn-primary" value="Confirm">
                   
                </form>
            </div>
            
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!--div class="modal fade" id="successCard" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="auth-form">
                    <div class="card-body">
                        <form action="https://intez-html.vercel.app/verify-step-2.html" class="identity-upload">
                            <div class="identity-content">
                                <span class="icon"><i class="icofont-check"></i></span>
                                <p class="text-dark">Congratulation. Your bank added</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js">
  
</script>
</body>
</html>