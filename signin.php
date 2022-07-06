<?php
session_start();
include_once 'connect.php'; 
if(isset($_SESSION['usr_id'])!="") {
    header("Location: home.php");
}

include_once 'connect.php';
  
//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($sql, $_POST['form_email']);
    $password = mysqli_real_escape_string($sql, $_POST['form_password']);
    $qry = "SELECT * FROM signup WHERE email = '$email' and password = '$password'";

    $result = mysqli_query($sql, $qry);

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        $_SESSION['usr_email'] = $row['email'];
        $_SESSION['usr_pass'] = $row['password'];
// Get current page URL 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
 
$user_current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; 
    


// Get server related info 
$host= gethostname();
$ipAddress = gethostbyname($host);
$myBrowser = get_browser(); 
$user_ip_address = $_SERVER['REMOTE_ADDR']; 
$referrer_url = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'/'; 
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$time = date('Y-m-d H:i:s');

// Insert visitor activity log into database 
 
$query = "INSERT INTO visitor_activity_logs (id,name,browser,user_ip_address, user_agent, page_url, referrer_url, created_on) 
VALUES (' ','".$_SESSION['usr_name']."','$user_ip_address',
 '$ipAddress', '$user_agent','$user_current_url','$user_agent' ,'$time')"; 

    $insert = mysqli_query($sql,$query);


    header("Location: home.php");
     
    
    } else {
        $errormsg = "Incorrect Email or Password!!!";
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
                    <h4 class="card-title mt-5">Sign in to Intez</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <form method="post" name="myform" class="signin_validate row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="hello@example.com"
                                    name="form_email">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="form_password">
                            </div>
                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                        me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="reset.php">Forgot Password?</a>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="login" class="btn btn-primary">Sign in</button>
                            </div>
                        </form>
                        <p class="mt-3 mb-0">Don't have an account? <a class="text-primary" href="signup.php">Sign
                                up</a></p>
                    </div>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                </div>
                <div class="privacy-link">
                    <a href="signup.php">Have an issue with 2-factor
                        authentication?</a>
                    <br />
                    <a href="signup.php">Privacy Policy</a>
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