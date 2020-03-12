<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_GET["store"])){

$category_name = $_POST["category_name"];
$category_details = $_POST["category_details"];
$category_status = $_POST["category_status"];



$sql = "INSERT INTO item_category (category_name, category_details, category_status) VALUES ( '$category_name', '$category_details', '$category_status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../item_category.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$category_id = $_POST["category_id"];
		$category_name = $_POST["category_name"];
		$category_details = $_POST["category_details"];
		$category_status = $_POST["category_status"];

			$sql = "UPDATE item_category SET category_name='$category_name', category_details='$category_details', category_status='$category_status' WHERE category_id='$category_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_category.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Item Category Delete

	if (isset($_GET['delete'])) {
		$category_id = $_POST["category_id"];
		if (!empty($category_id)) 
		{
			$sql = "DELETE FROM item_category WHERE category_id ='$category_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../item_category.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>