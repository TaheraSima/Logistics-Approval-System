<?php

require 'config/conn.php';
if(isset($_GET['purchase_order'])){

	// purchase & purchase details table data insert

	$po_no =  $_POST['po_no'];
	$pr_no =  $_POST['pr_no'];
	$req_type =  $_POST['req_type'];
	$emp_id =  $_POST['emp_id'];
	$emp_name =  $_POST['emp_name'];
	$division_id =  $_POST['division_id'];
	$division_name =  $_POST['division_name'];
	$department_id =  $_POST['department_id'];
	$department_name =  $_POST['department_name'];
	$approved_by =  $_POST['approved_by'];
	$remarks =  $_POST['remarks'];

	$rmks_add = $_POST['credit_remarks'];
	$add_amount = $_POST['add_amount'];
	$rmks_less = $_POST['debit_remarks'];
	$less_amount = $_POST['less_amount'];
	$grand_total = $_POST['grand_total'];
	$supplier_name = $_POST['supplier_name'];
	$purchaser_id = $_SESSION['employee_id'];

	$req_date =  $_POST['req_date'];
	$date = date('Y-m-d');

	$sqltest = "";

		$sql = "INSERT INTO `purchase` (`po_no`, `pr_no`,  `req_type`,  `emp_id`,  `emp_name`,  `division_id`,  `department_id`,  `approved_by`,  `remarks`, `rmks_add`, `add_amount`, `rmks_less`, `less_amount`, `grand_total`, `date`, `supplier_name`, `purchaser_id`) VALUES ('$po_no','$pr_no','$req_type','$emp_id','$emp_name','$division_id','$department_id','$approved_by','$remarks', '$rmks_add', '$add_amount', '$rmks_less', '$less_amount', '$grand_total', '$date', '$supplier_name', '$purchaser_id')";
		if ($result = mysqli_query( $conn, $sql )) {
			$purchase_id = mysqli_insert_id( $conn );

			$sql_pur = "UPDATE requisition SET status = 8 WHERE req_no = '$pr_no'";
			// echo $sql_pur; die;
			$resultP = mysqli_query( $conn, $sql_pur );

		    foreach ( $_POST['rawrequisition_items'] as $item ) {

		    	$sql = sprintf( "INSERT INTO `purchase_details` ( `purchase_id`, `item_id`, `apprv_qty`, `purchase_qty`, `unit_price`, `total_price` ) VALUES ( '%s', %s, %s, '%s', '%s', '%s' )", $pr_no, $item['item_id'], $item['aprv_qty'], $item['purchase_qty'], $item['unit_price'], $item['total_price'] );
				$result = mysqli_query( $conn, $sql );
				Header( 'Location:../requisition.php?success=1' );
		    }
		}else{
			echo "error";
		}

	// Store & Store details table data insert

		$mr_no = $_POST["po_no"];
		$supplier_name = NULL;
		$department_id =  $_POST['department_id'];
		$employee_id = $_POST['emp_id'];
		$req_number = $_POST['pr_no'];
		$record_type = 'In';
		
		$sql = "INSERT INTO `store` (`mr_no`, `supplier_name`, `department`, `employee_id`, `req_number`, `record_type`, `date`) VALUES ('$mr_no', '$supplier_name', '$department', '$employee_id', '$req_number', '$record_type', CURRENT_TIMESTAMP)";

		$result = mysqli_query( $conn, $sql );
	  	$store_id = mysqli_insert_id( $conn );

	    foreach ( $_POST['rawrequisition_items'] as $item ) 
	    {
	    	$item_id = $item['item_id'];
	    	$previous_qty = $item['previous_qty'];
	    	$qty = $item['purchase_qty'];
	    	$purchase_qty = $item['purchase_qty'];
	    	$closing_qty = $previous_qty + $purchase_qty;

	    	$record_type = 'In';
	    	$date = date("Y-m-d");
	    	$sql3 = sprintf( "INSERT INTO `store_details` ( `store_id`, `item_id`, `previous_qty`, `qty`, `closing_qty`, `record_type`, `date`) VALUES ( %s, %s, %s, '%s', '%s', '%s', '%s')", $store_id, $item_id, $previous_qty, $qty, $closing_qty, $record_type, $date);

			$result3 = mysqli_query( $conn, $sql3 );
			if ($result3) {
				Header( 'Location: ../requisition.php?success=1' );
			}else{
				echo "query problem";
			}
	    }


}
?>