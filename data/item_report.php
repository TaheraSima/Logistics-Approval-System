<?php include 'config/conn.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="../asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../asset/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../asset/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../asset/plugins/select2/css/select2.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../asset/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../asset/dist/font/font.css" rel="stylesheet">
  <!-- data table -->
  <link rel="stylesheet" href="../asset/plugins/datatables/dataTables.bootstrap4.css">
  <script src="../asset/plugins/jquery/jquery.min.js"></script>
</head>
<body>
	<br>
	<div class="container">
		<h3 class="text-center">Stock Report</h3>
		<h6 class="text-center"><b> Date : </b> 
			<strong> From </strong> <?php $fromdate = $_POST['from_date']; echo $fromdate; ?> 
			<strong> To </strong> <?php $todate = $_POST['to_date']; echo $todate; ?>
		</h6>
		<table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>
					<th> Item Name </th>
					<th> In Item </th>
					<th> Out Item </th>
					<th> Available Stock </th>
					<th> Date </th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i = 1;
					$sql = "SELECT store_details.item_id, store_details.date as store_date, item_info.item_name FROM `store_details`, `item_info` WHERE store_details.item_id=item_info.item_id AND store_details.date BETWEEN '$fromdate' AND '$todate' GROUP BY item_id";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) 
						{
							$item_id = $row['item_id'];
							$sql1 = "SELECT SUM(qty) FROM `store_details` WHERE item_id='$item_id' AND record_type='In'";
							$result1 = mysqli_query($conn, $sql1);
							$itemInQty = mysqli_fetch_assoc($result1);

							$sql2 = "SELECT SUM(qty) FROM `store_details` WHERE item_id='$item_id' AND record_type='Out'";
							$result2 = mysqli_query($conn, $sql2);
							$itemOutQty = mysqli_fetch_assoc($result2);

							$sql3 = "SELECT closing_qty FROM `store_details` WHERE item_id='$item_id' ORDER BY `id` DESC LIMIT 0,1";
							$result3 = mysqli_query($conn, $sql3);
							$itemCurrentBlnc = mysqli_fetch_assoc($result3);
							
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['item_name']; ?></td>
								<td><?php echo $itemInQty['SUM(qty)'] ? $itemInQty['SUM(qty)'] : 0; ?> </td>
								<td><?php echo $itemOutQty['SUM(qty)'] ? $itemOutQty['SUM(qty)'] : 0; ?> </td>
								<td><?php echo $itemCurrentBlnc['closing_qty'] ? $itemCurrentBlnc['closing_qty'] : 0; ?></td>
								<td><?php echo $row['store_date']; ?></td>
							</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>