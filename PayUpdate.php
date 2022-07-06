<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();
}
$id = $_SESSION['usr_id'];
 include 'connect.php';
 echo $id;
  if(!empty($_POST["update"])){
    echo "yes... Data is posted";
    $amt = $_POST['payAmount'];
    $pid = $_POST['payid'];
    $type = $_POST['sel1'];
    echo "payamount",$amt;
    echo "Pay ID",$pid;
   // $type = $_POST['#sel1'];
    $status = "PAID";
    $str = "bank";
    $str1 = "card";
    echo $type;
    echo $str1;
    $due = 0;

     if($type == $str){
   // echo "...selection is bank";
    $query = "UPDATE bank SET Balance = Balance - $amt WHERE usr_id = '$id'";
    $res = mysqli_query($sql,$query);
    if($res)
      {
      mysqli_query($sql, "UPDATE `pay` SET `Due` = '$due', `status` = '$status' WHERE `pid` = '$pid'");
      echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
      header("location:balance.php");
     }
   }

     elseif($type == $str1){ 
   // echo "...selection is bank";
    $query = "UPDATE card SET Balance = Balance - $amt WHERE usr_id = '$id'";
    $res = mysqli_query($sql,$query);
    if($res)
      {
      mysqli_query($sql, "UPDATE `pay` SET `Due` = '$due', `status` = '$status' WHERE `pid` = '$pid'");
      echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';
      header("location:balance.php");
     }
   }
   }
  header("location:balance.php");
 
    /*mysqli_query($sql, "UPDATE `pay` SET `Due` = '$amt', `status` = '$status' WHERE `usr_id` = '$id'") or die(mysqli_error($sql));*/
 
    
  
?>