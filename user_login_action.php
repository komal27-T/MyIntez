<?php
 inluce 'connect.php';
	
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }


	//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $password = mysqli_real_escape_string($sql, $_POST['password']);
    $result = mysqli_query($sql, "SELECT * FROM signup WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
	$_SESSION['usr_email'] = $row['email'];
	$_SESSION['LAST_ACTIVITY'] = time();
	$_SESSION['isUserValid'] = true;
	
        header("Location: home.php");
    } else {
	session_destroy();
        $errormsg = "Incorrect Email or Password!!!";
    }
}
?>