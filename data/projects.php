<?php

include 'config/conn.php';

if(isset($_GET["store_final"])){

	$division_id = $_POST["division_id"];
	$division_name = $_POST["division_name"];
	$department_name = $_POST["department_name"];
	$employee_name = $_POST["employee_name"];
	$employee_id = $_POST["employee_id"];
	$rmks = $_POST["rmks"];
	$work_order_no = $_POST["work_order_no"];
	$work_order_details = $_POST["work_order_details"]; 

	$c = count($work_order_no);
	$name = mysqli_real_escape_string($conn, $_POST["name"]);

	$sql = "INSERT INTO projects (division_id, division_name, department_name, employee_name, employee_id, details, name) VALUES ( '$division_id', '$division_name', '$department_name', '$employee_name', '$employee_id', '$rmks', '$name')";
	if(mysqli_query($conn, $sql)){
		$project_id = mysqli_insert_id( $conn );
		for ($i=0; $i < $c; $i++) { 
			$sql = "INSERT INTO projects_details (project_id, work_order_no, work_order_details) VALUES ('$project_id', '$work_order_no[$i]', '$work_order_details[$i]')";
			if(mysqli_query($conn, $sql)){
				header("Location: ../request_projects.php?success=1");
			}
			else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
		
	} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

// $name = mysqli_real_escape_string($conn, $_POST["name"]);
// $item_details = $_POST["item_details"];
// $status = $_POST["status"];

// $id = $_POST["id"];
// $status = 1;

// 	if (!empty($id)) 
// 	{
// 		$sql = "UPDATE projects SET comments='$item_details', status='$status' WHERE id ='$id'";
// 		if(mysqli_query($conn, $sql)){
// 			$project_id = mysqli_insert_id( $conn );

// 		   	Header( 'Location: ../request_projects.php?success=2');
// 		} else{
// 		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// 		}
// 	}

}

// Item Category update

if (isset($_GET['update'])) {

	$id = $_POST["id"];
	$pID = $_POST["pID"];
	$p_detl_ID = $_POST["p_detl_ID"];
	$name = mysqli_real_escape_string($conn, $_POST["name"]); 
	$p_details = $_POST["p_details"];
	$work_order_no = $_POST["work_order_no"];
	$work_order_details = $_POST["work_order_details"];
	$count_order_no = count($work_order_no);

	
	$query="UPDATE `projects` SET `details`='$p_details', `name`='$name' WHERE `id`='$id'";	
	$run_query = mysqli_query($conn, $query);
	if($run_query){
		for ($i=0; $i < $count_order_no ; $i++) { 
			$query="UPDATE `projects_details` SET `work_order_no`='$work_order_no[$i]', `work_order_details`='$work_order_details[$i]' WHERE `project_id`='$pID[$i]' AND `projects_details_id` = '$p_detl_ID[$i]'";	
			$result = mysqli_query($conn, $query);
		}
		
		$message="Successfully Updated !";
		$action = 'success';
		header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
	}else{
		$message="Not Updated !";
		$action = 'warning';
		header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
	}
}


if (isset($_GET['addRow'])) {

	$project_id = $_POST["id"];
	$work_order_no = $_POST["work_order"];
	$work_order_details = $_POST["work_order_details"];
	// $count_order_no = count($work_order_no);

	$query="INSERT INTO projects_details (project_id, work_order_no, work_order_details) VALUES ('$project_id', '$work_order_no', '$work_order_details')";
	if (mysqli_query($conn, $query)) {
			$message="Successfully Updated !";
			$action = 'success';
			header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
		}
		
		else{
			$message="Not Updated !";
			$action = 'warning';
			header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
		}


	// 	for ($i=0; $i < $count_order_no ; $i++) { 
	// 		$query="INSERT INTO projects_details (project_id, work_order_no, work_order_details) VALUES ('$project_id[$i]', '$work_order_no[$i]', '$work_order_details[$i]')";	
		
	// 	if (mysqli_query($conn, $query)) {
	// 		$message="Successfully Updated !";
	// 		$action = 'success';
	// 		header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
	// 	}
		
	// 	else{
	// 		$message="Not Updated !";
	// 		$action = 'warning';
	// 		header( 'Location: ../request_projects.php?action='.$action.'&message='.$message);
	// 	}
	// }
}

	// Item store_completed


	// Item Category Delete

	if (isset($_GET['delete'])) {
		$id = $_POST["id"];
		if (!empty($id)) 
		{
			$sql = "DELETE FROM projects WHERE id ='$id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../request_projects.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>