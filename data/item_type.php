<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$type_name = $_POST["type_name"];
$type_details = $_POST["type_details"];
$type_status = $_POST["type_status"];



$sql = "INSERT INTO item_type (type_name, type_details, type_status) VALUES ( '$type_name', '$type_details', 
'$type_status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../item_type.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$type_id = $_POST["type_id"];
		$type_name = $_POST["type_name"];
		$type_details = $_POST["type_details"];
		$type_status = $_POST["type_status"];

			$sql = "UPDATE item_type SET type_name='$type_name', type_details='$type_details', type_status='$type_status' WHERE type_id='$type_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_type.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$type_id = $_POST["type_id"];
		if (!empty($type_id)) 
		{
			$sql = "DELETE FROM item_type WHERE type_id ='$type_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_type.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>