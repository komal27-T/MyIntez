



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

<div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div>

<div id="main-wrapper">

    <div class="authincation section-padding">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-4 col-md-5">
                    <div class="mini-logo text-center my-3">
                        <a href="index.php"><img src="images/logo.png" alt=""></a>
                        <h4 class="card-title mt-5">Reset Password</h4>
                    </div>
                    <div class="auth-form card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Email</label>

                                    <input type="text" class="form-control" placeholder="abc@gmail.com" 				name="email" value="<?php if($error) echo $email; ?>" >
			<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                                </div>
				<div class="col-12">
                                    <label class="form-label">New Password</label>

                            <input type="text" class="form-control" placeholder="********" name="password">
                                </div>
	<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

                                <div class="text-center mt-4">
                                    <button type="submit" name="sbtbtn" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                           <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            		<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
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