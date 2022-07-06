<?php

include 'connect.php'; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($sql,"DELETE FROM invoice WHERE Id = '$id'"); // delete query

if($del)
{
	
   // echo " deleting record";
    header("location:invoice.php"); // redirects to all records page
   // exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>