<?php

include 'config/conn.php';

if(!empty($_POST["division_id"])){
	$output = '';
	$division_id = $_POST["division_id"];
	$sql = "SELECT * FROM department WHERE division_id='$division_id' ORDER BY department_id DESC";

		if ($result=mysqli_query($conn,$sql))
		{
			$output.='<option value="" selected> Select Department </option>';
			  while ($row=mysqli_fetch_assoc($result))
			  {
			  	$output.='<option value="'.$row["department_id"].'">'.$row["department_name"].'</option>';

			  }
		}

  	echo $output;
}

if(!empty($_POST["department_id"])){
	$output = '';
	$department_id = $_POST["department_id"];
	$sql = "SELECT * FROM unit WHERE department_id='$department_id' ORDER BY unit_id DESC";

		if ($result=mysqli_query($conn,$sql))
		{
			$output.='<option value="" selected> Select Department </option>';
			  while ($row=mysqli_fetch_assoc($result))
			  {
			  	$output.='<option value="'.$row["unit_id"].'">'.$row["unit_name"].'</option>';
			  }
		}   
  	echo $output;
}

//Unit data insert query
if(isset($_GET["store"])){

$unit_name = $_POST["unit_name"];
$division_id = $_POST["division_id"];
$department_id = $_POST["department_id"];
$unit_status = $_POST["unit_status"];


$sql = "INSERT INTO unit (unit_name, division_id, department_id, unit_status) VALUES ( '$unit_name', 
'$division_id', '$department_id', '$unit_status')";

if(mysqli_query($conn, $sql)){
	
	header("Location: ../unit.php?success=1");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

if (isset($_GET['update'])) {
		$unit_id = $_POST["unit_id"];
		$unit_name = $_POST["unit_name"];
		$division_id = $_POST["division_id"];
		$department_id = $_POST["department_id"];		
		$unit_status = $_POST["unit_status"];

			$sql = "UPDATE unit SET unit_name='$unit_name', division_id='$division_id', department_id='$department_id', unit_status='$unit_status' WHERE unit_id='$unit_id' ";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../unit.php?success=2');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}			 
		
	}

	// Unit Delete

	if (isset($_GET['delete'])) {
		$unit_id = $_POST["unit_id"];
		if (!empty($unit_id)) 
		{
			$sql = "DELETE FROM unit WHERE unit_id ='$unit_id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../unit.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>