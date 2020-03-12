<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$division_name = $_POST["division_name"];
$division_status = $_POST["division_status"];



$sql = "INSERT INTO division (division_name, division_status) VALUES ( '$division_name', '$division_status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../division.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$division_id = $_POST["division_id"];
		$division_name = $_POST["division_name"];		
		$division_status = $_POST["division_status"];

$sql = "UPDATE division SET division_name='$division_name', division_status='$division_status' WHERE division_id='$division_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../division.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$division_id = $_POST["division_id"];
		if (!empty($division_id)) 
		{
			$sql = "DELETE FROM division WHERE division_id ='$division_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../division.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>