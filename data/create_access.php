<?php

// exit( 'test' );
require 'config/conn.php';

if($_POST['save'] == "Save" ){
	$access_name = $_POST["access_name"];
	$access_details = $_POST["access_details"];
	$status = $_POST["status"];

	$sql="INSERT INTO `access_level` (`access_name`, `access_details`, `status`) VALUES ('$access_name', '$access_details', '$status')";

	// echo $sql; exit;

	if(mysqli_query($conn, $sql))
	{
		Header( 'Location: ../access_level.php?success=1' );
		} else{
		    echo "Error" . mysqli_error($conn);
		}
	}

 if ($_POST['edit']=='Save') {
	$access_id = $_POST["access_id"];
	$access_name = $_POST["access_name"];
	$access_details = $_POST["access_details"];
	$status = $_POST["status"];


	$sql = "UPDATE access_level SET access_name='$access_name', access_details='$access_details', status='$status' WHERE access_id='$access_id' ";
	if(mysqli_query($conn, $sql)){
	   	Header( 'Location: ../access_level.php?');
	} else{
	    echo "Error" . mysqli_error($conn);
	}
}


	if ($_GET['id']!='') {

			$sql = "DELETE FROM access_level WHERE access_id ='$_GET[id]'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../access_level.php?');
			} else{
			    echo "Error " . mysqli_error($conn);
			}
		}

?>