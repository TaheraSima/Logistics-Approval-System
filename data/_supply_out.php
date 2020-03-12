<?php

// exit( 'test' );
require 'config/conn.php';


if(!empty($_POST["req_number"])){
	$output = '';
	$req_number = $_POST["req_number"];
	$sql = "SELECT * FROM requisition WHERE req_no='$req_number' ORDER BY req_no DESC";

		if ($result=mysqli_query($conn,$sql))
		{			
			  while ($row=mysqli_fetch_assoc($result))
			  {			  	
			  	$output.= $row["user_id"];
			  }
		}

  	echo $output;
}


if(!empty($_POST["user_id"])){
	$output = '';
	$user_id = $_POST["user_id"];
	$sql = "SELECT * FROM user_accounts WHERE employee_id='$user_id' ORDER BY employee_id DESC";

		if ($result=mysqli_query($conn,$sql))
		{
			//$output.='<option value="" selected> Select Department </option>';
			  while ($row=mysqli_fetch_assoc($result))
			  {
			  	//$output.='<option value="'.$row["department_id"].'">'.$row["department_name"].'</option>';
			  	$output.= $row["user_name"];
			  }
		}

  	echo $output;
}



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

	$mr_no = NULL;
	$supplier_name = NULL;
	$department = $_POST["department"];
	$employee_id = $_POST["user_id"];
	$req_number = $_POST["req_number"];
	$record_type = 'Out';
	
	$sql = "INSERT INTO `store` (`mr_no`, `supplier_name`, `department`, `employee_id`, `req_number`, `record_type`, `date`) VALUES ('$mr_no', '$supplier_name', '$department', '$employee_id', '$req_number', '$record_type', CURRENT_TIMESTAMP)";

	$result = mysqli_query( $conn, $sql );
  	$store_id = mysqli_insert_id( $conn );

    foreach ( $_POST['rawrequisition_items'] as $item ) 
    {
    	$item_id = $item['item_id'];
    	$previous_qty = $item['previous_qty'];
    	$qty = $item['new_qty'];
    	$closing_qty = $item['current_quantity'];
    	$record_type = 'Out';
    	$date = date("Y-m-d");

    	$sql3 = sprintf( "INSERT INTO `store_details` ( `store_id`, `item_id`, `previous_qty`, `qty`, `closing_qty`, `record_type`, `date`) VALUES ( %s, %s, %s, '%s', '%s', '%s', '%s')", $store_id, $item_id, $previous_qty, $qty, $closing_qty, $record_type, $date);

		$result3 = mysqli_query( $conn, $sql3 );
		if ($result3) {
			Header( 'Location: ../supply_out.php?success=1' );
		}else{
			echo "query problem";
		}
    }
}


?>
