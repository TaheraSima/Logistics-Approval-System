<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$designation_name = $_POST["designation_name"];
$status = $_POST["status"];




$sql = "INSERT INTO designation (designation_name, status) VALUES ( '$designation_name', '$status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../designation.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$designation_id = $_POST["designation_id"];
		$designation_name = $_POST["designation_name"];
		$status = $_POST["status"];

			$sql = "UPDATE designation SET designation_name='$designation_name', status='$status' WHERE designation_id='$designation_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../designation.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$designation_id = $_POST["designation_id"];
		if (!empty($designation_id)) 
		{
			$sql = "DELETE FROM designation WHERE designation_id ='$designation_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../designation.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>