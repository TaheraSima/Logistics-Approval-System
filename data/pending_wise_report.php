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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
				
	<br><br>
	<div class="container">
		<h4 class="text-center">Pending Requisition Report</h4>
		<h6 class="text-center"><b> Date : </b> 
			<strong> From </strong> <?php 
										$fromdate = $_POST['from_date'];										
										echo $fromdate;									
										?> 
			<strong> To </strong> <?php 
										$todate = $_POST['to_date'];
										echo $todate;
									?>	
		<hr>	
            <br>
            <div id="div_print">   
             
            <table class="table table-bordered table-striped text-center">
			<thead>
				<tr>
					<th> #SL </th>
					<th> Date </th>
					<th> Requisition No </th>										
					<th> Employee</th>					
					<th> Division </th>
					<th> Requisition Type </th>
					<th> Project Name </th>
									
				</tr>
			</thead>
			<tbody>
				<?php 
				$fromdate = $_POST['from_date'];
				$todate = $_POST['to_date'];

	$sql1="SELECT requisition.*, division.* FROM requisition, division WHERE requisition.division_id=division.division_id AND requisition.status IN(5, 1) AND (`requisition`.`last_date` BETWEEN '$fromdate' AND '$todate') GROUP BY requisition.req_no ";
	if ($result1=mysqli_query($conn,$sql1)) {
		$i = 1;
		while ($row1=mysqli_fetch_assoc($result1)) { 
			?>
				<tr>
					<td> <?php echo $i++; ?> </td>
					<td> <?php echo $row1["last_date"] ?> </td>					
					<!-- <td><?php echo $row1["req_no"] ?> </td>	 -->														
					<td>
                        <?php if ($row1['status'] != 3) {
                        	$asd = $row1['req_no']; ?>
                        <a href="pend_report.php?id=<?php echo $asd; ?>">
                        <?php }?>
                        <?php echo $row1['req_no']; ?>
                        <?php if ($row1['status'] != 3) {?>
                        </a>
                        <?php }?>
                    </td>
					<td><?php echo $row1["employee_name"] ?></td>


					<td>
						<?php echo $row1["division_name"] ?>
						<!-- <?php 
						$t_qty=$row1["quantity"]; 
						$total_qty= mysqli_num_rows($t_qty);
						?>
						<?php echo $total_qty; ?> -->
						 </td>
					<td> <?php echo $row1["req_type"] ?> </td>								
					<td> <?php echo $row1["project_name"] ?> </td>
				</tr>
				
		<?php

		}
	}		
	?>				
			</tbody>
			<tfoot></tfoot>
		</table>
		
	
	</div>
	</div>
</body>
</html>

