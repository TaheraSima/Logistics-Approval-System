<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$approval_hierarchy_name = $_POST["approval_hierarchy_name"];
$status = $_POST["status"];




$sql = "INSERT INTO approval_hierarchy (approval_hierarchy_name, status) VALUES ( '$approval_hierarchy_name', '$status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../approval_hierarchy.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$approval_hierarchy_id = $_POST["approval_hierarchy_id"];
		$approval_hierarchy_name = $_POST["approval_hierarchy_name"];
		$status = $_POST["status"];

			$sql = "UPDATE approval_hierarchy SET approval_hierarchy_name='$approval_hierarchy_name', status='$status' WHERE approval_hierarchy_id='$approval_hierarchy_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../approval_hierarchy.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$approval_hierarchy_id = $_POST["approval_hierarchy_id"];
		if (!empty($approval_hierarchy_id)) 
		{
			$sql = "DELETE FROM approval_hierarchy WHERE approval_hierarchy_id ='$approval_hierarchy_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../approval_hierarchy.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>