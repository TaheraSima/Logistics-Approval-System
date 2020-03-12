<?php

require 'config/conn.php';

if(isset($_GET['store'])){

	$user_id =  $_SESSION['employee_id'];
	$employee_name =  $_SESSION['employee_name'] .'('.$_SESSION['employee_id'].')';
	$division_id = $_SESSION['division_id'];
	$department_id = $_SESSION['department_id'];
	$expect_date = $_POST["expect_date"];
	$req_type = $_POST["req_type"];
	$work_order_no = $_POST["work_order_no"];

	$project_name = NULL;
	
	if (isset($_POST["project_name"])) {
		$project_name = $_POST["project_name"];
	}
	if ($_SESSION['access_permission'] == "Division Head") {
		$status = 1;
	}
	else {
		$status = 0;
	}
	$req_no = $_POST["req_no"];
	$sql = "INSERT INTO `requisition` (`user_id`, `employee_name`, `division_id`, `department_id`,  `req_type`,   `project_name`, `work_order_no`, `date`,  `last_date`, `status`, `req_no`, `expect_date`) VALUES ('$user_id','$employee_name','$division_id', '$department_id', '$req_type', '$project_name', '$work_order_no', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$status','$req_no', '$expect_date')";
	$result = mysqli_query( $conn, $sql );

    $requisition_id = mysqli_insert_id( $conn );
    foreach ( $_POST['rawrequisition_items'] as $item ) {
    	$sql = sprintf( "INSERT INTO `requisition_details` ( `req_id`, `item_id`, `quantity`, `purpose` ) VALUES ( %s, %s, %s, '%s' )", $requisition_id, $item['item_id'], $item['quantity'], $item['purpose'] );
		$result = mysqli_query( $conn, $sql );
    }
	Header( 'Location: ../requisition.php?success=1' );

}

if(isset($_GET['forward'])){
	// $req_no = $_POST['req_no'];
	// $status = 1;
	// $sql = "UPDATE requisition SET status='$status' WHERE req_no=$req_no";
	// $result = mysqli_query( $conn, $sql );
	$req_no = $_POST['req_no'];
	$signature = $_POST['signature'];
	$remarks = $_POST['remarks'];
	$checker_id = $_POST['c_id'];
	if ($_SESSION['access_permission'] == 'Checker') {
		$status = 11;
	}
	else
	{
		$status = 1;
	}
	
	$sql = "UPDATE requisition SET status='$status', checker_id='$checker_id', signature='$signature',  remarks='$remarks',  last_date=CURRENT_TIMESTAMP  WHERE req_no='$req_no'";
	$result = mysqli_query( $conn, $sql );

    foreach ( $_POST['rawrequisition_items'] as $item ){
		$reqd_id = $item['reqd_id'];
		$aprv_qty = $item['aprv_qty'];
    	$sql = "UPDATE `requisition_details` SET aprv_qty='$aprv_qty' WHERE  id='$reqd_id'";
		$result = mysqli_query( $conn, $sql );
    }
	Header( 'Location: ../requisition.php?success=4' );
}

if(isset($_GET['reject'])){
	$req_no = $_POST['req_no'];
	$status = 2;
	$signature = $_POST['signature'];
	$remarks = $_POST['remarks'];

	$sql = "UPDATE requisition SET status='$status', signature='$signature', remarks='$remarks' WHERE req_no=$req_no";

	$result = mysqli_query( $conn, $sql );
	Header( 'Location: ../requisition.php?success=4' );
}

// if(isset($_GET['assign'])){
// 	$req_no = $_POST['purReq_no'];
// 	$assigned_by = $_POST['assigned_by'];
// 	$purchaser_id = $_POST['pur_emp_name'];
// 	$sql = "UPDATE requisition SET purchaser_id='$purchaser_id', status = 7, assigned_by = '$assigned_by' WHERE req_no='$req_no'";
// 	// print_r($sql); die;

// 	$result = mysqli_query( $conn, $sql );
// 	Header( 'Location: ../requisition.php?success=4' );
// }

if(isset($_GET['assignindiv'])){

	$itemId = $_POST['itemId'];
	$req_no = $_POST['reqId'];
	$assigned_by = $_POST['assigned_by'];
	$purchaser_id = $_POST['pur_emp_name'];	
	$c = count($itemId);

	$sqlreq = "UPDATE requisition SET status = 7, assigned_by = '$assigned_by' WHERE id=$req_no";
	$resultreq = mysqli_query( $conn, $sqlreq );

	for ($i=0; $i<$c; $i++ ) {
		$sql = "UPDATE requisition_details SET purchaser_id='$purchaser_id[$i]', details_status = 7 WHERE req_id=$req_no AND item_id = '$itemId[$i]' ";
		$result = mysqli_query( $conn, $sql );
	}
	
	Header( 'Location: ../requisition.php?success=4' );
}

if(isset($_GET['accept'])){
	$req_no = $_POST['purReq_no'];
	$sql = "UPDATE requisition SET status = 9 WHERE req_no='$req_no' ";

	$result = mysqli_query( $conn, $sql );
	Header( 'Location: ../requisition.php?success=4' );
}

