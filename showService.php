<?php
  $id = $_POST['id'];  
 //$k=trim($k);
  echo $id;
  include 'connect.php';
  $query = "SELECT * FROM pay WHERE pname = '{$id}'";
  $result = mysqli_query($sql, $query);
  	while($row = mysqli_fetch_assoc($result))
  	{?>
  		
  		<tr>
  			<td><?php echo $row['pname']; ?></td>
  			<td><?php echo $row['pay_em']; ?></td>
  			<td><?php echo $row['pdt']; ?></td>
  			<td><?php echo $row['pamt']; ?></td>
  		</tr>
  <?php	}
     

     echo $query;               			
?>  



                          {