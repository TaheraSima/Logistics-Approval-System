<?php

	include 'config/conn.php';
	if (isset($_POST["id"])) {
		$output = "";
		$p_id = $_POST["id"];
		$sql = "SELECT * FROM  `projects_details` WHERE `project_id` = '$p_id'";
		$result = mysqli_query($conn,$sql);
		$output .= '<option value="" selected>---Select One---</option>';
		while ($row = mysqli_fetch_assoc( $result )) {
			$output .= sprintf( "<option value='%s'>%s</option>", $row['projects_details_id'], $row['work_order_no'] );

		}

		echo $output;
	}

?>

