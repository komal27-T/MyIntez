



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
</head>

<body class="@@class">

<!--div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div-->

<div id="main-wrapper">

    <div class="authincation section-padding">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-4 col-md-5">
                    <div class="mini-logo text-center my-3">
                        <a href="index.html"><img src="images/logo.png" alt=""></a>
                        <h4 class="card-title mt-5">Update Password</h4>
                    </div>
                    <div class="auth-form card">
                        <div class="card-body">
                            <form action="reset_pass.php" method="POST" class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Enter Email</label>
					<input type="text" class="form-control" name="email" 					placeholder="abc@gmail.com">
 					
                                </div>
				 <div class="col-12">
                                    <label class="form-label">Enter New Password</label>

                                    <input type="password" class="form-control" name="npass" placeholder="*******">
				
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" name="sbtbtn" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>