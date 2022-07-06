<?php 
header('Content-Type: application/json');
session_start();
include 'connect.php';	

//$id = $_SESSION['usr_id'];
			/*$query = "SELECT pid, pamt FROM pay pamt ORDER  BY pid ";
				$result = mysqli_query($sql,$query);
				//$json = [];
				//$json1 = [];
				while($row = mysqli_fetch_assoc($result))
				{
					$data = array();
					foreach ($result as $row){
					$data[] = $row;
					//$json[] = $row['pid'];
					//$json1[] = $row['pamt'];	
					}
				
				
				
				}
				print json_encode($data);
				mysqli_free_result($result);
				mysqli_close($sql);
				//echo json_encode($json);
				//echo json_encode($json1);*/

  $data1 = '';
  $data2 = '';
  $data3 = '';

    //query to get data from the table
    $qry = "SELECT pdt, pamt, pname FROM pay pamt ORDER  BY pdt ";

    $result = mysqli_query($sql, $qry);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $data1 = $data1 . '"'. $row['pdt'].'",';
        $data2 = $data2 . '"'. $row['pname'] .'",';
	$data3 = $data3 . '"'. $row['pamt'] .'",';
    }
	print json_encode($data1);
	print json_encode($data2);
	print json_encode($data3);

    $data1 = trim($data1,",");
    $data2 = trim($data2,",");
     $data3 = trim($data3,",");

			?>