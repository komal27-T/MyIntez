<?php
 
 //fetch.php  
 include 'connect.php';  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT pid, pname, pdt, pamt FROM pay WHERE pid = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($sql, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>