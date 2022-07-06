<?php
session_start();
if(empty($_SESSION['usr_id']) || $_SESSION['usr_id'] == ''){
    header("Location: signin.php");
    die();

}

include 'connect.php';
$id = $_SESSION['usr_id'];


$data1 = '';
$data2 = '';
$data3 = '';

    //query to get data from the table
    $qry = "SELECT pdt, pamt, pname FROM pay WHERE usr_id = '$id' ORDER  BY pdt ";

    $result = mysqli_query($sql, $qry)or die( mysqli_error($sql));;
  //  $array = mysqli_fetch_row($result);    

    //loop through the returned data
	if(mysqli_num_rows($result)>0){
   while ($row = mysqli_fetch_array($result)) {
	?>
	<tr>
			<td><?=$row['pname'];?></td>
			
			<td><?=$row['pdt'];?></td>
			<td><?=$row['pamt'];?></td>
			
		
	</tr>
	<?php
		}
	}
        ?>





   