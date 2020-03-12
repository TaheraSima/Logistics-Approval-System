<?php

// exit( 'test' );
require 'config/conn.php';

if (isset($_POST["item_id"])) 
	{
		$item_id = $_POST["item_id"];
		$sql2 = "SELECT * FROM store_details WHERE item_id='$item_id' ORDER BY id DESC LIMIT 0,1";
    	$result2 = mysqli_query( $conn, $sql2 );

    	if (mysqli_num_rows($result2) == 0) 
    	{
	    	echo $previous_qty = 0;
    	}

    	if (mysqli_num_rows($result2) != 0) 
    	{
    		while ($row = mysqli_fetch_assoc($result2)) 
    		{
	    	 	$previous_qty = $row['closing_qty'];
	    	 	echo $previous_qty;
	    	}
		}
	}


if(isset($_GET['store'])){

	$mr_no = $_POST["mr_no"];
	$supplier_name = $_POST["supplier_name"];
	$department = NULL;
	$employee_id = NULL;
	$req_number = NULL;
	$record_type = 'In';
	
	$sql = "INSERT INTO `store` (`mr_no`, `supplier_name`, `department`, `employee_id`, `req_number`, `record_type`, `date`) VALUES ('$mr_no', '$supplier_name', '$department', '$employee_id', '$req_number', '$record_type', CURRENT_TIMESTAMP)";

	$result = mysqli_query( $conn, $sql );
  	$store_id = mysqli_insert_id( $conn );

    foreach ( $_POST['rawrequisition_items'] as $item ) 
    {
    	$item_id = $item['item_id'];
    	$previous_qty = $item['previous_qty'];
    	$qty = $item['new_qty'];
    	$closing_qty = $item['current_quantity'];
    	$record_type = 'In';
    	$date = date("Y-m-d");

    	$sql3 = sprintf( "INSERT INTO `store_details` ( `store_id`, `item_id`, `previous_qty`, `qty`, `closing_qty`, `record_type`, `date`) VALUES ( %s, %s, %s, '%s', '%s', '%s', '%s')", $store_id, $item_id, $previous_qty, $qty, $closing_qty, $record_type, $date);

		$result3 = mysqli_query( $conn, $sql3 );
		if ($result3) {
			Header( 'Location: ../material_receive.php?success=1' );
		}else{
			echo "query problem";
		}
    }
}

	// Item Category Delete
	if (isset($_GET['delete'])) {
		$mateid = $_POST["mateid"];
		if (!empty($mateid)) 
		{
			$sql = "DELETE FROM store WHERE id ='$mateid'";
			$result = mysqli_query($conn, $sql);

			$sql = "DELETE FROM store_details WHERE store_id='$mateid'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../material_receive.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>
