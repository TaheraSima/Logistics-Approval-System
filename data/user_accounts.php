<?php 
	include 'config/conn.php';
	//Unit data insert query
	if(isset($_GET["store"])){

	$employee_id 		= $_POST["employee_id"];
	$email 				= $_POST["email"];
	$password 			= $_POST["password"];
	$employee_name 		= $_POST["employee_name"];
	$division_id 		= $_POST["division_id"];
	$department_id 		= $_POST["department_id"];
	$unit_id 			= $_POST["unit_id"];
	$designation_id 	= $_POST["designation_id"];
	$status 			= $_POST["status"];

	$access_level_id 	= $_POST["access_level_id"]; 
	// $access_level = implode(",", $access_level_id);
	// echo $access = $access_level . ',' ;	
	
	$c = count($access_level_id);
	// $bd = $access_level_id. ',';
	// print_r($bd); die;
	// $full_access = '0';
	foreach ($access_level_id as $access) {
		$full_access[]= $access. ',' ;
		}
		
	// for ($i=0; $i < $c; $i++) { 
	$sql = "INSERT INTO user_accounts (employee_id, employee_name,  email,  password, division_id, department_id, unit_id, designation_id, access_level_id, status) VALUES ('$employee_id', '$employee_name', '$email', '$password', '$division_id', '$department_id', 4, '$designation_id', '$access_level_id', '$status')";
	// print_r($sql);

	if(mysqli_query($conn, $sql)){
		
		header("Location: ../user_accounts.php?success=1");
	} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	// }

}

	if (isset($_GET['update'])) {
			// $unit_id = $_POST["unit_id"];
			// $unit_name = $_POST["unit_name"];
			// $division_id = $_POST["division_id"];
			// $department_id = $_POST["department_id"];		
			// $unit_status = $_POST["unit_status"];
		$employee_id = $_POST["employee_id"];
		$status = $_POST["status"];
		$access_level_id = $_POST["access_level_id"];
		$id = $_POST["id"];
		


				$sql = "UPDATE user_accounts SET employee_id = '$employee_id', access_level_id='$access_level_id', status='$status' WHERE id= '$id' ";
				if(mysqli_query($conn, $sql)){
				   	Header( 'Location: ../user_accounts.php?success=2');
				} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}			 
			
		}

		// Unit Delete

		if (isset($_GET['delete'])) {
			$id = $_POST["id"];
			if (!empty($id)) 
			{
				$sql = "DELETE FROM user_accounts WHERE id ='$id'";
				if(mysqli_query($conn, $sql)){
				   	Header( 'Location: ../user_accounts.php?success=3');
				} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
			}
		}





?>