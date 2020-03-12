<?php

// exit( 'test' );
require 'config/conn.php';


if(!empty($_POST["req_number"])){
	$output = '';
	$req_number = $_POST["req_number"];
	$sql = "SELECT requisition.*, user_accounts.*, department.*, division.* FROM requisition,user_accounts, department,division WHERE requisition.req_no='$req_number' AND requisition.user_id=user_accounts.employee_id AND requisition.department_id=department.department_id AND requisition.division_id=division.division_id ORDER BY requisition.req_no DESC";
	//$sql = "SELECT store.*, user_accounts.*, department.* FROM store, user_accounts,department WHERE store.employee_id = user_accounts.employee_id AND store.department=department.department_id ORDER BY store.id DESC";

		if ($result=mysqli_query($conn,$sql))
		{			
			  while ($row=mysqli_fetch_assoc($result))
			  {
			  	$output .= '<div class="row">
			  						<div class="col-md-4"><b>Employee ID :</b></div>                                    
                                    <div class="col-md-8">
                                        <input type="text" class="form-control user_id" name="user_id" id="user_id" value="'.$row["user_id"].'" readonly><br>
                                    </div>
                            </div>
			  				<div class="row">
                                <div class="col-md-4"><b>Employee ID :</b></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control user_name" name="user_name" id="user_name" value="'.$row["employee_name"].'" readonly><br>
                        		</div>
                            </div>  
                            <div class="row">
                                <div class="col-md-4"><b>Division :</b></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control division_id" name="division_id" id="division_id" value="'.$row["division_name"].'" readonly><br>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4"><b>Department :</b></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control department_id" name="department_id"  value="'.$row["department_name"].'" readonly>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4"><b> Email/Phone :</b></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control department_id" name="department_id"  value="'.$row["email"].'" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control department_id" name="department_id"  value="'.$row["department_id"].'" readonly>
                                </div>
                            </div>';			

			}
			echo $output;
		}
		
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
	$department = $_POST["department_id"];
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
