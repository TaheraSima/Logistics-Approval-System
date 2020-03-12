<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$item_name = $_POST["item_name"];
$category_id = $_POST["category_id"];
$type_id = $_POST["type_id"];
$item_details = $_POST["item_details"];
$status = $_POST["status"];



$sql = "INSERT INTO item_info (item_name, category_id, type_id,  item_details, status) VALUES ( '$item_name', 
'$category_id', '$type_id', '$item_details', '$status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../item_info.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$item_id = $_POST["item_id"];
		$item_name = $_POST["item_name"];
		$category_id = $_POST["category_id"];
		$type_id = $_POST["type_id"];
		$item_details = $_POST["item_details"];
		$status = $_POST["status"];

			$sql = "UPDATE item_info SET item_name='$item_name', category_id='$category_id', type_id='$type_id',item_details='$item_details', status='$status' WHERE item_id='$item_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_info.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$item_id = $_POST["item_id"];
		if (!empty($item_id)) 
		{
			$sql = "DELETE FROM item_info WHERE item_id ='$item_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_info.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>