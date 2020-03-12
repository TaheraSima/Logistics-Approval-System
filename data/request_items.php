<?php

include 'config/conn.php';

//Item Category data insert query
if(isset($_POST["store"])){
	$division_id = $_POST["division_id"];
	$division_name = $_POST["division_name"];
	$department_name = $_POST["department_name"];
	$employee_name = $_POST["employee_name"];
	$employee_id = $_POST["employee_id"];
	$rmks = $_POST["rmks"];

	if ($_FILES['file_name']['name'] != '') {
	  $file_name = 'FILE-'.rand().$_FILES['file_name']['name'];
	  $file_tmp =$_FILES['file_name']['tmp_name'];
	  move_uploaded_file($file_tmp,"../images/".$file_name);
	}else{
		$file_name = "";
	}

	$item_name = mysqli_real_escape_string($conn, $_POST["item_name"]);
	$date = date('d-m-Y');

	$sql = "INSERT INTO request_items (division_id, division_name, department_name, employee_name, employee_id, rmks, file_name, item_name, `date`) VALUES ( '$division_id', '$division_name', '$department_name', '$employee_name', '$employee_id', '$rmks', '$file_name', '$item_name', '$date')";
	if(mysqli_query($conn, $sql)){
		header("Location: ../request_items.php?success=1");
	} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
}


if(isset($_GET["store_final"])){

$item_name = mysqli_real_escape_string($conn, $_POST["item_name"]);
$category_id = $_POST["category_id"];
$type_id = $_POST["type_id"];
$item_details = $_POST["item_details"];
$status = $_POST["status"];



$sql = "INSERT INTO item_info (item_name, category_id, type_id,  item_details, status) VALUES ( '$item_name', 
'$category_id', '$type_id', '$item_details', '$status')";

if(mysqli_query($conn, $sql)){	

	$id = $_POST["id"];
	$status = 1;
	if (!empty($id)) 
	{
		$sql = "UPDATE request_items SET status='$status' WHERE id ='$id'";
		if(mysqli_query($conn, $sql)){
		   	Header( 'Location: ../request_items.php?success=2');
		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

// Item Category update

if (isset($_GET['update'])) {

	$id = $_POST["id"];
	$item_name = mysqli_real_escape_string($conn, $_POST["item_name"]);
	$rmks = $_POST["rmks"];
	
	if (isset($_FILES["file_name"]) && $_FILES["file_name"]['name'] != '')  
	{		

		$file_name = $_FILES['file_name']['name'];
		$file_name = rand().'_'.$file_name;
		$file_tmp =$_FILES['file_name']['tmp_name'];

		if ($_POST['file_name_pre'] != '' && file_exists('../images/'.$_POST['file_name_pre'])) 
		{	
			
			if (unlink('../images/'.$_POST['file_name_pre'])) {
				move_uploaded_file($file_tmp,"../images/".$file_name);
				$query="UPDATE `request_items` SET `rmks`='$rmks', `file_name`='$file_name', `item_name`='$item_name' WHERE `id`='$id'";
			}else{
				$message="ERROR FILE DELETION !";
				$action = 'warning';
				header( 'Location: ../request_items.php?action='.$action.'&message='.$message);
			}
		}else{
			move_uploaded_file($file_tmp,"../images/".$file_name);
			$query="UPDATE `request_items` SET `rmks`='$rmks', `file_name`='$file_name', `item_name`='$item_name' WHERE `id`='$id'";
		}
	}
	else{

		$query="UPDATE `request_items` SET `rmks`='$rmks', `item_name`='$item_name' WHERE `id`='$id'";
	}
	
	$run_query = mysqli_query($conn, $query);
	if($run_query){
		$message="Successfully Updated !";
		$action = 'success';
		header( 'Location: ../request_items.php?action='.$action.'&message='.$message);
	}else{
		$message="Not Updated !";
		$action = 'warning';
		header( 'Location: ../request_items.php?action='.$action.'&message='.$message);
	}
}

	// Item store_completed


	// Item Category Delete

	if (isset($_GET['delete'])) {
		$id = $_POST["id"];
		if (!empty($id)) 
		{
			$sql = "DELETE FROM request_items WHERE id ='$id'";
			if(mysqli_query($conn, $sql)){
			   	Header( 'Location: ../request_items.php?success=3');
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}


?>