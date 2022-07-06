<?php
header('Content-Type: application/json');

require_once('connect.php');

$sqlQuery = "SELECT pid,pamt FROM pay ORDER BY pid";

$result = mysqli_query($sql,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>