<?php
 
 //fetch.php  
 include 'connect.php';  
 if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM pay WHERE pid = '".$_POST["id"]."'";  
      $result = mysqli_query($sql, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>