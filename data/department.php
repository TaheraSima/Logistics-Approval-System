<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$department_name = $_POST["department_name"];
$division_id = $_POST["division_id"];
$department_status = $_POST["department_status"];



$sql = "INSERT INTO department (department_name, division_id, department_status) VALUES ( '$department_name', 
'$division_id', '$department_status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../department.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$department_id = $_POST["department_id"];
		$department_name = $_POST["department_name"];
		$division_id = $_POST["division_id"];		
		$department_status = $_POST["department_status"];

			$sql = "UPDATE department SET department_name='$department_name', division_id='$division_id', department_status='$department_status' WHERE department_id='$department_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../department.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$department_id = $_POST["department_id"];
		if (!empty($department_id)) 
		{
			$sql = "DELETE FROM department WHERE department_id ='$department_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../department.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>