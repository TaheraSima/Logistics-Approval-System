<?php

 	include 'config/conn.php';
 	//Company type data insert query
	if(isset($_GET["store"])){
		$company_type_name = $_POST["company_type_name"];
		$company_type_details = $_POST["company_type_details"];
		$status = $_POST["status"];

		if (!empty($company_type_name) && !empty($company_type_details) && !empty($status))
		{
			$sql = "INSERT INTO company_type (company_type_name, company_type_details, status) VALUES ('$company_type_name', '$company_type_details', '$status')";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../company_type.php?success=1' );
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

		}

	}

	//Company type data update query

	if (isset($_GET['update'])) {
		$company_type_id = $_POST["company_type_id"];
		$company_type_name = $_POST["company_type_name"];
		$company_type_details = $_POST["company_type_details"];
		$status = $_POST["status"];

		if (!empty($company_type_name) && !empty($company_type_details) && !empty($status))
		{
			$sql = "UPDATE company_type SET company_type_name='$company_type_name', company_type_details='$company_type_details', status='$status' WHERE company_type_id='$company_type_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../company_type.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

		}
	}

	// Company Type Delete

	if (isset($_GET['delete'])) {
		$company_type_id = $_POST["company_type_id"];
		if (!empty($company_type_id))
		{
			$sql = "DELETE FROM company_type WHERE company_type_id ='$company_type_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../company_type.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>