// ================= Item deliver==========================

if(isset($_GET['deliver'])){

	$req_no = $_POST['req_number'];
	$req_id = $_POST['req_id'];
	$delivered_by = $_POST['delivered_by'];
	$status = 1;
	
	if (isset($_POST['full_delivery'])) {
		$status = 3;
	}

	if (isset($_POST['partial_delivery'])) {
		$status = 5;
	}
	$sql = "UPDATE requisition SET status='$status', delivered_by='$delivered_by', last_date=CURRENT_TIMESTAMP WHERE req_no='$req_no'";
	$result = mysqli_query( $conn, $sql );

	foreach ( $_POST['rawrequisition_items'] as $item )
	{
		$reqd_id = $item['reqd_id'];
		$aprv_qty = $item['aprv_qty'];
		$pre_delvr = $item['pre_delvr'];
		$delivery_qty = $pre_delvr + $item['new_qty'];
		$rem_qty = $aprv_qty - $delivery_qty;

    	$sql = "UPDATE `requisition_details` SET aprv_qty='$aprv_qty', delvr_qty='$delivery_qty', rem_qty='$rem_qty' WHERE  id='$reqd_id'";
		$result = mysqli_query( $conn, $sql );
    }

	$mr_no = NULL;
	$supplier_name = NULL;
	$department = $_POST["department_id"];
	$division_id = $_POST["division_id"];
	$employee_id = $_POST["user_id"];
	$req_number = $_POST["req_number"];
	$record_type = 'Out';
	$date = date("Y-m-d");
	$purname = $_POST["purname"];
	$employ_name = $_POST["employ_name"];
	$vendor = $_POST["vendor"];
	$gate_pass_no = $_POST["gate_pass_no"];
	$site_name = $_POST["site_name"];
	$bill_no = $_POST["bill_no"];
	$st_rcvr_name = $_POST["st_rcvr_name"];
	$chalan_no = $_POST["chalan_no"];
	$st_rcvr_phn = $_POST["st_rcvr_phn"];
	$delivery_date = $_POST["delivery_date"];
	$st_address = $_POST["st_address"];
	$other_info = $_POST["other_info"];

	
	// if (isset($_POST['partial_delivery'])) {
	// 	$sql = "UPDATE `store` SET department='$department', division_id='$division_id', employee_id='$employee_id', req_number='$req_number', record_type='$record_type', `date`='$date' WHERE  req_number='$req_number'";
	// }else{
		
	// }
	$sql = "INSERT INTO `store` (
	`mr_no`, 
	`supplier_name`, 
	`department`,  
	`division_id`, 
	`employee_id`, 
	`req_number`, 
	`record_type`, 
	`date`, 
	`purname`,
    `employ_name`,
    `vendor`,
    `gate_pass_no`,
    `site_name`,
    `bill_no`,
    `st_rcvr_name`,
    `chalan_no`,
    `st_rcvr_phn`,
    `delivery_date`,
    `st_address`,
    `other_info`
    ) 
    VALUES (
    '$mr_no', 
    '$supplier_name', 
    '$department', 
    '$division_id', 
    '$employee_id', 
    '$req_number', 
    '$record_type', 
     CURRENT_TIMESTAMP,
    '$purname',
    '$employ_name',
    '$vendor',
    '$gate_pass_no',
    '$site_name',
    '$bill_no',
    '$st_rcvr_name',
    '$chalan_no',
    '$st_rcvr_phn',
    '$delivery_date',
    '$st_address',
    '$other_info'    
)";

	

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
			Header( 'Location: ../requisition.php?success=1' );
		}else{
			echo "query problem";
		}
    }

	Header( 'Location: ../requisition.php?success=5' );
}

if(isset($_GET['receive'])){
	$id = $_POST['id'];
	//$signature = $_POST['signature'];
	$remarks = $_POST['remarks'];
	$requester_sign = $_POST['requester_sign'];
	$status = 4;
	//$sql = "UPDATE requisition SET status='$status',  signature='$signature',  remarks='$remarks'  WHERE id='$id'";
	$sql = "UPDATE requisition SET status='$status', requester_sign = '$requester_sign' , remarks='$remarks'  WHERE id='$id'";
	$result = mysqli_query( $conn, $sql );

    foreach ( $_POST['rawrequisition_items'] as $item ){
		$reqd_id = $item['reqd_id'];
		$recv_qty = $item['recv_qty'];
    	$sql = "UPDATE `requisition_details` SET recv_qty='$recv_qty' WHERE  id='$reqd_id'";
		$result = mysqli_query( $conn, $sql );
    }
	Header( 'Location: ../requisition.php?success=5' );
}

if(isset($_GET['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM requisition WHERE id=$id";
	$result = mysqli_query( $conn, $sql );
	$sql = "DELETE FROM requisition_details WHERE req_id=$id";
	$result = mysqli_query( $conn, $sql );
	Header( 'Location: ../requisition.php?success=3' );
}


?>