  <?php
   session_start();
   if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
       header("Location: signin.php");
       die();  
   
   }
   header('Content-Type : application/json');
  include 'connect.php';
   $id = $_SESSION['usr_id'];
   $data1 = '';
   $data2 = '';
   $data3 = '';
   
       //query to get data from the table
       $qry = "SELECT pdt, pamt, pname FROM pay WHERE usr_id = '$id' ORDER  BY pdt ";
   
       $result = mysqli_query($sql, $qry)or die( mysqli_error($sql));;
   
       //loop through the returned data
       while ($row = mysqli_fetch_array($result)) {
   
           $data1 = $data1 . '"'. $row['pdt'].'",';
           $data2 = $data2 . '"'. $row['pamt'] .'",';
    $data3 = $data3 . '"'. $row['pname'] .'",';
       }
    print json_encode($data1);
    print json_encode($data2);
    print json_encode($data3);
       $data1 = trim($data1,",");
       $data2 = trim($data2,",");
       $data3 = trim($data3,",");
?>