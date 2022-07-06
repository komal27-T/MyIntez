<?php
include "connect.php"; // Using database connection file here

    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }	
	
	
if(isset($_POST["sbtn"]))
{
	
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES['image']['name'];    // get the image name in $fnm variable
    $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name


	$id = $_SESSION['usr_id'];
	$name = $_SESSION['usr_name'];
	$email = $_SESSION['usr_email'];
    $pass = $_SESSION['usr_pass'];
	
    $check = mysqli_query($sql,"insert into profile(Id,FName,Email,Password,Address,City,Pcode,Contry,Image) 
values('$id','$name','$email','$pass','$_POST[Addr]','$_POST[city]','$_POST[postal]','$_POST[country]','$dst_db')");  

	if (file_exists($fnm)) {
  	echo '<script type="text/javascript"> alert("File Already Exist!"); </script>';
  	$uploadOk = 0;
	}
		
		
    if($check==1)
    {
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
	 header("Location:settings-profile.php");
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}	
    mysqli_close($sql);  // close connection 
?>