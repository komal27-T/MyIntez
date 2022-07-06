<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: home.php");
}

include_once 'connect.php';


//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['sbtbtn'])) {
    $name = mysqli_real_escape_string($sql, $_POST['name']);
    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $password = mysqli_real_escape_string($sql, $_POST['password']);
    $cpassword = mysqli_real_escape_string($sql, $_POST['cpassword']);


	$query = "SELECT * FROM signup";
    $res = mysqli_query($sql,$query);
    if (mysqli_num_rows($res) > 0) { 
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($email==$row['email'])
            {
                echo "Username already exists";
            }
}
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }

   if (!$error) {
        if(mysqli_query($sql, "INSERT INTO signup(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . ($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='signin.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
    
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
</head>

<body class="@@class">

<!--div id="preloader">
    <i>.</i>
    <i>.</i>
    <i>.</i>
</div-->

<div class="authincation section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-5 col-md-6">
                <div class="mini-logo text-center my-4">
                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                    <h4 class="card-title mt-5">Create your account</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <form method="post" name="myform" class="signin_validate row g-3"
                            action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="col-12">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" 
				value="<?php if($error) echo $name; ?>">
				 <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                            </div>
                            <div class="col-12 ">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="hello@example.com"
                                    name="email" value="<?php if($error) echo $email; ?>">
				 <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
				 <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                            </div>
			    <div class="col-12">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="cpassword">
				 <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">
                                        I certify that I am 18 years of age or older, and agree to the <a href="#"
                                            class="text-primary">User Agreement</a> and <a href="#"
                                            class="text-primary">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="sbtbtn" class="btn btn-primary">Create account</button>
                            </div>
                        </form>
			     <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            		<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                        <div class="text-center">
                            <p class="mt-3 mb-0"> <a class="text-primary" href="signin.php">Sign in</a> to your
                                account</p>
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