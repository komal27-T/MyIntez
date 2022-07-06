//check if form is submitted
/*if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $password = mysqli_real_escape_string($sql, $_POST['password']);
    $result = mysqli_query($sql, "SELECT * FROM signup WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	 if (!$result) {
       		 echo "Error in registering...Please try again later!";	
          
        } 
	else {
           
	 header("Location: home.php");
        }
   
/*
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
	$_SESSION['usr_email'] = $row['email'];
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
?>*/